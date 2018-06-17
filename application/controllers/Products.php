<?php

   class Products extends CI_Controller {
      
      public function __construct(){
         parent::__construct();
         $this->load->model('products_model');
         $this->load->helper('url_helper');
      }

      public function index(){
        $data['title'] = 'Produtos';
        $data['products'] = $this->products_model->get_products();
        $this->load->view('templates/header', $data);
        $this->load->view('products/index');
        $this->load->view('templates/footer');
      }

      public function view($id = NULL){
        $data['products_item'] = $this->products_model->get_products($id);
        $data['title'] = "Visualizar Item";
        $this->load->view('templates/header', $data);
        $this->load->view('products/view');
        $this->load->view('templates/footer');
      }

      public function create(){
        $data['title'] = "Adicionar Produto";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('description', 'Descrição', 'required');
        $this->form_validation->set_rules('price', 'Preço', 'numeric|xss_clean');
    
        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('products/create');
            $this->load->view('templates/footer');
        }else{
            $this->products_model->insert();
            $this->load->view('products/success');
        }
      }

      public function edit(){
          $id = $this->uri->segment(3);
          if (empty($id)){
              show_404();
          }

          $this->load->helper('form');
          $this->load->library('form_validation');
          
          $data['title'] = 'Editando um produto';        
          $data['products_item'] = $this->products_model->get_products($id);
          
          $this->form_validation->set_rules('name', 'Nome', 'required');
          $this->form_validation->set_rules('description', 'Descrição', 'required');
   
          if ($this->form_validation->run() === FALSE){
              $this->load->view('templates/header', $data);
              $this->load->view('products/edit', $data);
              $this->load->view('templates/footer');
   
          }else{
              $this->products_model->update($id);
              redirect( base_url() . 'index.php/products');
          }
      }


      public function delete(){
          $id = $this->uri->segment(3);
          if (empty($id)){
              show_404();
          }
          $products_item = $this->products_model->get_products($id);
          $this->products_model->delete($id);        
          redirect( base_url() . 'index.php/products');        
      }
      
    }

   