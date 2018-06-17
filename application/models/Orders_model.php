<?php
class Orders_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_orders($id = FALSE){
        if ($id === FALSE)
        {
                $query = $this->db->get('orders');
                return $query->result_array();
        }
        $query = $this->db->get_where('orders', array('id' => $id));
        return $query->row_array();
    }

    public function insert(){
        $this->load->helper('url');
        $products_array = $this->input->post('products');
        $data = array(
            'description' => $this->input->post('description'),
            'code' => $this->input->post('code'),
            'order_date' => $this->input->post('order_date')
        );
        $return_status = $this->db->insert('orders', $data);
        $new_order_id = $this->db->insert_id();
        foreach($products_array as $product_id){
            Self::createOrderProduct($product_id, $new_order_id);
        }
        return $return_status;
    }

    public function update($id){
        $this->load->helper('url');
        
        $products_array = $this->input->post('products');
        Self::destroyAllOrderProducts($id);
        $data = array(
            'description' => $this->input->post('description'),
            'code' => $this->input->post('code'),
            'order_date' => $this->input->post('order_date')
        );

        foreach($products_array as $product_id){
            Self::createOrderProduct($product_id, $id);
        }
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('orders');
    }

    public function delete($id){
        $this->db->where('order_id', $id);
        $this->db->delete('order_products');
        $this->db->where('id', $id);
        return $this->db->delete('orders');
    }
    
    private function createOrderProduct($product_id, $order_id){
        $data = array(
            'order_id' => $order_id,
            'product_id' => $product_id
        );
        return $this->db->insert('order_products', $data);
    }

    private function destroyAllOrderProducts($id){
        $query = $this->db->query('SELECT id FROM order_products as op WHERE op.order_id ='.(string)$id);
        foreach ($query->result() as $row){
            Self::destroySingleOrderProduct($row->id);
        }
        echo 'Total Results: ' . $query->num_rows();
    }

    private function destroySingleOrderProduct($id){
        $this->db->where('id', $id);
        return $this->db->delete('order_products');
    }
}
