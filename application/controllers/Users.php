<?php
    class Users extends CI_Controller{
        
        public function index(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $data['users'] = $this->user_model->get_users();
            
            $this->load->view('templates/header', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }

        // Register
        public function register(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $data['title'] = 'ایجاد حساب';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_check_email_exists');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
            
            if($this->form_validation->run() === FALSE){
                // $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                // $this->load->view('templates/footer');

            }else{
                // Upload Image
                $config['upload_path'] = './assets/dist/img/users';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['remove_spaces'] = true;
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                
                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $user_image = 'noimage.jpg';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $user_image = $_FILES['userfile']['name'];
                }

                // Encrypt Password
                $enc_password = md5($this->input->post('password'));
                
                $this->user_model->register($enc_password, $user_image);

                // Set Message
                $this->session->set_flashdata('user_registered', 'شما موفقانه یوزر ایجاد کردید و میتوانید وارد سیستیم شوید');

                redirect('home');
            }
        }

        public function delete($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->user_model->delete_user($id);

            // Set Message
            $this->session->set_flashdata('user_deleted', 'یوزر شما حذف گردید');

            redirect('users');
        }

        public function edit($id){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['user'] = $this->user_model->get_users($id);

            $this->load->view('templates/header');
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
            
        }

        public function update(){

            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            // Upload Image
            $config['upload_path'] = './assets/dist/img/users';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['remove_spaces'] = true;
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){

                $old_user_image = $this->input->post('old_user_image');

                if(file_exists("./assets/dist/img/users". $old_user_image)){
                    unlink("./assets/dist/img/users". $old_user_image);
                }else{
                    $user_image = $old_user_image;
                }
                
            }else{
                $data = array('upload_data' => $this->upload->data());
                $user_image = $_FILES['userfile']['name'];
            }

            $this->user_model->update_user($user_image);
            
            // Set Message
            $this->session->set_flashdata('user_updated', 'یوزر شما موفقانه تصحیح گردید');

            redirect('users');
        }

        // Log user in
        public function login(){

            if ($this->session->userdata('logged_in'))
                redirect('home');

            $data['title'] = 'ورود';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if($this->form_validation->run() === FALSE){
                // $this->load->view('templates/header');
                $this->load->view('users/login', $data);    
                // $this->load->view('templates/footer');

            }else{

                // Get usrname
                $username = $this->input->post('username');

                // Get and encrypt the password
                $password = md5($this->input->post('password'));

                // Login user
                $user_id = $this->user_model->login($username, $password);

                if($user_id){
                    // Create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'name' => $name,
                        'last_name' => $last_name,
                        'task' => $task,
                        'task' => $user_image,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);
                    // $this->session->set_userdata('logged_in', TRUE);
                    
                    // Set Message
                    $this->session->set_flashdata('user_loggedin', 'شما موفقانه وارد سیستیم شده اید');

                    redirect('home');
                }else{
                    // Set Message
                    $this->session->set_flashdata('login_failed', 'اسم یوز و پسورد شما اشتبا میباشد ');

                    redirect('users/login');
                }
                
            }
            
        }

        // Log user out
        public function logout(){
            // Unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            // Set Message
            $this->session->set_flashdata('user_loggedout', 'شما موفقانه از سیستیم خارج شده اید');

            redirect('users/login');

        }

        // Check if username exists
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'این یوزر قبلا استفاده شده است. لطفا اسم یوزر درست را انتخاب نمایید');

            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }
        }

        // Check if email exists
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'ایمیل شما قبلا درج سیستیم گردیده است. لطفا یک ایمیل جدید انتخاب نمایید');

            if($this->user_model->check_email_exists($email)){
                return true;
            }else{
                return false;
            }
        }
    }