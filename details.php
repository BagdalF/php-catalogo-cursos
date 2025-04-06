<?php
include 'data/items.php';
include 'includes/header.php';

$itemId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$item = null;
foreach ($items as $i) {
    if ($i['id'] === $itemId) {
        $item = $i;
        break;
    }
}

if (!$item) {
    redirect('index.php');
}
?>

<div class="details">
    <img src="<?php echo escape($item['image']); ?>" alt="<?php echo escape($item['title']); ?>">
    <h2><?php echo escape($item['title']); ?></h2>
    <p>Categoria: <?php echo escape($item['category']); ?></p>
    <p>Descrição: <?php echo escape($item['description']); ?></p>
</div>

<?php include 'includes/footer.php'; ?>