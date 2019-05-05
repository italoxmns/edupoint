
<?php

    include_once 'database/query.php';
    include_once 'database/conn.php';
    session_start();

    if(isset($_SESSION['usuarioLog'])){
        header('location: apresentacao.php');
        die();
    }

    if(isset($_POST['entrar'])){
        $conn = DBConnect();
        $login = mysqli_escape_string($conn,$_POST['usuario']);
        $email = mysqli_escape_string($conn,$_POST['email']);
        $pass = mysqli_escape_string($conn,$_POST['senha']);

        $teste = DBQuery('usuario'," where login = '$login' OR email = '$email' AND senha = '$pass'",'email');

        if($teste > 0){
            $_SESSION['usuarioLog'] = true;
            header("location: apresentacao.php");
        }else{
            echo "<script>alert('Usuário ou senha incorretos!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Hands On HTML</title>
        <!--        <link rel="stylesheet" href="css/style.css">-->
        <link rel="stylesheet" href="css/bootstrap.min.css" >
    </head>
    <body background="img/fundo-site.jpg">
        <section class="container">
            <div class="row py-md-5 py-lg-3">
                <div class="col-sm">
                    <h3 class="display-4 text-center">
                        <strong>Bem-vindo ao EduPoint</strong>
                    </h3>
                </div>
            </div>
        
            <div class="row justify-content-center py-lg-5 py-md-5">
                <div class="col-sm-12 col-lg-8 border border-dark rounded bg-dark text-white py-sm-4 py-lg-3 ">
                    <div class="row py-lg-3 py-sm-2">
                        <div class="col-sm text-center">
                            <h2>Área de Login</h2> 
                        </div>
                    </div>
                    <form class="p-sm-4 p-lg-2" method="POST" name="form">
                        <div class="form-group ">
                            <label for="usuario">Usuário / E-mail</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="usuarioHelp" placeholder="Entre com login ou e-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="***********" required>
                        </div>
                        <button type="submit" class="btn btn-outline-light btn-md btn-block mt-sm-5 mt-lg-0" name="entrar" >
                            <strong>Entrar</strong>
                        </button>
                    </form>
                </div>

            </div>
        </section>
        <script src="js/script.js"></script>
    </body>
</html>
