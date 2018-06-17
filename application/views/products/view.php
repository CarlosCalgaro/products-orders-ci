<h3><?php echo $title; ?></h3>

<br>
    <div class="row">
        <div class="col s4 text-right">
            Nome do Produto:
        </div>
        <div class="col s4">
            <b><?php echo $products_item['name']; ?></b>
        </div>
    </div>
    
    <div class="row">
        <div class="col s4 text-right">
            Descrição:
        </div>
        <div class="col s4">
            <b><?php echo $products_item['description']; ?></b>
        </div>
    </div>

    <div class="row">
        <div class="col s4 text-right">
            Preço:
        </div>
        <div class="col s4">
            <b><?php echo $products_item['price']; ?></b>
        </div>
    </div>
      <div class="row">
         <div class="col s6">
            <a class="waves-effect waves-light btn" href="<?php echo site_url('products/index');?>">
               Voltar
            </a>
         </div>
      </div>