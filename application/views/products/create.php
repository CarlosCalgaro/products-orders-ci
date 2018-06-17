<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<div class="row">
    <?php echo form_open('products/create', array(
        'class' => 'col s12'
    )); ?>
        <div class="row">
            <div class="input-field col s6">
                <input name="name" id="name" type="text" class="validate">
                <label for="name">Nome do Produto</label>
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
                <input name="price" id="preco" type="text" class="validate">
                <label for="preco">Preço do Produto</label>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Criar Produto
                </button>
            </div>
            <div class="col s6">
                <a class="waves-effect waves-light btn"
                   href="<?php echo site_url('products/index'); ?>">Voltar</a>
            </div>
        </div>
       
    </form>
</div>