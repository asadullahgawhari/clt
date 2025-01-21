<?php 
    class Inventory_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_inventory($id = FALSE, $limit = FALSE, $offset = FALSE){

            if($limit){
                $this->db->limit($limit, $offset);
            }

            $this->db->select('inventory.id, asset_code, asset_image, asset_name, quantity, specification, model, serial, price, purchase_date, status, created_at, updated_at, info');
            $this->db->order_by('id', 'DESC');

            // Searching
            $keyword = $this->input->get('keyword');
                if (!empty($keyword)) {
                    
                    $this->db->like(array('asset_code' => $keyword));
                    $this->db->or_like(array('asset_name' => $keyword));
                    $this->db->or_like(array('quantity' => $keyword));
                    $this->db->or_like(array('specification' => $keyword));
                    $this->db->or_like(array('model' => $keyword));
                    $this->db->or_like(array('serial' => $keyword));
                    $this->db->or_like(array('price' => $keyword));
                    $this->db->or_like(array('purchase_date' => $keyword));
                    
                }


            if ($id)
                $this->db->where('id', $id);
                $query = $this->db->get('inventory');
                if ($id)
                    return $query->row_array();
            
            return $query->result_array();
        }

        public function create_inventory($asset_image){

            date_default_timezone_set("Asia/kabul");
            
            $data = array(
                'asset_code' => $this->input->post('asset_code'),
                'asset_name' => $this->input->post('asset_name'),
                'quantity' => $this->input->post('quantity'),
                'specification' => $this->input->post('specification'),
                'model' => $this->input->post('model'),
                'serial' => $this->input->post('serial'),
                'price' => $this->input->post('price'),
                'purchase_date' => $this->input->post('purchase_date'),
                'status' => $this->input->post('status'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'info' => $this->input->post('info'),
                'asset_image' => $asset_image
            );

            return $this->db->insert('inventory', $data);
        }

        public function delete_inventory($id){
            $this->db->where('id', $id);
            $this->db->delete('inventory');
            return true;
        }

        public function update_inventory($asset_image){

            date_default_timezone_set("Asia/kabul");

            // $id = url_title($this->input->user('name'));
            
            $data = array(
                'asset_code' => $this->input->post('asset_code'),
                'asset_name' => $this->input->post('asset_name'),
                'quantity' => $this->input->post('quantity'),
                'specification' => $this->input->post('specification'),
                'model' => $this->input->post('model'),
                'serial' => $this->input->post('serial'),
                'price' => $this->input->post('price'),
                'purchase_date' => $this->input->post('purchase_date'),
                'status' => $this->input->post('status'),
                'info' => $this->input->post('info'),
                'updated_at' => date('Y-m-d H:i:s'),
                'asset_image' => $asset_image
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('inventory', $data);
        }

        // Count
        public function get_count(){
            $sql = "SELECT count(asset_code) as asset_code FROM inventory";
            $result = $this->db->query($sql);
            return $result->row()->asset_code;
        }

        // Sum
        public function get_sum(){
            $sql = "SELECT sum(price) as price FROM inventory";
            $result = $this->db->query($sql);
            return $result->row()->price;
        }
    }