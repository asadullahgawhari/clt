<?php 
    class Income_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_income($id = FALSE, $limit = FALSE, $offset = FALSE){

            if($limit){
                $this->db->limit($limit, $offset);
            }

            

            $this->db->select('income.id, customer_name, project_name, project_quantity, quantity, price, project_date, bill_image, status, info, created_at, updated_at');
            $this->db->order_by('id', 'DESC');

            // Searching
            $keyword = $this->input->get('keyword');
                if (!empty($keyword)) {
                    
                    $this->db->like(array('customer_name' => $keyword));
                    $this->db->or_like(array('project_name' => $keyword));
                    $this->db->or_like(array('project_quantity' => $keyword));
                    $this->db->or_like(array('quantity' => $keyword));
                    $this->db->or_like(array('price' => $keyword));
                    $this->db->or_like(array('project_date' => $keyword));
                    
                }

            if ($id)
                $this->db->where('id', $id);
                $query = $this->db->get('income');
                if ($id)
                    return $query->row_array();
            
            return $query->result_array();
        }

        public function create_income($bill_image){
            

            date_default_timezone_set("Asia/kabul");
            
            $data = array(
                'customer_name' => $this->input->post('customer_name'),
                'project_name' => $this->input->post('project_name'),
                'project_quantity' => $this->input->post('project_quantity'),
                'quantity' => $this->input->post('quantity'),
                'price' => $this->input->post('price'),
                'project_date' => $this->input->post('project_date'),
                'status' => $this->input->post('status'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'info' => $this->input->post('info'),
                'bill_image' => $bill_image
            );

            return $this->db->insert('income', $data);
        }

        public function delete_income($id){
            $this->db->where('id', $id);
            $this->db->delete('income');
            return true;
        }

        public function update_income($bill_image){

            date_default_timezone_set("Asia/kabul");
            
            $data = array(
                'customer_name' => $this->input->post('customer_name'),
                'project_name' => $this->input->post('project_name'),
                'project_quantity' => $this->input->post('project_quantity'),
                'quantity' => $this->input->post('quantity'),
                'price' => $this->input->post('price'),
                'project_date' => $this->input->post('project_date'),
                'status' => $this->input->post('status'),
                'info' => $this->input->post('info'),
                'updated_at' => date('Y-m-d H:i:s'),
                'bill_image' => $bill_image
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('income', $data);
        }

        // Count
        public function get_count(){
            $sql = "SELECT count(customer_name) as customer_name FROM income";
            $result = $this->db->query($sql);
            return $result->row()->customer_name;
        }

        // Sum
        // public function get_sum(){
        //     $sql = "SELECT sum(total) as total FROM income";
        //     $result = $this->db->query($sql);
        //     return $result->row()->total;
        // }

        // For multiple work the future
        // public function get_multiple() {
        //     $sql = "SELECT total FROM income";
        //     $result = $this->db->query($sql);
        //     $rows = $result->result_array();
        //     $product = 1;
        //     foreach ($rows as $row) {
        //         $product *= $row['total'];
        //     }
        //     return $product;
        // }
    }