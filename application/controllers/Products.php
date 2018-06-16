<?php

   class Products extends CI_Controller{
      
      public function __construct(){
         parent::__construct();
         $this->load->model('products_model');
         $this->load->helper('url_helper');
      }

      public function index(){
         $data['products'] = $this->products_model->get_products();
         $data['title'] = "Items";
         $this->load->view('templates/header', $data);
         $this->load->view('products/index', $data);
         $this->load->view('templates/footer');
      }

      public function view($name = NULL){
              $data['products_item'] = $this->products_item->get_products($name);
      }
   }