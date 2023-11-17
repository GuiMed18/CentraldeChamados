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

include('../../CPDPanel/database/conn/conexao.php');
include('../../CPDPanel/database/database.php');
include('../func/exibe_ata.php');

?>
<head>

<?php
include('../head.php');
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
			include('../sidebar.php');	
			include('../cab_rod_cn/title.php');
			?>
			<!-- Início do conteúdo -->
			<div class="row">
								<div class="col-xl-11 col-md-4 mb-5" id="divs">
									<div class="card border-left-info shadow h-100 " >
										<div class="card-body"  >
											<div class="row no-gutters align-items-center" >
												<div class="col mr-2" >												
													<div class="h6 font-weight-bold text-primary text-uppercase mb-1"> 
													Consulta de atas	
													</div></br>
													<!-- Modal -->
												
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
													<form action="../func/processa_ata.php" method="POST">
												
													<div>Filtrar por data de criação: 
													<input type="date" class="rounded" name="data" id="calendario">
													</div>
													<br>
													<div>Filtrar por setor: 
													<select class="rounded" name="filtrasetor">
													<option hidden>Setor</option>
													<option value="Entrada de Loja" id="setor">Entrada de Loja</option>
													<option value="CFTV" id="setor">CFTV</option>
													<option value="Recebimento" id="setor">Recebimento</option>
													<option value="Recepção" id="setor">Recepção</option>
													<option value="Ronda" id="setor">Ronda</option>
													<option value="Confinado" id="setor">Confinados</option>
													<option value="Estacionamento" id="setor">Estacionamento</option>
													</select>
													</div>
													<br>
													<div>Filtrar por usuário: 
													<select name="user_ata" class="rounded">
													<?php								
													$sqldata_ger = mysqli_query($connection,"SELECT DISTINCT login_solici FROM cftv_ata order by data desc");
													while ($lista_usu_ata = mysqli_fetch_array ($sqldata_ger))
													{
														$usuario_ata = $lista_usu_ata['login_solici'];												
														
												?>
													<option value="usr_false" hidden selected>Usuário</option>
													<option value="<?php echo $usuario_ata;?>" <?php if($usuario_ata != $usuario_ata){ echo 'selected="selected"';} ?>><?php echo $usuario_ata; ?></option>
												<?php
													}
												?>
													</select>
													</div>
													</div>

											
													</br>
													
													<div class="modal-footer">
														<input type="submit" class="btn btn-primary" name="limpa"  value="Limpar pesquisa">
														<input type="submit" class="btn btn-primary"  value="Buscar">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
													
													</div>
													</form>
													</div>
												</div>
												</div>
												
												

													<?php
												
													$row = 0;
													while($chamados = mysqli_fetch_assoc($conecta_banco)){
															$ticket[$row] = $chamados['id'];
															$assunto_ticket[$row] = $chamados['assunto'];															
															$data_ticket[$row] = $chamados['data'];															
															$solicitante[$row] = $chamados['login_solici'];
															$setor[$row] = $chamados['setor'];

														$row++;
												}
											

													if(isset($data) && $data == 'false' || $row == ''){
														echo "<br/><br/><div> Não foram encontradas atas para este dia! </div><br>";
													}else{
														
														
														?>
														</br>
														</br>
													<table class="table table-hover">
													<thead>
													<tr>														
														
														<th scope="col">Ata</th>
														<th scope="col">Data de criação</th>	
														<th scope="col">Setor</th>													
														<th scope="col">Usuário</th>
														
													</tr>
													</thead>
													<?php
													$conta = 0;													
													$cont2 = 30;
													$teste = 1;
	
													while($conta <= $cont2){ 

														if(empty($ticket[$conta])){
															break;
														}
														?>
														<tbody style='cursor: pointer; cursor: hand;' onclick="window.location='../trata_ata.php?id=<?php echo $ticket[$conta]; ?>'">
														<tr>													
														
														<td scope="row"><?php echo $assunto_ticket[$conta]; ?></td>														
														<td scope="row"><?php echo $data_ticket[$conta]; ?></td>	
														<td scope="row"><?php echo $setor[$conta]; ?></td>														
														<td scope="row"><?php echo $solicitante[$conta]; ?></td>	
														</tr>
														</tbody>
													


													 <?php $conta++; } ?>
																						



													</table>
													<?php }  ?>
												
																										
											</div>
											
											</div>
										</div>
									</div>
								</div>
								


			<?php
			include('../cab_rod_cn/rodape.php');
			
			
			?>
			<script>
				function validadata(){
				var calendario = document.queryselector('#calendario').value;

				if(calendario == ''){
					window.alert('Selecione uma data');
				}
				}
			</script>
					
</body>

</html>
