<?php

class CursoController extends Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();

        $this->data = [];
    }

    private function loadDefaultData($title = "", $menu_active = "")
    {

        $this->data['title'] = $title;
        $this->data['menu_active'] = $menu_active;
    }

    public function index(){//Primeira Página (Listar todos)

    }

    public function create(){//Chama o formulário de Cadastro


        $this->loadView("cursos/adicionar", $this->data);
    }

    public function store(){//Processa o formulário de Cadastro

    }

    public function show($id){//Mostra um Aluno Específico

    }

    public function edit($id){//Chama o formulário para Editar um Aluno

    }

    public function update($id){//Processa o formulário de Edição

    }

    public function destroy($id){//Deleta um Aluno Específico

    }


}
