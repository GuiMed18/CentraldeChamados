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

?>
<head>

<?php
include('head.php');
?>
<style>
#divs{
margin-left:6em;
margin-top:5em;
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
			
			<?php 
			if(isset($_GET['reg']) != true || is_null($_GET['reg'])){ ?>
			
			<?php }elseif($_GET['reg'] == 'ok'){ ?> 
			<div class="h6 font-weight-bold text-center text-success text-uppercase mb-1">
				Chamado registrado com sucesso!												
			</div>	
			
			<?php } else{ ?> 

			<div class="h6 font-weight-bold text-danger text-center text-uppercase mb-1">
			Ocorreu um erro na criação do chamado!												
			</div>

			<?php } ?>
		
			<div class="row">
			<a href="abre_ticket.php">
								<div class="col-xl-4 col-md-4 mb-5" id="divs">
									<div class="card border-left-info shadow h-100 " >
										<div class="card-body"  >
											<div class="row no-gutters align-items-center" >
												<div class="col mr-2" >
												
													<div class="h6 font-weight-bold text-primary text-uppercase mb-1"> 
													Abertura de Chamado	</div></br>
													<div class="h7 mb-0 text-secundary text-dark">
														Abrir um chamado
													</div>
																										
											</div>
												<div class="col-auto">
													<i class="icon"></i>
												</div>
											</div>
										</div>
									</div>
				</a>
								</div>
						
								
								<a href="consulta_ticket.php">
								<div class="col-xl-4 col-md-4 mb-5" id="divs">							
									<div class="card border-left-info shadow h-100 " >									
										<div class="card-body">											
											<div class="row no-gutters align-items-center">										
												<div class="col mr-2">
												
													<div class="h6 font-weight-bold text-primary text-uppercase mb-1">
														Consultar chamados</div></br>
													<div class="h7 mb-0 text-secundary text-dark">
														Consulta geral de chamados
													</div>
													
												</div>
												
											</div>
										</div>
									</div>
									
									</a>
								</div>
					<?php
					if($_SESSION['usuarioNiveisAcessoId'] == '6' || $_SESSION['usuarioNiveisAcessoId'] == '3' || $_SESSION['usuarioNiveisAcessoId'] == '5' ){
					
					
						?>
								<a href="PPE/abre_ata.php">
								<div class="col-xl-4 col-md-4 mb-5" id="divs">							
									<div class="card border-left-info shadow h-100 " >									
										<div class="card-body">											
											<div class="row no-gutters align-items-center">										
												<div class="col mr-2">
												
													<div class="h6 font-weight-bold text-primary text-uppercase mb-1">
														Registro de Ocorrência</div></br>
													<div class="h7 mb-0 text-secundary text-dark">
														Registrar ocorrências PPE
													</div>
													
												</div>
												
											</div>
										</div>
									</div>
									
									</a>
								</div>

								<a href="PPE/consulta_ata.php">
								<div class="col-xl-4 col-md-4 mb-5" id="divs">							
									<div class="card border-left-info shadow h-100 " >									
										<div class="card-body">											
											<div class="row no-gutters align-items-center">										
												<div class="col mr-2">
												
													<div class="h6 font-weight-bold text-primary text-uppercase mb-1">
														Acompanhamento de Ocorrências</div></br>
													<div class="h7 mb-0 text-secundary text-dark">
														Consulta de ocorrências da prevenção
													</div>
													
												</div>
												
											</div>
										</div>
									</div>
									
									</a>
								</div>
					
								<?php } ?>

				


			<?php
			include('cab_rod_cn/rodape.php');
			
		
			?>
					
</body>

</html>
