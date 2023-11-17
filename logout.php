<?php
session_start();
session_destroy();
//header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="3;url=index.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Logout</title>

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
                                        </div>
                                        <div class="sidebar-brand-text mx-3">
                                            <h4>Csc Manutenção</h4>
                                        </div>
                                        <br />
                                        <h2 class="h5 mb-4">Logout feito com sucesso!</h2>
                                        <br />
                                        <br />
                                        <h2 class="h5 mb-4">Você será redirecionado para a tela inicial.</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>