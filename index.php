<?php
include 'data/items.php';
include 'includes/header.php';
?>

<div class="catalog">
    <?php foreach ($items as $item): ?>
        <div class="catalog-item">
            <img src="<?php echo escape($item['image']); ?>" alt="<?php echo escape($item['title']); ?>">
            <h2><?php echo escape($item['title']); ?></h2>
            <p>Categoria: <?php echo escape($item['category']); ?></p>
            <a href="details.php?id=<?php echo $item['id']; ?>" class="btn">Ver mais</a>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>