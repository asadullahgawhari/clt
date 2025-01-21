<?php 
    class Categories extends CI_Controller{

        public function index(){
            
            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['categories'] = $this->category_model->get_categories();
            // Count
            $data['count'] = $this->category_model->get_count();

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
            

        }

        public function create(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = 'ایجاد کتگوری';

            $this->form_validation->set_rules('category_name', 'Category_name', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->create_category();

                // Set Message
                $this->session->set_flashdata('category_created', 'کتگوری شما موفقانه ایجاد گردید');

                redirect('categories');
            }
        }

        public function posts($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = $this->category_model->get_category($id)->category_name;

            $data['posts'] = $this->post_model->get_posts_by_category($id);

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function edit($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['category'] = $this->category_model->get_categories($id);

            $this->load->view('templates/header');
            $this->load->view('categories/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->category_model->update_category();
            
            // Set Message
            $this->session->set_flashdata('category_updated', 'بلاگ شما موفقانه تصحیح گردید');

            redirect('categories');
        }

        public function delete($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->category_model->delete_category($id);

            // Set Message
            $this->session->set_flashdata('category_deleted', 'کتگوری شما حذف گردید');

            redirect('categories');
        }

        
    }