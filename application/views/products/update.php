Página de uptade
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('products/update/'.$id); ?>

    <label for="name">Nome</label>
    <input type="input" name="name" /><br />

    <label for="text">Descricao</label>
    <textarea name="description"></textarea><br />

    <label for="price">Preço</label>
    <input type="input" name="price" /><br />

    <input type="submit" name="submit" value="Create news item" />

</form>