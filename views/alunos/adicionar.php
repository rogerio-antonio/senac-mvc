<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENAC | Adicionar Aluno</title>
</head>
<body>
    <h1>Cadastro de Aluno</h1>
    <form action="<?= BASE_URL; ?>Aluno/store" method="POST">
        <label for="">Insira seu nome:</label>
        <input type="text" name="nome">

        <label for="">Insira sua Matricula:</label>
        <input type="text" name="matricula">

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

