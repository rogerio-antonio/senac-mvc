<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="">Logo</a>
        </div>

        <div>
            <a href="<?= BASE_URL; ?>" class="nav-link d-inline">Inicio</a>
            <a href="<?= BASE_URL; ?>Aluno" class="nav-link d-inline">Aluno</a>
            <a href="<?= BASE_URL; ?>Curso" class="nav-link d-inline">Curso</a>
            <a href="<?= BASE_URL; ?>Usuario" class="nav-link d-inline">Usuário</a>
        </div>
    </nav>

    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        

  
    <script src="<?= BASE_URL; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>