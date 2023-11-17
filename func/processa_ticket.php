<?php
error_reporting(0);
ini_set("display_errors", 0 );

include '../../CPDPanel/database/conn/conexao.php';
date_default_timezone_set('America/Sao_Paulo');

$n_chamado = $_POST['id_tkt'];

$posiciona = $_POST['content'];

$usuario = $_POST['nome'];

error_reporting(0);
ini_set("display_errors", 0 );

date_default_timezone_set('America/Sao_Paulo');

#Aqui ele valida se os campos de filtro foram enviados, formata e monta os GET para processamento do exibe_ata.php

if($_POST['data'] && $_POST['filtra_estado'] == false){
   
    $recebe_data = $_POST['data'];
    $formata_data = explode('-',$recebe_data);
    $data = $formata_data[2]."/".$formata_data[1]."/".$formata_data[0];
   
   
    header('Location:../consulta_ticket.php?data='.$data);

    }elseif($_POST['filtra_estado'] && $_POST['data'] == false){
        $estado = $_POST['filtra_estado'];
       header('Location:../consulta_ticket.php?estado='.$estado);


    }elseif($_POST['filtra_estado'] && $_POST['data']){
        $recebe_data = $_POST['data'];
        $formata_data = explode('-',$recebe_data);
        $data = $formata_data[2]."/".$formata_data[1]."/".$formata_data[0];
        $estado = $_POST['filtra_estado'];

      header('Location:../consulta_ticket.php?data='.$data.'&estado='.$estado);
      
    }
    else{
      
       header('Location:../consulta_ticket.php');
    }



if(isset($_POST['limpa'])){
    unset($_POST['data']);
    unset($_POST['filtra_estado']);
   header('Location:../consulta_ticket.php');
    }


if($posiciona != true){
  
}else{
    $insere_tabela = mysqli_query($connection, "UPDATE manutencao set posicionamento = '$posiciona', agente = '$usuario' where id = '$n_chamado'");
    $fecha_ticket = mysqli_query($connection,"UPDATE manutencao set estado = 'Fechado' where id = '$n_chamado'");
   header('Location: ../consulta_ticket.php?valpostkt='.$usuario);
   
}


?>


