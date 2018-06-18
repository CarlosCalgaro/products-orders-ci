
<h3>Meus <?php echo $title; ?></h3>
      <div class="row">
         <table>
         <thead>
            <tr>
               <th>Nome do Produto</th>
               <th>Descrição do Produto</th>
               <th>Preço do Produto</th>
               <th>Visualizar</th>
               <th>Editar</th>
               <th>Excluir</th>
            </tr>
         </thead>

         <?php foreach ($products as $products_item): ?>
            <tbody>
                  <tr>
                     <td><?php echo $products_item['name']; ?></td>
                     <td><?php echo $products_item['description']; ?></td>
                     <td><?php echo $products_item['price']; ?></td>
                     <td> 
                        <a class="waves-effect waves-light btn green darken-3"
                           href="<?php echo site_url('products/view/'.$products_item['id']); ?>">
                           Visualizar Produto
                        </a>
                     </td>
                     <td>
                        <a class="waves-effect waves-light btn purple darken-3"
                           href="<?php echo site_url('products/edit/'.$products_item['id']); ?>">
                           Editar Produto
                        </a>
                     </td>
                     <td>
                        <a class="waves-effect waves-light btn red darken-3"
                           href="<?php echo site_url('products/delete/'.$products_item['id']); ?>" 
                           onClick="return confirm('Tem certeza que deseja deletar este item?')">
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
            <a class="waves-effect waves-light btn" href="<?php echo site_url('products/create');?>">
               Criar novo Produto
            </a>
         </div>
      </div>