<?php
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$user = $_POST['nome'];
$setor = $_POST['setor'];
$login_usuario = $_POST['usuario'];

date_default_timezone_set('America/Sao_Paulo');

$dia = date("d/m/Y");
$horario = date("H:i");
$data = $dia.' as '.$horario;

include('../../CPDPanel/database/conn/conexao.php');

if($titulo == '' || $conteudo == '' || $setor == ''){
  header('location: ../PPE/abre_ata.php');
   
}else{
    $insere = mysqli_query($conn, "INSERT INTO cftv_ata (assunto,conteudo,data,usuario,login_solici,setor) VALUES ('$titulo','$conteudo','$data','$user','$login_usuario','$setor')");
    if($insere){
    header('location: ../index.php?reg=ok');
    }else{
        echo "Deu ruim";
    }
  
}



	
?>


