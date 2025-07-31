<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if (ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/senac-mvc/");
	$config['dbname'] = 'senac';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}else if (ENVIRONMENT == 'remote'){
	define("BASE_URL", "http://localhost/nome-projeto/");
	$config['dbname'] = 'banco-dados-online';
	$config['host'] = 'servidor-online';
	$config['dbuser'] = 'usuario-online';
	$config['dbpass'] = 'senha-online';
} else {
	define("BASE_URL", "https://nome-projeto.com.br/");
	$config['dbname'] = 'banco-dados-online';
	$config['host'] = 'servidor-online';
	$config['dbuser'] = 'usuario-online';
	$config['dbpass'] = 'senha-online';
}

/*Informações de e-mail*/
$config['hostmail'] = 'servidor_email_SMTP'; //servidor de email SMTP
$config['username'] = 'nome_usuario_envio'; //nome que vai aparecer para o destinatário
$config['usermail'] = 'email_envio'; //seu email
$config['password'] = 'password_email'; //senha do email
$config['port'] = 465; //porta padrão, mas com possibilidade de ajustes

/*Informações de transporte */
$config['zipcode_origin'] = '36570308';//cep da nome-projeto, altere quando necessário

/**Informações de gateway de pagamento */
$config['api_key'] = 'hash_api';

/*Informações de api redes sociais */
define("FACEBOOK", [
	"app_id" => "api_id",
	"app_secret" => "app_secret",
	"app_redirect" => "http://localhost:90/vemcaver/home/login",
	"app_version" => "v17.0"
]);

define("GOOGLE", [
	"client_id" => "cliend_id",
	"client_secret" => "client_secret",
	"redirect_uris" => "http://localhost:90/vemcaver/home/login",
]);

try {
	$db = new PDO("mysql:charset=utf8;host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['dbuser'], $config['dbpass']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Entre em contato com o suporte ou tente novamente. <br>";
	echo "<a href='" . BASE_URL . "'>Início</a>";
	error_log("Error " . $e->getMessage(), 3, "error_bd.log");
}
