<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENAC | Adicionar Curso</title>
    
</head>
<body>
    <h1>Cadastro de Curso</h1>
    <form action="<?= BASE_URL; ?>Curso/store" method="POST">
        <label for="">Insira seu login:</label>
        <input type="text" name="nome">

        <label for="">Insira sua senha:</label>
        <input type="password" name="nome">

        <button type="submit">Cadastrar</button>
    </form>
    
</body>
</html>

