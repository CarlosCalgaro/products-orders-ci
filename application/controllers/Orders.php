<?php

   class Orders extends CI_Controller {
      
      public function __construct(){
         parent::__construct();
         $this->load->model('orders_model');
         $this->load->model('products_model');
         $this->load->helper('url_helper');
      }

      public function index(){
        $data['title'] = 'Ordens';
        $data['orders'] = $this->orders_model->get_orders();
        $this->load->view('templates/header', $data);
        $this->load->view('orders/index');
        $this->load->view('templates/footer');
      }

      public function view($id = NULL){
        $data['orders_item'] = $this->orders_model->get_orders($id);
        $data['title'] = "Visualizar Ordem de ID:  ".$id;
        $data['products'] = Self::productsFromOrder($id);
        $this->load->view('templates/header', $data);
        $this->load->view('orders/view');
        $this->load->view('templates/footer');
      }

      public function create(){
        $data['title'] = "Adicionar Ordem";
        $data['products'] = $this->products_model->get_products();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', 'Código', 'required');
        $this->form_validation->set_rules('description', 'Text', 'required');
        $this->form_validation->set_rules('order_date', 'Text', 'required');
        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('orders/create');
            $this->load->view('templates/footer');
        }else{
            $products_array = $this->input->post('products');
            $this->orders_model->insert();
            redirect( base_url() . 'index.php/orders/index');
        }
      }

      public function edit(){
          $id = $this->uri->segment(3);
          if (empty($id)){
              show_404();
          }
          $this->load->helper('form');
          $this->load->library('form_validation');
          $data['title'] = 'Editando um Ordem';        
          $data['orders_item'] = $this->orders_model->get_orders($id);
          $data['products'] = $this->products_model->get_products();
          $data['checked_products'] = array();
          foreach(Self::productsIdFromOrder($id) as $rs){
              array_push($data['checked_products'], $rs['id']);
          }
          $this->form_validation->set_rules('code', 'Nome', 'required');
          $this->form_validation->set_rules('description', 'Descrição', 'required');
          $this->form_validation->set_rules('order_date', 'Text', 'required');
          if ($this->form_validation->run() === FALSE){
              $this->load->view('templates/header', $data);
              $this->load->view('orders/edit', $data);
              $this->load->view('templates/footer');
   
          }else{
              $this->orders_model->update($id);
              redirect( base_url() . 'index.php/orders');
          }
      }


      public function delete(){
          $id = $this->uri->segment(3);
          if (empty($id)){
              show_404();
          }
          $orders_item = $this->orders_model->get_orders($id);
          $this->orders_model->delete($id);        
          redirect( base_url() . 'index.php/orders/index');        
      }

        private function productsFromOrder($id=NULL){
            if (empty($id)){
                show_404();
            }
            $query = $this->db->query(
                'SELECT pr.* FROM order_products as op 
                INNER JOIN products pr
                ON pr.id = product_id
                WHERE op.order_id ='.(string)$id
            );
            return $query->result();
        }
        
        private function productsIdFromOrder($id=NULL){
            if (empty($id)){
                show_404();
            }
            $query = $this->db->query(
                'SELECT pr.id FROM order_products as op 
                INNER JOIN products pr
                ON pr.id = product_id
                WHERE op.order_id ='.(string)$id
            );
            return $query->result_array();
        }  
    
    }

   