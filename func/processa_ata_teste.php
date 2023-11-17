<?php
error_reporting(0);
ini_set("display_errors", 0 );

include '../../CPDPanel/database/conn/conexao.php';
date_default_timezone_set('America/Sao_Paulo');

#Aqui ele valida se os campos de filtro foram enviados, formata e monta os GET para processamento do exibe_ata.php

if($_POST['data'] && $_POST['filtrasetor'] == 'Setor' && $_POST['user_ata'] == "usr_false" ){
   
   echo "passou na 1";

    }elseif($_POST['filtrasetor'] && $_POST['data'] != true && $_POST['user_ata'] == "usr_false" ){        
        echo "passou na 2";
       
      
    }elseif($_POST['user_ata'] && $_POST['data'] != true && $_POST['filtrasetor'] == "Setor"){
      
        echo "passou na 3";
    }
    elseif($_POST['filtrasetor'] || $_POST['data'] || $_POST['user_ata']){  
        echo "passou na 4";
        
    }else{
        echo "passou na 5";
    }


if(isset($_POST['limpa'])){
    unset($_POST['data']);
    header('Location:../PPE/consulta_ata.php');
    }
?>


