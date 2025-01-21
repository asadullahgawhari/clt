<?php 
    class User_model extends CI_Model{

        public function get_users($id = FALSE){
            $this->db->select('users.id, name, last_name, email, task, username, password, register_date, user_image');
            $this->db->order_by('id', 'DESC');

            if ($id)
                $this->db->where('id', $id);
                $query = $this->db->get('users');
                if ($id)
                    return $query->row_array();
            
            return $query->result_array();
        }

        public function register($enc_password, $user_image){
            // User data array
            $data = array(
                'name' => $this->input->post('name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'task' => $this->input->post('task'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'user_image' => $user_image
                
            );

            // Insert User
            return $this->db->insert('users', $data);

        }

        public function delete_user($id){
            $this->db->where('id', $id);
            $this->db->delete('users');
            return true;
        }

        public function update_user($user_image){

            date_default_timezone_set("Asia/kabul");

            // $id = url_title($this->input->user('name'));
            
            $data = array(
                'name' => $this->input->post('name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'task' => $this->input->post('task'),
                'username' => $this->input->post('username'),
                // 'password' => $this->input->post('password'),
                // 'password' =>  $enc_password,
                'user_image' => $user_image
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('users', $data);
        }

        // Log user in
        public function login($username, $password){
            // Validate
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('users');

            if($result->num_rows() == 1){
                return $result->row();
            }else{
                return false;
            }
        }

        // Check username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));
            
            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }
        }

        // Check email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email));
            
            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }
        }
    }