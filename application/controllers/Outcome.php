<?php
    class Outcome extends CI_Controller{
        
        public function index($offset = 0){ 

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = 'مصارف';

            // Pagination config
            $config['base_url'] = base_url() . 'outcome/index/';
            $config['total_rows'] = $this->db->count_all('outcome');
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

            $data['outcome'] = $this->outcome_model->get_outcome(FALSE, $config['per_page'], $offset);

            // Count
            $data['count'] = $this->outcome_model->get_count();
            // Sum
            // $data['sum'] = $this->outcome_model->get_sum();
            // For multiple work the future
            // Multiple
            // $data['multiple'] = $this->outcome_model->get_multiple();
            
            $this->load->view('templates/header');
            $this->load->view('outcome/index', $data);
            $this->load->view('templates/footer');
        }

        public function create(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $data['title'] = 'ایجاد مصارف';

            $this->form_validation->set_rules('name', 'Name', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('outcome/create', $data);
                $this->load->view('templates/footer');

            }else{
                // Upload Image
                $config['upload_path'] = './assets/dist/img/outcome';
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
                $this->outcome_model->create_outcome($bill_image);
                
                // Set Message
                $this->session->set_flashdata('outcome_created', 'مصارف شما موفقانه ایجاد گردید');

                redirect('outcome');
            }
        }

        public function delete($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->outcome_model->delete_outcome($id);

            // Set Message
            $this->session->set_flashdata('outcome_deleted', 'مصارف شما حذف گردید');

            redirect('outcome');
        }

        public function edit($id){

            $data['outcome'] = $this->outcome_model->get_outcome($id);

            $this->load->view('templates/header');
            $this->load->view('outcome/edit', $data);
            $this->load->view('templates/footer');
            
        }

        public function update(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            // Upload Image
            $config['upload_path'] = './assets/dist/img/outcome';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['remove_spaces'] = true;
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){

                $old_bill_image = $this->input->post('old_bill_image');

                if(file_exists("./assets/dist/img/outcome". $old_bill_image)){
                    unlink("./assets/dist/img/outcome". $old_bill_image);
                }else{
                    $bill_image = $old_bill_image;
                }
                
            }else{
                $data = array('upload_data' => $this->upload->data());
                $bill_image = $_FILES['userfile']['name'];
            }

            $this->outcome_model->update_outcome($bill_image);
            
            // Set Message
            $this->session->set_flashdata('outcome_updated', 'مصارف شما موفقانه تصحیح گردید');

            redirect('outcome');
        }
    }