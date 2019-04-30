
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
        <title>LOGIN</title>
        <!--        <link rel="stylesheet" href="css/style.css">-->
        <link rel="stylesheet" href="css/bootstrap.min.css" >
    </head>
    <body background="img/fundo-site.jpg">
        <section class="container">
            <div class="row py-3">
                <div class="col-sm">
                    <h3 class="display-4 text-center">Bem-vindo ao EduPoint</h3>
                </div>
            </div>
            

            <div class="row justify-content-center py-5">
                <div class="col-sm-8 border border-dark rounded bg-dark text-white">
                    <div class="row py-3">
                        <div class="col-sm text-center">
                            <h2>Área de Login</h2> 
                        </div>
                    </div>
                    <form class="p-2" method="POST" name="form">
                        <div class="form-group ">
                            <label for="usuario">Usuário / E-mail</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="usuarioHelp" placeholder="Entre com login ou e-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="***********" required>
                        </div>
                        <input type="submit" class="btn btn-light btn-md btn-block" name="entrar" value="Entrar">
                    </form>
                </div>

            </div>
        </section>
        <script src="js/script.js"></script>
    </body>
</html>
