<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<div class="row">
    <?php echo form_open('orders/edit/'.$orders_item['id'], array(
        'class' => 'col s12'
    )); ?>
        <div class="row">
            <div class="input-field col s6">
                <input name="code" id="code" type="text" class="validate" value="<?php echo($orders_item['code'])?>">
                <label for="code">Código da Ordem</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="description" id="description" class="materialize-textarea"><?php echo($orders_item['description'])?></textarea>
                <label for="description">Descrição</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input name="order_date" id="order_date" type="text" class="datepicker" value="<?php echo($orders_item['order_date'])?>">
                <label for="preco">Data da Ordem</label>
            </div>
        </div>
        <div class="row">
            <?php foreach ($products as $products_item):?>
                <p>
                    <label>
                        <?php echo form_checkbox('products[]', $products_item['id'],in_array($products_item['id'],$checked_products)); ?>
                        <span><?php echo($products_item['name'])?></span>
                    </label>
                </p>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col s6"/>
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Editar Ordem
                </button>
            </div>
            <div class="col s6">
                <a class="waves-effect waves-light btn"
                   href="<?php echo site_url('products/index'); ?>">Voltar</a>
            </div>
        </div>
       
    </form>
</div>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });    
</script>