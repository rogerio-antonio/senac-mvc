<?php

class UsuarioController extends Controller
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
        $Usuario = new Usuario();//Chama o model

        $this->data['professor'] = "Victor"; //Só um registro de exemplo
        $this->data['usuarios'] = $Usuario->getAll(); //Pega todos os usuários do banco de dados e armazena na variável data em Usuario.php'

        echo "<pre>"; // Para ver o conteúdo da variável data (teste que deve ser removido depois) e colocado antes da view (loadView)
        print_r($this->data);
        exit;

        $this->loadView("usuarios/index", $this->data); //this-> envia para a view




    }

    public function create(){//Chama o formulário de Cadastro


        $this->loadView("", $this->data);
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
