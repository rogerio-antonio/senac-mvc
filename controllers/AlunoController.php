<?php

class AlunoController extends Controller
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

        $Aluno = new Aluno();//Chama o model

        $this->data['professor'] = "Victor"; //Só um registro de exemplo
        $this->data['alunos'] = $Aluno->getAll(); //Pega todos os alunos do banco de dados e armazena na variável data em Aluno.php'

        echo "<pre>"; // Para ver o conteúdo da variável data (teste que deve ser removido depois) e colocado antes da view (loadTemplate)
        print_r($this->data);
        exit;
       
        $this->loadTemplate("home", "alunos/index", $this->data); //this-> envia para a view
    }

    public function create(){//Chama o formulário de Cadastro


        $this->loadTemplate("home", "alunos/adicionar", $this->data);
    }

    public function store(){//Processa o formulário de Cadastro
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $matricula = $_POST["matricula"];

            $Aluno = new Aluno();//Chama o model
            $Aluno->setMatricula($matricula);
            $Aluno->setNome($nome);
            if( $Aluno->insert() == true){
                header("Location:" . BASE_URL . "Aluno");
                exit;
            }else{
                $_SESSION['error'] = "Aluno não cadastrado, tente novamente.";
                header("Location:" . BASE_URL . "Aluno/create");                
                exit;
            }
           
        }
    }

    public function show($id){//Mostra um Aluno Específico

        $this->loadTemplate("home", "alunos/ver", $this->data);
    }

    public function edit($id){//Chama o formulário para Editar um Aluno

        $this->loadTemplate("home", "alunos/editar", $this->data);
    }

    public function update($id){//Processa o formulário de Edição

    }

    public function destroy($id){//Deleta um Aluno Específico

    }


}
