<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSC Manutenção - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../CPDPanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../CPDPanel/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center text-gray-700">
                                        <div class="sidebar-brand-icon rotate-n-15">
                                            <i class="fas fa-dragon fa-2x"></i>
                                        </div><br>
                                        <div class="sidebar-brand-text mx-3">
                                            <h4>Csc - Manutenção </h4>
                                        </div>
                             <form class="form-signin" method="POST" action="func/verif_login.php">
                            <div class="card-body text-center">
                                <div class="mb-4">
                                    <i class="feather icon-unlock auth-icon"></i>
                                </div>
                                <h3 class="mb-4">Login</h3>

                        <label for="inputEmail" class="sr-only">Email</label>
                       <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus><br>
                       <label for="inputPassword" class="sr-only">Senha</label>
                       <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
                    
                  
 

                 <br>
                        </div>
                        
                        <button class="btn btn-primary shadow-2 mb-4" type="submit">Acessar</button>
                        <p class="mb-0 text-muted">Não possui registro?</p>
                        <p class="mb-0 text-muted">Contate o CPD!</p>
                    </div>
                </form>
                <p class="text-center text-danger">
        <?php if(isset($_SESSION['loginErro'])){
            echo $_SESSION['loginErro'];
            unset($_SESSION['loginErro']);
        }?>
    </p>
    <p class="text-center text-success">
        <?php 
        if(isset($_SESSION['logindeslogado'])){
            echo $_SESSION['logindeslogado'];
            unset($_SESSION['logindeslogado']);
        }
        ?>
  </p>
                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

 <!-- Required Js -->
 <script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


</body>

</html>