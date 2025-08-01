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
        $Curso = new Curso();//Chama o model

        $this->data['professor'] = "Victor"; //Só um registro de exemplo
        $this->data['cursos'] = $Curso->getAll(); //Pega todos os cursos do banco de dados e armazena na variável data em Curso.php'

        echo "<pre>"; // Para ver o conteúdo da variável data (teste que deve ser removido depois) e colocado antes da view (loadView)
        print_r($this->data);
        exit;

        $this->loadView("cursos/index", $this->data); //this-> envia para a view
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
