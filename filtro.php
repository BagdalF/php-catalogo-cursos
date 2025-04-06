<?php
include 'data/items.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';
$filteredItems = [];

if ($category) {
    foreach ($items as $item) {
        if (strtolower($item['category']) === strtolower($category)) {
            $filteredItems[] = $item;
        }
    }
} else {
    $filteredItems = $items; // Exibe todos os itens se nenhuma categoria for selecionada
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Cursos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php" class="btn">Voltar</a>
    <h1>Filtrar Cursos</h1>
    <form method="GET" action="filter.php">
        <label for="category">Categoria:</label>
        <select name="category" id="category">
            <option value="">Todas</option>
            <?php
            // Gera as opções de categoria dinamicamente
            $categories = array_unique(array_column($items, 'category'));
            foreach ($categories as $cat): ?>
                <option value="<?php echo $cat; ?>" <?php echo $cat === $category ? 'selected' : ''; ?>>
                    <?php echo $cat; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn">Filtrar</button>
    </form>

    <div class="catalog">
        <?php if (empty($filteredItems)): ?>
            <p>Nenhum curso encontrado para a categoria selecionada.</p>
        <?php else: ?>
            <?php foreach ($filteredItems as $item): ?>
                <div class="catalog-item">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
                    <h2><?php echo $item['title']; ?></h2>
                    <p>Categoria: <?php echo $item['category']; ?></p>
                    <a href="details.php?id=<?php echo $item['id']; ?>" class="btn">Ver mais</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>