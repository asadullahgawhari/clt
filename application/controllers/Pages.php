<?php
    class Pages extends CI_Controller{
        
        public function view($page = 'login'){
            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            // This code is belongs to baqeri
            // $data['user_info'] = $this->session->userdata('user');

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footer');
        }
    }