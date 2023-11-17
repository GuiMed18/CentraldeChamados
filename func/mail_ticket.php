<?php

include('../../database/conn/conexao.php');
include('../../CPDPanel/config.php');

date_default_timezone_set('America/Sao_Paulo');


$sql = mysqli_query($conn, "SELECT * FROM manutencao ORDER BY id desc limit 1");
$array_ticket = mysqli_fetch_array($sql);
$id_ticket = $array_ticket['id'];
$usu_abertura = $array_ticket['solicitante'];


$email = "$email_cpd,"."$email_sup_adm";
$destino = $email;
$assunto = "CSC Manutenção - Novo registro detectado";

// É necessário indicar que o formato do e-mail é html
$headers = '
Olá!
Foi detectado um novo chamado registrado no portal da manutenção aberto por '.$usu_abertura.'!
Clique para visualizar: https://srvsave140.br-atacadao.corp/manutencao/trata_ticket.php?id='.$id_ticket.'

';

$headers .= "\r\n\r\n". 'Economize cada centavo! Seja consciente, imprima somente o necessario.  -- Centro de Processamento de Dados (CPD 140) --';
//$headers .= "Bcc: $EmailPadrao\r\n";

$envia = mail($destino, $assunto, $headers);




?>

