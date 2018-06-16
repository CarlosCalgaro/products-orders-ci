
<?php
class Products_model extends CI_Model {

   public function __construct(){
      $this->load->database();
   }

   public function get_products($name = FALSE){
           if ($name === FALSE)
           {
                   $query = $this->db->get('products');
                   return $query->result_array();
           }
           $query = $this->db->get_where('products', array('name' => $slug));
           return $query->row_array();
   }


}




