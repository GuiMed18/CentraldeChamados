<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("Location: login.php");
    exit;
}

include('../CPDPanel/database/conn/conexao.php');
include('../CPDPanel/database/database.php');
include('func/exibe_ticket.php');

?>
<head>

<?php
include('head.php');
?>
<style>
#divs{
margin-left:3em;
margin-top:em;
position: inherit;
}


</style>
</head>
<body id="page-top">




			<?php 
			include('sidebar.php');	
			include('cab_rod_cn/title.php');
			?>
			<!-- Início do conteúdo -->
			<div class="row">
								<div class="col-xl-11 col-md-4 mb-5" id="divs">
									<div class="card border-left-info shadow h-100 " >
										<div class="card-body"  >
											<div class="row no-gutters align-items-center" >
												<div class="col mr-2" >												
													<div class="h6 font-weight-bold text-primary text-uppercase mb-1"> 
													Consulta de chamados	
													</div>
													</br>

													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado">Filtrar </button>
													<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="TituloModalCentralizado">Filtrar</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">													
													<form action="func/processa_ticket.php" method="POST">
													</br>
													<div>Filtrar por data de criação: 
													<input type="date" class="rounded" name="data" id="calendario">
													</div></br>
													<div>Filtrar por estado do chamado: 
													<select name="filtra_estado" class="rounded">
														
														<option value="Em Aberto">Em Aberto</option>
														<option value="Fechado">Fechado</option>
													</select>
													</div></br>
													<div class="modal-footer">
														<input type="submit" class="btn btn-primary" name="limpa"  value="Limpar pesquisa">
														<input type="submit" class="btn btn-primary"  value="Buscar">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
													
													</div>
													</form>
													</div>
												</div>
											</div>
										</div>
										<br/><br/>

														<?php
													$row = 0;
													while($chamados = mysqli_fetch_assoc($conecta_banco)){
															$ticket[$row] = $chamados['id'];
															$assunto_ticket[$row] = $chamados['assunto'];
															$urgencia_ticket[$row] = $chamados['urgencia'];
															$data_ticket[$row] = $chamados['data'];
															$estado_ticket[$row] = $chamados['estado'];
															$solicitante[$row] = $chamados['login_solici'];

														$row++;

													}

													if($row == ''){
														echo "<div> Você ainda não abriu nenhum chamado! </div>";
													}else{?>
													<table class="table table-hover">
													<thead>
													<tr>														
														<th scope="col">Ticket</th>
														<th scope="col">Assunto</th>
														<th scope="col">Urgência</th>
														<th scope="col">Data</th>
														<th scope="col">Estado</th>
														<th scope="col">Solicitante</th>
														
													</tr>
													</thead>
													<?php
													$conta = 0;													
													$cont2 = 30;
													$teste = 1;
													
													while($conta <= $cont2){ 

														if(is_null($ticket[$conta]) || empty($ticket[$conta])){
															break;
														}
														?>
														<tbody style='cursor: pointer; cursor: hand;' onclick="window.location='trata_ticket.php?id=<?php echo $ticket[$conta]; ?>'">
														<?php
														if($urgencia_ticket[$conta] == "Alta"){?>
														<tr  class="table-danger">
														<?php }elseif($estado_ticket[$conta] == "Fechado"){ ?>
														<tr  class="table-success">
															<?php }else{ ?>
														<tr  class="table-warning">	
															<?php } ?>							
														<td scope="row"><?php echo $ticket[$conta]; ?></td>
														<td scope="row"><?php echo $assunto_ticket[$conta]; ?></td>
														<td scope="row"><?php echo $urgencia_ticket[$conta]; ?></td>
														<td scope="row"><?php echo $data_ticket[$conta]; ?></td>	
														<td scope="row"><?php echo $estado_ticket[$conta]; ?></td>	
														<td scope="row"><?php echo $solicitante[$conta]; ?></td>	
														</tr>
														</tbody>
													


													 <?php $conta++; } ?>
																						



													</table>
													<?php } ?>
												
																										
											</div>
											
											</div>
										</div>
									</div>
								</div>
								


			<?php
			include('cab_rod_cn/rodape.php');
			
			
			?>
			
					
</body>

</html>
