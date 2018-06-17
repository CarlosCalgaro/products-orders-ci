


<h3><?php echo $title; ?></h3>

<br>
    <div class="row">
        <div class="col s4 text-right">
            Código da Ordem:
        </div>
        <div class="col s4">
            <b><?php echo $orders_item['code']; ?></b>
        </div>
    </div>
    
    <div class="row">
        <div class="col s4 text-right">
            Descrição da Ordem:
        </div>
        <div class="col s4">
            <b><?php echo $orders_item['description']; ?></b>
        </div>
    </div>

    <div class="row">
        <div class="col s4 text-right">
            Data da Ordem:
        </div>
        <div class="col s4">
            <b><?php echo $orders_item['order_date']; ?></b>
        </div>
    </div>
    <h4>Produtos da Ordem</h4>
        <div class="row">
         <table>
         <thead>
            <tr>
               <th>Nome do Produto</th>
               <th>Descrição do Produto</th>
               <th>Preço do Produto</th>
            </tr>
         </thead>
                <?php foreach ($products as $row): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->description?></td>
                            <td><?php echo $row->price ?></td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
         </table>
      </div>
      <div class="row">
         <div class="col s6">
            <a class="waves-effect waves-light btn" href="<?php echo site_url('orders/index');?>">
               Voltar
            </a>
         </div>
      </div>