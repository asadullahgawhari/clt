<?php 
    class Project_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_project($id = FALSE, $limit = FALSE, $offset = FALSE){

            if($limit){
                $this->db->limit($limit, $offset);
            }

            $this->db->select('project.id, project_name, customer_name, status, bill_image, price, start_date, end_date, created_at, updated_at, info');
            $this->db->order_by('id', 'DESC');

            // Searching
            $keyword = $this->input->get('keyword');
                if (!empty($keyword)) {
                    
                    $this->db->like(array('project_name' => $keyword));
                    $this->db->or_like(array('customer_name' => $keyword));
                    $this->db->or_like(array('status' => $keyword));
                    $this->db->or_like(array('price' => $keyword));
                    
                }

            if ($id)
                $this->db->where('id', $id);
                $query = $this->db->get('project');
                if ($id)
                    return $query->row_array();
            
            return $query->result_array();
        }

        public function create_project($bill_image){

            date_default_timezone_set("Asia/kabul");
            
            $data = array(
                'project_name' => $this->input->post('project_name'),
                'customer_name' => $this->input->post('customer_name'),
                'status' => $this->input->post('status'),
                'status' => $this->input->post('status'),
                'price' => $this->input->post('price'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'info' => $this->input->post('info'),
                'bill_image' => $bill_image
            );

            return $this->db->insert('project', $data);
        }

        public function delete_project($id){
            $this->db->where('id', $id);
            $this->db->delete('project');
            return true;
        }

        public function update_project($bill_image){

            date_default_timezone_set("Asia/kabul");
            
            $data = array(
                'project_name' => $this->input->post('project_name'),
                'customer_name' => $this->input->post('customer_name'),
                'status' => $this->input->post('status'),
                'price' => $this->input->post('price'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'info' => $this->input->post('info'),
                'updated_at' => date('Y-m-d H:i:s'),
                'bill_image' => $bill_image
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('project', $data);
        }

        // Count
        public function get_count(){
            $sql = "SELECT count(project_name) as project_name FROM project";
            $result = $this->db->query($sql);
            return $result->row()->project_name;
        }
    }