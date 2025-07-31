<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENAC | Adicionar Curso</title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>node_modules/suneditor/dist/css/suneditor.min.css">

</head>

<body>
    <h1>Cadastro de Curso</h1>
    <form action="<?= BASE_URL; ?>Curso/store" method="POST">
        <label for="">Insira seu nome:</label>
        <input type="text" name="nome">

        <label for="">Insira sua descrição:</label>
        <textarea name="descricao" id="descricao"></textarea>

        <button type="submit">Cadastrar</button>
    </form>

    <script src="<?= BASE_URL; ?>node_modules/suneditor/dist/suneditor.min.js"></script>

    <script>
        const editor = SUNEDITOR.create('descricao', {
            height: '100px',
            width: '300px',
            buttonList: [
                ['bold', 'italic', 'underline', 'list', 'link']
            ]
        });
    </script>


</body>

</html>