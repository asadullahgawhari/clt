<?php 
    class Outcome_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_outcome($id = FALSE, $limit = FALSE, $offset = FALSE){

            // Pagination
            if($limit){
                $this->db->limit($limit, $offset);
            }

            $this->db->select('outcome.id, bill_no, name, belongs, category, quantity, price, date, bill_image, info, created_at, updated_at');
            $this->db->order_by('id', 'DESC');

            // Searching
            $keyword = $this->input->get('keyword');
                if (!empty($keyword)) {
                    
                    $this->db->like(array('bill_no' => $keyword));
                    $this->db->or_like(array('name' => $keyword));
                    $this->db->or_like(array('belongs' => $keyword));
                    $this->db->or_like(array('category' => $keyword));
                    $this->db->or_like(array('quantity' => $keyword));
                    $this->db->or_like(array('price' => $keyword));
                    $this->db->or_like(array('date' => $keyword));
                    
                }

            if ($id)
                $this->db->where('id', $id);
                $query = $this->db->get('outcome');
                if ($id)
                    return $query->row_array();
            
            return $query->result_array();
        }

        public function create_outcome($bill_image){

            date_default_timezone_set("Asia/kabul");
            
            $data = array(
                'bill_no' => $this->input->post('bill_no'),
                'name' => $this->input->post('name'),
                'belongs' => $this->input->post('belongs'),
                'category' => $this->input->post('category'),
                'quantity' => $this->input->post('quantity'),
                'price' => $this->input->post('price'),
                'date' => $this->input->post('date'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'info' => $this->input->post('info'),
                'bill_image' => $bill_image
            );

            return $this->db->insert('outcome', $data);
        }

        public function delete_outcome($id){
            $this->db->where('id', $id);
            $this->db->delete('outcome');
            return true;
        }

        public function update_outcome($bill_image){

            date_default_timezone_set("Asia/kabul");
            
            $data = array(
                'bill_no' => $this->input->post('bill_no'),
                'name' => $this->input->post('name'),
                'belongs' => $this->input->post('belongs'),
                'category' => $this->input->post('category'),
                'quantity' => $this->input->post('quantity'),
                'price' => $this->input->post('price'),
                'date' => $this->input->post('date'),
                'updated_at' => date('Y-m-d H:i:s'),
                'info' => $this->input->post('info'),
                'bill_image' => $bill_image
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('outcome', $data);
        }

        // Count
        public function get_count(){
            $sql = "SELECT count(name) as name FROM outcome";
            $result = $this->db->query($sql);
            return $result->row()->name;
        }

        // Sum
        // public function get_sum(){
        //     $sql = "SELECT sum(total) as total FROM outcome";
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