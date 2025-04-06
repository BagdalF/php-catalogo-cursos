<?php
include 'data/items.php';
include 'includes/header.php';
include 'functions/helpers.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

<style>
.hero {
    background: linear-gradient(135deg, #1f1c2c, #928dab);
    color: white;
    text-align: center;
    padding: 50px 20px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.hero h1 {
    font-size: 3rem;
    font-weight: bold;
}

.hero p {
    font-size: 1.2rem;
    margin-top: 10px;
}

.card {
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    border-radius: 10px 10px 0 0;
}

.protected-btn {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}
</style>

<div class="container mt-4 h-100">
    <!-- Hero Section -->
    <div class="hero">
        <h1>Bem-vindo ao SkillForge</h1>
        <p>Explore os melhores cursos de tecnologia e design, criados para elevar suas habilidades ao próximo nível.</p>
    </div>

    <!-- Botão Área Protegida -->
    <div class="protected-btn">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
        <a href="protected.php" class="btn btn-warning">Acessar Área Protegida</a>
        <?php endif; ?>
    </div>

    <!-- Catálogo de Cursos -->
    <div class="h-100">
        <?php foreach ($items as $item): ?>
        <div class="col-md-4">
            <div class="card">
                <img src="<?php echo escape($item['image']); ?>" class="card-img-top"
                    alt="<?php echo escape($item['title']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo escape($item['title']); ?></h5>
                    <p class="card-text">Categoria: <?php echo escape($item['category']); ?></p>
                    <a href="details.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Ver mais</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>