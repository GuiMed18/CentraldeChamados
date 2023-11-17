<?php
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$urgencia = $_POST['prioridade'];
$login_solicitante = $_POST['usuario'];
$solicitante = $_POST['nome'];


 var_dump($solicitante);


date_default_timezone_set('America/Sao_Paulo');

$dia = date("d/m/Y");
$horario = date("H:i");
$data = $dia.' as '.$horario;

include('../../CPDPanel/database/conn/conexao.php');

if($titulo == '' || $conteudo == '' || $urgencia == ''){
    header('location: ../abre_ticket.php');
   
}else{
    $insere = mysqli_query($conn, "INSERT INTO manutencao (assunto,conteudo,urgencia,data,estado,solicitante,login_solici) VALUES ('$titulo','$conteudo','$urgencia','$data','Em Aberto','$solicitante','$login_solicitante')");
    include('mail_ticket.php');
    header('location: ../index.php?reg=ok');
  
}

	
?>


