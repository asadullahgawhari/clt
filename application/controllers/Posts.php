<?php
    class Posts extends CI_Controller{
        
        public function index($offset = 0){ 
            
            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            // Pagination config
            $config['base_url'] = base_url() . 'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 10;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'بعدی';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'قبلی';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['num_links'] = 1;
            $config['first_link'] = '<i class="fa fa-angle-double-right"></i> اول';
            $config['last_link'] = 'آخر <i class="fa fa-angle-double-left"></i>';

            // Init pagination
            $this->pagination->initialize($config);
            // End pagination

            
            $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
            // Count
            $data['count'] = $this->post_model->get_count();

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['post'] = $this->post_model->get_posts($slug);
            $post_id = $data['post']['id'];
            $data['comments'] = $this->comment_model->get_comments($post_id);


            $data['code'] = $data['post']['code'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');

        }

        public function create(){
            
            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $data['title'] = 'ایجاد وبلاگ';
            
            $data['categories'] = $this->post_model->get_categories();

            $this->form_validation->set_rules('code', 'Code', 'required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
                
            }else{
                // Upload Image
                $config['upload_path'] = './assets/dist/img/posts';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['remove_spaces'] = true;
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                // $config['file_name'] = time() . '_' . $_FILES['userfile']['name'];

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.jpg';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }

                $this->post_model->create_post($post_image);

                // Set Message
                $this->session->set_flashdata('post_created', 'بلاگ شما موفقانه ایجاد گردید');

                redirect('posts');
            }
        }

        public function delete($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->post_model->delete_post($id);

            // Set Message
            $this->session->set_flashdata('post_deleted', 'بلاگ شما حذف گردید');

            redirect('posts');
        }

        public function edit($slug){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['post'] = $this->post_model->get_posts($slug);

            // Check user
            if($this->session->userdata('user_id')->id != $this->post_model->get_posts($slug)['user_id']){
                redirect('posts');
            }

            $data['categories'] = $this->post_model->get_categories();

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
            
        }

        public function update(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->post_model->update_post($post_image);

            // Upload Image
            $config['upload_path'] = './assets/dist/img/posts';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['remove_spaces'] = true;
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){
                $old_post_image = $this->input->post('old_post_image');
                if(file_exists("./assets/dist/img/posts". $old_post_image)){
                    unlink("./assets/dist/img/posts". $old_post_image);
                }else{
                    $post_image = $old_post_image;
                }
            }else{
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->update_post($post_image);
            
            // Set Message
            $this->session->set_flashdata('post_updated', 'بلاگ شما موفقانه تصحیح گردید');

            redirect('posts');
        }
    }