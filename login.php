<?php
session_start();

// Nome de usuário e senha fixos (senha armazenada como hash)
$fixed_username = 'admin';
$fixed_password_hash = password_hash('123456', PASSWORD_DEFAULT); // Substitua '123456' pela senha desejada

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Valida o nome de usuário e a senha
    if ($username === $fixed_username && password_verify($password, $fixed_password_hash)) {
        session_regenerate_id(true); // Garante uma nova sessão para evitar fixação de sessão
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redireciona para a página inicial
        header('Location: index.php');
        exit;
    } else {
        $error_message = 'Nome de usuário ou senha inválidos.';
    }
}
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Login</h1>
        <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($error_message); ?>
        </div>
        <?php endif; ?>
        <form method="POST" action="" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Nome de Usuário:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>