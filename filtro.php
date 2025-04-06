<?php
include 'includes/header.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <a href="index.php" class="btn btn-secondary mb-3">Voltar</a>
    <h1 class="text-center">Filtrar Cursos</h1>
    <form method="GET" action="filter.php" class="mt-4">
        <div class="mb-3">
            <label for="category" class="form-label">Categoria:</label>
            <select name="category" id="category" class="form-select">
                <option value="">Todas</option>
                <?php
                $categories = array_unique(array_column($items, 'category'));
                foreach ($categories as $cat): ?>
                    <option value="<?php echo $cat; ?>" <?php echo $cat === $category ? 'selected' : ''; ?>>
                        <?php echo $cat; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <div class="row mt-4">
        <?php if (empty($filteredItems)): ?>
            <p class="text-center">Nenhum curso encontrado para a categoria selecionada.</p>
        <?php else: ?>
            <?php foreach ($filteredItems as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo $item['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['title']; ?></h5>
                            <p class="card-text">Categoria: <?php echo $item['category']; ?></p>
                            <a href="details.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Ver mais</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>

<?php
include 'includes/footer.php';
?>