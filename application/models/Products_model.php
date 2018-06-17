<?php
class Products_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

      public function get_products($id = FALSE){
         if ($id === FALSE)
         {
                  $query = $this->db->get('products');
                  return $query->result_array();
         }
         $query = $this->db->get_where('products', array('id' => $id));
         return $query->row_array();
      }

      public function insert(){
         $this->load->helper('url');
         $data = array(
             'description' => $this->input->post('description'),
             'name' => $this->input->post('name'),
             'price' => $this->input->post('price')
         );
         return $this->db->insert('products', $data);
      }

      public function update($id){
            $this->load->helper('url');
            $data = array(
               'description' => $this->input->post('description'),
               'name' => $this->input->post('name'),
               'price' => $this->input->post('price')
            );
            $this->db->set($data);
            $this->db->where('id', $id);
            return $this->db->update('products');
      }

      public function delete($id){
         $this->db->where('id', $id);
         return $this->db->delete('products');
      }
      
}
