<h2><?php echo $title; ?></h2>

<?php foreach ($products as $products_item): ?>
        <h3><?php echo $products_item['name']; ?></h3>
        <div class="main">
                <?php echo $products_item['description']; ?>
        </div>
        <p><a href="<?php echo site_url('products/'.''); ?>">View article</a></p>
<?php endforeach; ?>

