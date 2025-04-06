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
        // Inicia a sessão
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redireciona para uma página protegida (exemplo: dashboard.php)
        header('Location: dashboard.php');
        exit;
    } else {
        $error_message = 'Nome de usuário ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Nome de Usuário:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>