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
$user = $_SESSION['usuarioNome'];

if($_SESSION['usuarioEmail'] != $perm_visu_user && $_SESSION['usuarioNiveisAcessoId'] != '4' && $_SESSION['usuarioNiveisAcessoId'] && $_SESSION['usuarioNiveisAcessoId'] != '3' && $_SESSION['usuarioNiveisAcessoId'] != '5'){
	
	header("Location: func/telas_erro/erro_permissao.php");
}
?>
<head>

<?php
include('head.php');

?>
<style>
#divs{
margin-left:3em;


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
		
			
								<div class="col-xl-11 col-md-2 mb-5" id="divs">
									<div class="card border-left-info shadow h-100 " >
										<div class="card-body"  >
											<div class="row no-gutters align-items-center" >
												<div class="col mr-2" >
												<?php

													if($_SESSION['usuarioNiveisAcessoId'] == "4" || $_SESSION['usuarioNiveisAcessoId'] == "3" || $_SESSION['usuarioNiveisAcessoId'] == "5"){?>

													<input type="button" class="btn btn-primary btn-sm" value="Imprimir Ticket" id="btnImprimir" onclick='impre_ticket()'/>	

													<?php } ?>
													<br><br>
												<div id="ticket">
												<h5 class="h6 font-weight-bold text-primary text-uppercase mb-1">	Tratativa do chamado <?php echo $teste."<br><br> <h6>Aberto em: ".$data."<br><br> Solicitado por: ".$solicitante; if($status == 'Fechado'){	echo " | Finalizado por: ".$agente."</h6>";}?>
													
												
												<form action="func/processa_ticket.php" method="POST" onsubmit="validadados()">

												<input type="text" value="<?php echo $_GET['id']; ?>" name="id_tkt" hidden>			
													
													<br>										
												<h6>Assunto:</h6>
												
												<input type="text" name="titulo" class="form-control" value="<?php echo $assunto; ?>" disabled>
												
												<br>
												<h6>Conteúdo:</h6>
												<div class="form-group">
													<textarea name="conteudo" class="form-control" rows="3" id="conteudo" placeholder="<?php echo $conteudo; ?>" disabled></textarea>

												</div>
												<h6>Prioridade:</h6>
												<input type="text" name="prioridade" class="form-control" value="<?php echo $urgencia; ?>" disabled>

												<br>
													
												<?php
														
																					
												if($_SESSION['usuarioNiveisAcessoId'] == "4" && $status == "Em Aberto"){ ?>
												</div>
													<h6>Posicionamento Manutenção:</h6>
													<div class="form-group">
													<textarea name="content" id="cont" class="form-control" rows="2" placeholder="Posicionamento"></textarea>	</div>										
													<br>
													<textarea name="nome" id="nome" hidden ><?php echo $_SESSION['usuarioNome']; ?></textarea>
													
													<input type="submit" value="Finalizar chamado" id="enviaposicionamento" class="btn btn-primary" style="float:right;">
													
													
												<?php } else{?>
													<h6>Posicionamento Manutenção:</h6>
													<div class="form-group">
													<textarea name="conteudo" id="cont" class="form-control" rows="2" placeholder="<?php if($posicionamento == false){echo "Chamado em aberto, ainda não foi atendido";}else{echo $posicionamento;} ?>" disabled></textarea>
											    	</div>
												

												<?php } ?>

											
													
													
													<br>
													</div>
													

																						

												</form>
												
												
												
											
												</div>
											
											</div>
										
											</div>
										</div>
									</div>
								</div>
								</div>
							


			<?php
			include('cab_rod_cn/rodape.php');
			
		
			?>
			<script>

				function validadados(){
				var posicionamento = document.querySelector('#cont').value;	
				
				if(posicionamento == ''){
				window.alert('Por favor, preencha o campo "Posicionamento"')
				return false;
				}


				}
			function impre_ticket() {
            var divContents = document.getElementById("ticket").innerHTML;
			var user_logado = '<?php echo $user; ?>';
		
			var style = "<style>";
			style = style + "textarea, input {width: 80%; margin-left:3em; overflow:hidden;font-family: 'Ubuntu';padding-bottom:5%}";		
			style = style + "@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');"
			style = style + "h6 {font-size:12px;text-align:center; font-family: 'Ubuntu'}";
			style = style + "h5 {font-size:16px;text-align:center; font-family: 'Ubuntu'}";
			style = style + "h7 {font-size:12px;text-align:left; font-family: 'Ubuntu'; margin: 1em; margin-left: 1em}";
			
			style = style + "</style>";
            var a = window.open('', '', 'height=900, width=500');
            a.document.write('<html>');					
            a.document.write('<body>');
			a.document.write('<img src="https://srvsave140.br-atacadao.corp/CPDPanel/_docs/ico/atc.svg">');
			a.document.write('<h6 style="float:right;">CSC - Manutenção - Filial 140 </h6>');
			a.document.write('<div style="border: 1px solid black">');
			a.document.write(style); 	
            a.document.write(divContents);
			a.document.write('<h7>Documento impresso por: '+user_logado);
			a.document.write('</div>');			
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
				</script>

			</script>
					
</body>

</html>
