<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
            
            if($limit){
                $this->db->limit($limit, $offset);
            }
            
            $this->db->select('posts.id, categories.category_name, code, slug, posts.name, model, body, status, price, posts.created_at, posts.updated_at, info, post_image, amount, user_id');
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            
            // Searching
            $keyword = $this->input->get('keyword');
                if (!empty($keyword)) {
                    
                    $this->db->like(array('code' => $keyword));
                    $this->db->or_like(array('name' => $keyword));
                    $this->db->or_like(array('model' => $keyword));
                    $this->db->or_like(array('category_name' => $keyword));
                    
                }
            
            if ($slug)
            $this->db->where('slug', $slug);
        $query = $this->db->get('posts');
        if ($slug)
        return $query->row_array();
    
    
        return $query->result_array();
    
        }

        

        public function create_post($post_image){
            
            $slug = url_title($this->input->post('code'));

            date_default_timezone_set("Asia/kabul");

            $data = array(
                'code' => $this->input->post('code'),
                'slug' => $slug,
                'name' => $this->input->post('name'),
                'model' => $this->input->post('model'),
                'status' => $this->input->post('status'),
                'body' => $this->input->post('body'),
                'price' => $this->input->post('price'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'info' => $this->input->post('info'),
                'category_id' => $this->input->post('category_id'),
                'amount' => $this->input->post('amount'),
                'user_id' => $this->session->userdata('user_id')->id,
                'post_image' => $post_image
            );

            return $this->db->insert('posts', $data);
        }

        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }

        public function update_post($post_image){

            date_default_timezone_set("Asia/kabul");

            $slug = url_title($this->input->post('code'));
            
            $data = array(
                'code' => $this->input->post('code'),
                'slug' => $slug,
                'name' => $this->input->post('name'),
                'model' => $this->input->post('model'),
                'status' => $this->input->post('status'),
                'body' => $this->input->post('body'),
                'price' => $this->input->post('price'),
                'updated_at' => date('Y-m-d H:i:s'),
                'info' => $this->input->post('info'),
                'category_id' => $this->input->post('category_id'),
                'amount' => $this->input->post('amount'),
                'post_image' => $post_image
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }

        public function get_categories(){
            $this->db->order_by('category_name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        public function get_posts_by_category($category_id){

            $this->db->select('posts.id, categories.category_name, code, slug, posts.name, model, body, status, price, posts.created_at, posts.updated_at, info, post_image, amount');
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
 
            $query = $this->db->get_where('posts', array('category_id' => $category_id));

            return $query->result_array();

        }

        // Count
        public function get_count(){
            $sql = "SELECT count(code) as code FROM posts";
            $result = $this->db->query($sql);
            return $result->row()->code;
        }
    }