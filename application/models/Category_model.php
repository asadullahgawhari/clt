<?php
    class Category_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_categories($id = FALSE){
            $this->db->select('categories.id, category_name, created_at, updated_at');
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('categories');
            

            if ($id)
                $this->db->where('id', $id);
                $query = $this->db->get('categories');
                if ($id)
                    return $query->row_array();
            
            return $query->result_array();
        }

        public function create_category(){

            date_default_timezone_set("Asia/kabul");
            
            $data = array(
                'category_name' => $this->input->post('category_name'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            return $this->db->insert('categories', $data);
        }

        public function update_category(){

                date_default_timezone_set("Asia/kabul");

                // $id = url_title($this->input->category('category_name'));
                
                $data = array(
                    'category_name' => $this->input->post('category_name'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
    
                $this->db->where('id', $this->input->post('id'));
                return $this->db->update('categories', $data);
        }

        public function get_category($id){
            $query = $this->db->get_where('categories', array('id' => $id));
            return $query->row();
        }

        public function delete_category($id){
            $this->db->where('id', $id);
            $this->db->delete('categories');
            return true;
        }

        // Count
        public function get_count(){
            $sql = "SELECT count(category_name) as category_name FROM categories";
            $result = $this->db->query($sql);
            return $result->row()->category_name;
        }
    }