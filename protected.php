<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

// Inicializa os itens na sessão, se ainda não estiverem definidos
if (!isset($_SESSION['items'])) {
    include 'data/items.php';
    $_SESSION['items'] = $items;
}

// Processa o formulário de cadastro de novos itens
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newItem = [
        'id' => count($_SESSION['items']) + 1,
        'title' => $_POST['title'] ?? '',
        'image' => $_POST['image'] ?? '',
        'category' => $_POST['category'] ?? '',
        'description' => $_POST['description'] ?? '',
    ];

    // Adiciona o novo item ao array de itens na sessão
    $_SESSION['items'][] = $newItem;

    // Redireciona para evitar reenvio do formulário
    header('Location: protected.php');
    exit;
}

$items = $_SESSION['items'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Protegida</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php" class="btn">Voltar ao Catálogo</a>
    <h1>Página Protegida</h1>
    <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <h2>Cadastrar Novo Curso</h2>
    <form method="POST" action="protected.php">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="image">URL da Imagem:</label>
        <input type="text" id="image" name="image" required>
        <br>
        <label for="category">Categoria:</label>
        <input type="text" id="category" name="category" required>
        <br>
        <label for="description">Descrição:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit" class="btn">Cadastrar</button>
    </form>

    <h2>Itens Cadastrados</h2>
    <div class="catalog">
        <?php foreach ($items as $item): ?>
            <div class="catalog-item">
                <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
                <h2><?php echo $item['title']; ?></h2>
                <p>Categoria: <?php echo $item['category']; ?></p>
                <p><?php echo $item['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>