<?php
error_reporting(0);
ini_set("display_errors", 0 );

include '../../CPDPanel/database/conn/conexao.php';
date_default_timezone_set('America/Sao_Paulo');
# Aqui ele valida se foram setadas os GET do processa_ata e faz as queries no banco 

if(isset($_GET['data']) && isset($_GET['setor']) != true && isset($_GET['usuario']) != true){

$data = $_GET['data'];
$sql = "SELECT * FROM cftv_ata WHERE DATA LIKE '%$data%' order by data desc";

}

elseif(isset($_GET['setor']) && isset($_GET['data']) != true && isset($_GET['usuario']) != true){
   
$sector = $_GET['setor'];
$sql = "SELECT * FROM cftv_ata WHERE setor LIKE '$sector'";

}elseif(isset($_GET['usuario']) && isset($_GET['data']) != true && isset($_GET['setor']) != true){

$usuario = $_GET['usuario'];
$sql = "SELECT * FROM cftv_ata WHERE login_solici LIKE '$usuario' order by data desc";

}
elseif(isset($_GET['data']) || isset($_GET['setor']) || isset($_GET['usuario'])){

$sector = $_GET['setor'];    
$data = $_GET['data'];
$usuario = $_GET['usuario'];

$sql = "SELECT * FROM cftv_ata WHERE setor LIKE '$sector' and data LIKE '%$data%' and login_solici LIKE '$usuario' order by data desc";
}else{

$sql = "SELECT * FROM cftv_ata ORDER BY data DESC"; 

}

$conecta_banco = mysqli_query($connection,$sql);

if(isset($_GET['id'])){
$id_ticket = $_GET['id'];
$teste = $id_ticket;
$sql_exibe = "SELECT * FROM cftv_ata where id = '$teste'";    

$conn_exibicao = mysqli_query($connection,$sql_exibe);
$dados = mysqli_fetch_array($conn_exibicao);
$assunto = $dados['assunto'];
$conteudo = $dados['conteudo'];
$colaborador = $dados['usuario'];
$status = $dados['estado'];
$dia = $dados['data'];
}

?>


