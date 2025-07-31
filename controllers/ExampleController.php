<?php

class ExampleController extends Controller
{

  private $allowedActions = []; //nome das action que desejamos ignorar separadas por vírgulas

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

  /* Será a lista de dados*/
  public function index()
  { //action

    $this->loadDefaultData("Título da Página", "nome-menu-active");
    $filters = [];
    $NameModel = new NameModel();

    $limit = 15; //quantos itens por página
    $this->data['currentPage'] = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    $offset = ($this->data['currentPage'] - 1) * $limit;

    $this->data['totalItens'] = $NameModel->getTotal($filters);
    $this->data['numberOfPages'] = ceil($this->data['totalItens'] / $limit); //determina o numero de páginas
    $this->data['list'] = $NameModel->getAll($offset, $limit,  $filters);

    if (isset($_GET) && !empty($_GET)) {
      unset($_GET['p']);
      $this->data['gets_active'] = http_build_query($_GET);
    }

    //nome do template, nome da view, data
    $this->loadTemplate("name_template", "NameModel/list", $this->data);
  }

  public function create()
  { //action

    $this->loadDefaultData("Título da Página", "nome-menu-active");


    //nome do template, nome da view, data
    $this->loadTemplate("name_template", "NameModel/create", $this->data);
  }

  //Processa o formulário do adicionar
  public function store()
  { //action


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $NameModel = new NameModel();

      // Sanitizar e validar os dados de entrada
      $form_data = [
        'campo1' => htmlspecialchars(trim($_POST['campo1']), ENT_QUOTES, 'UTF-8'),
        'campo2' => filter_input(INPUT_POST, 'campo2', FILTER_VALIDATE_INT),
        'campo3' => htmlspecialchars(trim($_POST['campo3']), ENT_QUOTES, 'UTF-8'),
        'password' => Resource::hashPassword($_POST['password'])
      ];

      $validValues = ['valor-permitido1', 'valor-permitido2'];
      if (!Resource::validValues($form_data['campo1'], $validValues)) { //chamando um método static
        $_SESSION['ERROR'] = "Tipo inválido";
        header("Location: " . BASE_URL . "NameController/create");
        exit;
      }

      $missingFields = Resource::validateRequiredFields($form_data, ['campo1-obrigatorio', 'campo2-obrigatorio']);

      if (is_array($missingFields) && !empty($missingFields)) {
        $_SESSION['error'] = "Os seguintes campos são obrigatórios: " . implode(", ", $missingFields);
        header("Location: " . BASE_URL . "NameController/create");
        exit;
      }

      // Inserir no banco de dados
      if ($NameModel->insert($form_data)) {
        // Redirecionar em caso de sucesso
        header("Location: " . BASE_URL . "NameController");
        exit;
      } else {
        $this->data['error'] = "Erro ao cadastrar NameController. Tente novamente.";
        header("Location: " . BASE_URL . "NameController/create");
        exit;
      }
    }
  }

  public function edit($id)
  { //action

    $this->loadDefaultData("Título da Página", "nome-menu-active");
    $NameModel = new NameModel();

    $this->data['info'] = $NameModel->get($id);



    //nome do template, nome da view, data
    $this->loadTemplate("name_template", "NameModel/edit", $this->data);
  }

  //Processa o formulário do editar
  public function update($id)
  { //action



    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $NameModel = new NameModel();

      $form_data = [
        'campo1' => htmlspecialchars(trim($_POST['campo1']), ENT_QUOTES, 'UTF-8'),
        'campo2' => filter_input(INPUT_POST, 'campo2', FILTER_VALIDATE_INT),
        'campo3' => htmlspecialchars(trim($_POST['campo3']), ENT_QUOTES, 'UTF-8')
      ];

      $validValues = ['valor-permitido1', 'valor-permitido2'];
      if (!Resource::validValues($form_data['campo1'], $validValues)) { //chamando um método static
        $_SESSION['ERROR'] = "Tipo inválido";
        header("Location: " . BASE_URL . "NameController/create");
        exit;
      }

      $missingFields = Resource::validateRequiredFields($form_data, ['campo1-obrigatorio', 'campo2-obrigatorio']);

      if (is_array($missingFields) && !empty($missingFields)) {
        $_SESSION['error'] = "Os seguintes campos são obrigatórios: " . implode(", ", $missingFields);
        header("Location: " . BASE_URL . "NameController/create");
        exit;
      }

      // Atualiza os dados no banco
      if ($NameModel->update($form_data, $id)) {
        // Redireciona em caso de sucesso
        header("Location: " . BASE_URL . "NameController");
        exit;
      } else {
        // Define mensagem de erro caso a atualização falhe
        $_SESSION['error'] = "Erro ao atualizar os dados do NameController.";
        header("Location: " . BASE_URL . "NameController/edit/" . $id);
        exit;
      }
    }
  }

  //exibe um dado individual
  public function show($id)
  { //action


    $NameModel = new NameModel();

    $this->data['info'] = $NameModel->get($id);


    //nome do template, nome da view, data
    $this->loadTemplate("name_template", "NameModel/show", $this->data);
  }

  public function destroy($id)
  { //action


    $NameModel = new NameModel();
    if ($NameModel->delete($id)) {
      header("location: " . BASE_URL . "name_controller");
      exit;
    }
  }
}
