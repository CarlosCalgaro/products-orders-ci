
<h3>Minhas <?php echo $title; ?></h3>
      <div class="row">
         <table>
         <thead>
            <tr>
               <th>Nome da Ordem</th>
               <th>Descrição da Ordem</th>
               <th>Data da Ordem</th>
               <th>Ações:</th>
               <th></th>
               <th></th>
            </tr>
         </thead>

         <?php foreach ($orders as $orders_item): ?>
            <tbody>
                  <tr>
                     <td><?php echo $orders_item['code']; ?></td>
                     <td><?php echo $orders_item['description']; ?></td>
                     <td><?php echo $orders_item['order_date']; ?></td>
                     <td> 
                        <a class="waves-effect waves-light btn green darken-3"
                           href="<?php echo site_url('orders/view/'.$orders_item['id']); ?>">
                           Visualizar Ordem
                        </a>
                     </td>
                     <td>
                        <a class="waves-effect waves-light btn purple darken-3"
                           href="<?php echo site_url('orders/edit/'.$orders_item['id']); ?>">
                           Editar Ordem
                        </a>
                     </td>
                     <td>
                        <a class="waves-effect waves-light btn red darken-3"
                           href="<?php echo site_url('orders/delete/'.$orders_item['id']); ?>" 
                           onClick="return confirm('Are you sure you want to delete?')">
                           Delete
                        </a>
                     </td>
                  </tr>
            </tbody>
         <?php endforeach; ?>
         </table>
      </div>
      <div class="row">
         <div class="col s6">
            <a class="waves-effect waves-light btn" href="<?php echo site_url('orders/create/');?>">
               Criar nova Ordem
            </a>
         </div>
      </div>