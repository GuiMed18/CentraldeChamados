<?php
error_reporting(0);
ini_set("display_errors", 0 );

include '../../CPDPanel/database/conn/conexao.php';
date_default_timezone_set('America/Sao_Paulo');

$user_logado = $_SESSION['usuarioEmail'];

$nivel_acesso = $_SESSION['usuarioNiveisAcessoId'];


 if($nivel_acesso == '5' ||  $nivel_acesso == '4' ||  $nivel_acesso == '3'){

if($_GET['estado'] && isset($_GET['data']) != true){
    $estado = $_GET['estado'];
    $sql = "SELECT * FROM manutencao WHERE estado = '$estado' ORDER BY estado ASC";
    
   
}elseif($_GET['data'] && isset($_GET['estado']) != true){
    $data = $_GET['data'];
    $sql = "SELECT * FROM manutencao WHERE data LIKE '%$data%' ORDER BY estado ASC";

}elseif($_GET['data'] && $_GET['estado']){
    $data = $_GET['data'];
    $estado = $_GET['estado'];

    $sql = "SELECT * FROM manutencao WHERE estado = '$estado' and data LIKE '%$data%' ORDER BY estado ASC";

}else{
    $sql = "SELECT * FROM manutencao order by estado asc";
}
  

}else{
    $sql = "SELECT * FROM manutencao where login_solici = '$user_logado' order by estado asc" ;
}


$conecta_banco = mysqli_query($connection,$sql);


if(isset($_GET['id'])){
$id_ticket = $_GET['id'];
$teste = $id_ticket;
$sql_exibe = "SELECT * FROM manutencao where id = '$teste'";    

$conn_exibicao = mysqli_query($connection,$sql_exibe);
$dados = mysqli_fetch_array($conn_exibicao);
$assunto = $dados['assunto'];
$conteudo = $dados['conteudo'];
$urgencia = $dados['urgencia'];
$posicionamento = $dados['posicionamento'];
$solicitante = $dados['solicitante'];
$status = $dados['estado'];
$agente = $dados['agente'];
$data = $dados['data'];
$login_user = $_SESSION['usuarioEmail'];

$query_visu_user = mysqli_query($conn, "SELECT * FROM manutencao where login_solici = '$login_user'");
$fetch_visu_user = mysqli_fetch_array($query_visu_user);
$perm_visu_user = $fetch_visu_user['login_solici'];


}

?>


