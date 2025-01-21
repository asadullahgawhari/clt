<?php
    class Project extends CI_Controller{
        
        public function index($offset = 0){ 

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = 'پروژه ها';

            // Pagination config
            $config['base_url'] = base_url() . 'project/index/';
            $config['total_rows'] = $this->db->count_all('project');
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

            $data['project'] = $this->project_model->get_project(FALSE, $config['per_page'], $offset);
            // Count
            $data['count'] = $this->project_model->get_count();
            
            $this->load->view('templates/header');
            $this->load->view('project/index', $data);
            $this->load->view('templates/footer');
        }

        public function create(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $data['title'] = 'ایجاد پروژه';

            $this->form_validation->set_rules('project_name', 'Project_name', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('project/create', $data);
                $this->load->view('templates/footer');

            }else{
                // Upload Image
                $config['upload_path'] = './assets/dist/img/project';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['remove_spaces'] = true;
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                
                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $bill_image = 'noimage.jpg';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $bill_image = $_FILES['userfile']['name'];
                }
                $this->project_model->create_project($bill_image);
                
                // Set Message
                $this->session->set_flashdata('project_created', 'پروژه شما موفقانه ایجاد گردید');

                redirect('project');
            }
        }

        public function delete($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->project_model->delete_project($id);

            // Set Message
            $this->session->set_flashdata('project_deleted', 'پروژه شما حذف گردید');

            redirect('project');
        }

        public function edit($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['project'] = $this->project_model->get_project($id);

            $this->load->view('templates/header');
            $this->load->view('project/edit', $data);
            $this->load->view('templates/footer');
            
        }

        public function update(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            // Upload Image
            $config['upload_path'] = './assets/dist/img/project';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['remove_spaces'] = true;
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){

                $old_bill_image = $this->input->post('old_bill_image');

                if(file_exists("./assets/dist/img/project". $old_bill_image)){
                    unlink("./assets/dist/img/project". $old_bill_image);
                }else{
                    $bill_image = $old_bill_image;
                }
                
            }else{
                $data = array('upload_data' => $this->upload->data());
                $bill_image = $_FILES['userfile']['name'];
            }

            $this->project_model->update_project($bill_image);
            
            // Set Message
            $this->session->set_flashdata('project_updated', 'پروژه شما موفقانه تصحیح گردید');

            redirect('project');
        }
    }