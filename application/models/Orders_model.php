<?php

/**
 * Classe que modela as Ordems
 * 
 * TODO: Remover alguns métodos para uma modelo chamado OrderProducts
 * para "limpar" o código
 */
class Orders_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    /**
     * Retorna todas as ordens quando nenhum id é enviado,
     * caso contrário, retorna ordem que possua o id especificado
     */
    public function get_orders($id = FALSE){
        if ($id === FALSE)
        {
                $query = $this->db->get('orders');
                return $query->result_array();
        }
        $query = $this->db->get_where('orders', array('id' => $id));
        return $query->row_array();
    }

    /**
     * Insere uma nova ordem na tabela, insere também na tabela order_products
     * para poder fazer a relação
     */
    public function insert(){
        $this->load->helper('url');
        $products_array = $this->input->post('products');
        $products_quantity = $this->input->post('products_qtd[]');
        $data = array(
            'description' => $this->input->post('description'),
            'code' => $this->input->post('code'),
            'order_date' => $this->input->post('order_date')
        );
        $return_status = $this->db->insert('orders', $data);
        $new_order_id = $this->db->insert_id();
        foreach($products_array as $product_id){
            Self::createOrderProduct($product_id, $new_order_id, $products_quantity[$product_id]);
        }
        return $return_status;
    }

    /**
     * Realiza o update do registro, destruindo todas os order_products relacionadas
     * e recriando-as
     * 
     * TODO: Trocar o método para fazer apenas um update nas order_products ao invez de 
     * recria-las
     */
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

    /**
     * Deleta uma ordem e todas as order_products associadas
     */
    public function delete($id){
        $this->db->where('order_id', $id);
        $this->db->delete('order_products');
        $this->db->where('id', $id);
        return $this->db->delete('orders');
    }
    
    /**
     * Recebe o id de uma ordem, id de um produto e uma quantidade para fazer o relacionamento
     * entre tabelas
     */
    private function createOrderProduct($product_id, $order_id, $quantity){
        $data = array(
            'order_id' => $order_id,
            'product_id' => $product_id,
            'quantity' => $quantity
        );
        return $this->db->insert('order_products', $data);
    }

    /**
     * Função que recebe um id e elimina todos os relacionamentos que a ordem possui    
     */
    private function destroyAllOrderProducts($id){
        $query = $this->db->query('SELECT id FROM order_products as op WHERE op.order_id ='.(string)$id);
        foreach ($query->result() as $row){
            Self::destroySingleOrderProduct($row->id);
        }
        echo 'Total Results: ' . $query->num_rows();
    }
    /**
     * Destroi uma product_order especificada com um id
     */
    private function destroySingleOrderProduct($id){
        $this->db->where('id', $id);
        return $this->db->delete('order_products');
    }
}
