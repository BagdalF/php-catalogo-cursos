<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillForge</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="bg-light py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">SkillForge</h1>
                <nav>
                    <a href="index.php" class="btn btn-light me-2">Início</a>
                    <a href="filter.php" class="btn btn-light me-2">Filtrar</a>
                    <a href="login.php" class="btn btn-light me-2">Login</a>
                    <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? 'protected.php' : 'login.php'; ?>" 
                       class="btn btn-warning">
                        Registre o seu curso
                    </a>
                </nav>
            </div>
        </div>
    </header>
</body>
</html>