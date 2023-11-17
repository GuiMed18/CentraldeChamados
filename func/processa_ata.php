<?php
error_reporting(0);
ini_set("display_errors", 0 );

include '../../CPDPanel/database/conn/conexao.php';
date_default_timezone_set('America/Sao_Paulo');

#Aqui ele valida se os campos de filtro foram enviados, formata e monta os GET para processamento do exibe_ata.php

if($_POST['data'] && $_POST['filtrasetor'] == 'Setor' && $_POST['user_ata'] == "usr_false" ){
   
    $recebe_data = $_POST['data'];
    $formata_data = explode('-',$recebe_data);
    $data = $formata_data[2]."/".$formata_data[1]."/".$formata_data[0];
   
    header('Location:../PPE/consulta_ata.php?data='.$data);

    }elseif($_POST['filtrasetor'] && $_POST['data'] != true && $_POST['user_ata'] == "usr_false"){        
      
        $filtro_setor = $_POST['filtrasetor'];
        $recebe_data = $_POST['data'];
        header('Location:../PPE/consulta_ata.php?setor='.$filtro_setor);
      
    }elseif($_POST['user_ata'] && $_POST['data'] != true && $_POST['filtrasetor'] == "Setor"){
        $filtro_usuario = $_POST['user_ata'];
        header('Location: ../PPE/consulta_ata.php?usuario='.$filtro_usuario);

    }
    elseif($_POST['filtrasetor'] || $_POST['data'] || $_POST['user_ata']){  
        $recebe_data = $_POST['data'];
        $formata_data = explode('-',$recebe_data);
        $data = $formata_data[2]."/".$formata_data[1]."/".$formata_data[0];       
        $filtro_setor = $_POST['filtrasetor'];
        $filtro_usuario = $_POST['user_ata'];
      
        header('Location:../PPE/consulta_ata.php?setor='.$filtro_setor.'&data='.$data.'&usuario='.$filtro_usuario);
        
        
    }else{
     header('Location:../PPE/consulta_ata.php');
    }


if(isset($_POST['limpa'])){
    unset($_POST['data']);
    header('Location:../PPE/consulta_ata.php');
    }
?>


