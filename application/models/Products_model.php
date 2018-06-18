<?php
class Products_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

      /**
       * Função que retorna o produto baseado em seu ID (retorna todos se não for especificado)
       */

      public function get_products($id = FALSE){
         if ($id === FALSE)
         {
                  $query = $this->db->get('products');
                  return $query->result_array();
         }
         $query = $this->db->get_where('products', array('id' => $id));
         return $query->row_array();
      }

      /**
       * Função que insere um produto na tabela
       */

      public function insert(){
         $this->load->helper('url');
         $data = array(
             'description' => $this->input->post('description'),
             'name' => $this->input->post('name'),
             'price' => $this->input->post('price')
         );
         return $this->db->insert('products', $data);
      }

      /**
       * Função que atualiza o registro do produto
       */

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

      /**
       * Função que remove um produto baseado em seu id
       */

      public function delete($id){
         $this->db->where('id', $id);
         return $this->db->delete('products');
      }
      
}
