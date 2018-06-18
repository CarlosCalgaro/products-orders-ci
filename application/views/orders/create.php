<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<div class="row">
    <?php echo form_open('orders/create', array(
        'class' => 'col s12'
    )); ?>
    <!-- 
        code varchar(20) NOT NULL,
        description varchar(200),
        order_date DATE,
    -->
        <div class="row">
            <div class="input-field col s6">
                <input name="code" id="code" type="text" class="validate">
                <label for="code">Código da Ordem</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="description" id="description" class="materialize-textarea"></textarea>
                <label for="description">Descrição</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input name="order_date" id="order_date" type="text" class="datepicker">
                <label for="preco">Data da Ordem</label>
            </div>
        </div>
            <?php foreach ($products as $products_item):?>
                <div class="row">
                        <div class="input-field col s3">
                            <p>
                                <label>
                                    <?php echo form_checkbox('products[]', $products_item['id'], FALSE); ?>
                                    <span><?php echo($products_item['name'])?></span>
                                </label>
                            </p>
                        </div>
                        <div class="input-field col s3">
                            <input name=<?php echo('products_qtd['.$products_item['id'].']')?> id="name" type="text" class="validate">
                            <label for="">Quantidade</label>
                        </div>
                </div>
            <?php endforeach; ?>
        <div class="row">
            <div class="col s6"/>
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Criar Ordem
                </button>
            </div>
            <div class="col s6">
                <a class="waves-effect waves-light btn"
                   href="<?php echo site_url('orders/index'); ?>">Voltar</a>
            </div>
        </div>
       
    </form>
</div>

