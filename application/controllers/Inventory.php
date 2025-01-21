<?php
    class Inventory extends CI_Controller{
        
        public function index($offset = 0){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = 'موجودی ها';

            // Pagination config
            $config['base_url'] = base_url() . 'inventory/index/';
            $config['total_rows'] = $this->db->count_all('inventory');
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

            $data['inventory'] = $this->inventory_model->get_inventory(FALSE, $config['per_page'], $offset);
            // Count
            $data['count'] = $this->inventory_model->get_count();
            // Sum
            $data['sum'] = $this->inventory_model->get_sum();
            
            $this->load->view('templates/header');
            $this->load->view('inventory/index', $data);
            $this->load->view('templates/footer');
        }

        public function create(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $data['title'] = 'ایجاد موجودی';

            $this->form_validation->set_rules('asset_code', 'Asset_code', 'required');
            $this->form_validation->set_rules('asset_name', 'Asset_name', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('inventory/create', $data);
                $this->load->view('templates/footer');

            }else{
                // Upload Image
                $config['upload_path'] = './assets/dist/img/inventory';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['remove_spaces'] = true;
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                
                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $asset_image = 'noimage.jpg';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $asset_image = $_FILES['userfile']['name'];
                }
                $this->inventory_model->create_inventory($asset_image);
                
                // Set Message
                $this->session->set_flashdata('inventory_created', 'پروژه شما موفقانه ایجاد گردید');

                redirect('inventory');
            }
        }

        public function delete($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->inventory_model->delete_inventory($id);

            // Set Message
            $this->session->set_flashdata('inventory_deleted', 'موجودی شما حذف گردید');

            redirect('inventory');
        }

        public function edit($id){

            $data['inventory'] = $this->inventory_model->get_inventory($id);

            $this->load->view('templates/header');
            $this->load->view('inventory/edit', $data);
            $this->load->view('templates/footer');
            
        }

        public function update(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            // Upload Image
            $config['upload_path'] = './assets/dist/img/inventory';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['remove_spaces'] = true;
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){

                $old_asset_image = $this->input->post('old_asset_image');

                if(file_exists("./assets/dist/img/inventory". $old_asset_image)){
                    unlink("./assets/dist/img/inventory". $old_asset_image);
                }else{
                    $asset_image = $old_asset_image;
                }
                
            }else{
                $data = array('upload_data' => $this->upload->data());
                $asset_image = $_FILES['userfile']['name'];
            }

            $this->inventory_model->update_inventory($asset_image);
            
            // Set Message
            $this->session->set_flashdata('inventory_updated', 'پروژه شما موفقانه تصحیح گردید');

            redirect('inventory');
        }
    }