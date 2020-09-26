<?php 

            /* Dados em JSON vindos do Front end
              {
                "tipopessoa": "FÍSICA",
                "cpf": "14557778965",
                "cnjp": "XX.XXX.XXX/XXXX-XX",
                "razao_social": "Empresa tal",
                "nome_fantasia": "Empresa tal",
                "logomarca": "EMPT",
                "proprietario": "Jefferson",
                "gerente": "Ayrton",
                "departamento": "Fiaças"
              } 
          */



require_once "../model/connection.php";
session_start();
$data = ["info" => true];
$id_usuario = $_SESSION['user']->id;

/*
*   Methodo PUT , 
*/

// data recebe a req PUT , pegamos os contents 
$data = file_get_contents("php://input",true);
parse_str($data, $data);

$data = (object)$data;
$tipo_pessoa = isset($data->tipo_pessoa) ? "tipo_pessoa="."'$data->tipo_pessoa'" : "tipo_pessoa=tipo_pessoa";
$cpf = isset($data->cpf) ? "cpf="."'$data->cpf'" : "cpf=cpf";
$cnpj = isset($data->cnpj) ? "cnpj="."'$data->cnpj'" : "cnpj=cnpj";
$razao_social = isset($data->razao_social) ? "razao_social="."'$data->razao_social'" : "razao_social=razao_social";
$nome_fantasia = isset($data->nome_fantasia) ? "nome_fantasia="."'$data->nome_fantasia'" : "nome_fantasia=nome_fantasia";
$logomarca = isset($data->logomarca) ? "logomarca="."'$data->logomarca'" : "logomarca=logomarca";
$proprietario = isset($data->proprietario) ? "proprietario="."'$data->proprietario'" : "proprietario=proprietario";
$gerente = isset($data->gerente) ? "gerente="."'$data->gerente'" : "gerente=gerente";
$departamento = isset($data->departamento) ? "departamento="."'$data->departamento'" : "departamento=departamento";

$query = "UPDATE cliente_info SET   $cpf,$tipo_pessoa,$cnpj,$razao_social,$nome_fantasia,$logomarca,$proprietario,$gerente,$departamento,update_time = NOW() WHERE  cliente_id = $id_usuario ";
// Conexão=======================Preparando==========================Execução
$conn = Connection::start(); $stmt = $conn->prepare($query); $stmt->execute();

echo (json_encode( ['info' => $stmt->execute(),
                    'query'=> $query]));



?>

