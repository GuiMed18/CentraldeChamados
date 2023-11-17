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
$nome_usu = $_SESSION['usuarioNome'];
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
												<div class="h6 font-weight-bold text-primary text-uppercase mb-1"> 
													Abertura de Chamado	</div></br>

												<form action="func/reg_ticket.php" method="POST" onsubmit="validadados()">
												<!-- Inputs que coletam dados do user logado -->
												<input type="text" name="usuario" id="usuario" value=<?php echo $_SESSION['usuarioEmail']; ?> hidden>
												<textarea name="nome" id="nome" hidden><?php echo $_SESSION['usuarioNome']; ?></textarea>
												
																						
												<input type="text" id="titulo" name="titulo" class="form-control" placeholder="Assunto">
												<br>

												<div class="form-group">
													<textarea name="conteudo" id="conteudo" class="form-control" rows="10" placeholder="Descrição"></textarea>
												</div>

												<div class="form-group" >													
													<select class="form-control" name="prioridade" id="prioridade">
														<option  value="Baixa" >Baixa</option>
														<option  value="Media" selected>Média</option>
														<option  value="Alta"  >Alta</option>
													
													</select>
												</div>

												<input type="submit" value="Enviar" class="btn btn-primary" style="float:right">

																						

												</form>
																											
											</div>
												<div class="col-auto">
													<i class="icon"></i>
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
			var titulo = document.querySelector('#titulo').value;	
			var conteudo = document.querySelector('#conteudo').value;	
			
			if(titulo == '' || conteudo == ''){
			window.alert('Por favor, revise os campos')
			return false;
			}


			}</script>
					
</body>

</html>
