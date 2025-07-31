<h1>Lista de alunos</h1>

<div class="container text-end">
    <div class="row">
        <div class="col-md-12">
            <a href="<?= BASE_URL; ?>Aluno/create" class="btn btn-success mb-3">Adicionar Aluno</a>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Matricula</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Victor Santos</td>
            <td>0023</td>
            <td>
                <a href="<?= BASE_URL; ?>Aluno/show/1" class="btn btn-info btn-sm">Ver</a>
                <a href="<?= BASE_URL; ?>Aluno/edit/1" class="btn btn-warning btn-sm">Editar</a>
                <a href="<?= BASE_URL; ?>Aluno/destroy/1" class="btn btn-danger btn-sm">Deletar</a>
            </td>
        </tr>
    </tbody>
</table>