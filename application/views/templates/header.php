<!DOCTYPE html>
<html>
   <head>
     <!-- Compiled and minified CSS -->
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- Compiled and minified JavaScript -->        
            <title>CRUD Simples Ezoom</title>
   </head>
   <body>
      <header>
            <nav>
                  <div class="nav-wrapper">
                  <a href="#" class="brand-logo">CRUD Simples</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                  <li><a href="<?php echo site_url('products/index'); ?>">Produtos</a></li>
                  <li><a href="<?php echo site_url('orders/index'); ?>">Ordens</a></li>
                  </ul>
                  </div>
            </nav>  
      </header>
      <div class="container">