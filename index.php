<?php
include 'data/items.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Cursos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Catálogo de Cursos</h1>
    <div class="catalog">
        <?php foreach ($items as $item): ?>
            <div class="catalog-item">
                <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
                <h2><?php echo $item['title']; ?></h2>
                <p>Categoria: <?php echo $item['category']; ?></p>
                <a href="details.php?id=<?php echo $item['id']; ?>" class="btn">Ver mais</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>