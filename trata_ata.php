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
include('func/exibe_ata.php');

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
												<div class="h6 font-weight-bold text-primary mb-1"> 
													Ata do dia <?php echo substr($dia,0,10); ?>	</div></br>
											

												<input type="text" value="<?php echo $_GET['id']; ?>" name="id_tkt" hidden>			

												<input type="text" name="nome" id="nome" value=<?php echo $_SESSION['usuarioNome']; ?> hidden>



												<input type="text" name="titulo" class="form-control" value="<?php echo $assunto; ?>" disabled>
												<br>

												<div class="form-group">
													<textarea name="conteudo" class="form-control" rows="3"  placeholder="<?php echo $conteudo; ?>" disabled></textarea>

												</div>						
														
																					
												

											
													Escrito por: <?php echo $colaborador; 
													echo "<br>";

													
													?>
													
													
												
												

																						

																											
											</div>
												
											</div>
										</div>
									</div>
								</div>
								
							


			<?php
			include('cab_rod_cn/rodape.php');
			
		
			?>
			

			</script>
					
</body>

</html>
