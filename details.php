<?php
include 'data/items.php';

$itemId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$item = null;
foreach ($items as $i) {
    if ($i['id'] === $itemId) {
        $item = $i;
        break;
    }
}

if (!$item) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Curso</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php" class="btn">Voltar</a>
    <h1>Detalhes do Curso </h1>
    <div class="details">
        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
        <h2><?php echo $item['title']; ?></h2>
        <p>Categoria: <?php echo $item['category']; ?></p>
        <p>Descrição: <?php echo $item['description']; ?></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel nisi id libero tincidunt tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
    </div>
</body>
</html>