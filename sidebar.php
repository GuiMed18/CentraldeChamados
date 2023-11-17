<?php

$nome = $_SESSION['usuarioNome'];

?>
<div id="wrapper">
				<ul class="navbar-nav bg-gradient-primary sidebar sticky-top sidebar-dark accordion" id="accordionSidebar">
					<a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://srvsave140.br-atacadao.corp/manutencao/index.php">
						<div class="sidebar-brand-icon rotate-n-15">
							<i class="fas fa-dragon"></i>
						</div>
						<div class="sidebar-brand-text mx-3">Csc Manutenção</div>
					</a>
					<hr class="sidebar-divider my-0">
					<li class="nav-item active">
						<div class="nav-link">
							
							<div id="hora"></div><br><?php echo $nome.'!';?>
					</div><!--
					<hr class="sidebar-divider">
					
					<li class="nav-item active">
						<a class="nav-link" href="/CPDPanel/index.php" >
							<i class="fas fa-fw fa-tachometer-alt"></i>
							<span>Relatórios</span>
						</a>
						
								<a class="nav-link" href="/CPDPanel/screens/princ/estoque.php">
						<i class="fa fa-dolly"></i>
							<span>Estoque</span>
						</a>
						
					</li>

					<li class="nav-item active">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Ger" aria-expanded="true" aria-controls="Ger">
							<i class="fa fa-chart-pie"></i>
							<span>Gerencial WEB</span>
						</a>
						<div id="Ger" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="i.s.v.php">I.S.V</a>								
						</div>
						</div>
						
						
					</li>
					<li class="nav-item active">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
							<i class="fa fa-chart-line"></i>
							<span>Painel de Vendas</span>
						</a>
						<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Painel de Vendas</h6>
								<a class="collapse-item" href=" /CPDPanel/screens/princ/vendas.php">Vendas</a>	
								<a class="collapse-item" href=" /CPDPanel/screens/princ/cafeteria.php">Cafeteria</a>	
								<a class="collapse-item" href=" /CPDPanel/screens/princ/recargas.php">Recargas</a>	
								<a class="collapse-item" href=" /CPDPanel/screens/princ/pix.php">PIX</a>	

</div>
</div>
				<hr class="sidebar-divider">
					<div class="sidebar-heading">
						Documentos
					</div>
					<li class="nav-item">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							<i class="far fa-file-alt"></i>
							<span>Documentos</span>
						</a>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href=" /CPDPanel/screens/princ/treinamentos.php">Treinamentos</a>
			
							</div>
						</div>
					</li>	-->
					<hr class="sidebar-divider">
								
			
					
					<li class="nav-item">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
							<i class="fas fa-fw fa-folder"></i>
							<span>Funcionalidades</span>
						</a>
						<div id="collapse2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
								<h6 class="collapse-header">Chamados</h6>
								<a class="collapse-item" href="abre_ticket.php" >Abertura de chamado</a>
								<a class="collapse-item" href="consulta_ticket.php" >Consulta de chamados</a>
							<?php if($_SESSION['usuarioNiveisAcessoId'] == '6' || $_SESSION['usuarioNiveisAcessoId'] == '3' || $_SESSION['usuarioNiveisAcessoId'] == '4'){ ?>
								<h6 class="collapse-header">Atas PPE</h6>
								<a class="collapse-item" href="PPE/abre_ata.php" >Registro de ocorrência</a>
								<a class="collapse-item" href="PPE/consulta_ata.php" >Consulta de ocorrência</a>
								<?php } ?>
							</div>
						</div>
					</li>
					<script>
						(function() {
					function checkTime(i) {
						return (i < 10) ? "0" + i : i;
					}
						function startTime() {
						var today = new Date(),
							h = checkTime(today.getHours()),
							m = checkTime(today.getMinutes()),
							s = checkTime(today.getSeconds());
							if(h <= 05){
							document.getElementById('hora').innerHTML = 'Boa Madrugada,';
							}else if(h <= 11){
							document.getElementById('hora').innerHTML = 'Bom dia,';
							}else if(h <= 18){
							document.getElementById('hora').innerHTML = 'Boa Tarde,';
							}else if(h <= 23){
							document.getElementById('hora').innerHTML = 'Boa Noite,';
							}else 



						
						t = setTimeout(function() {
							startTime()
						}, 10000);
					}
					startTime();
				})();


						</script>
