
<?php
      include_once 'database/query.php';
      include_once 'database/conn.php';
      $id = $_POST['id'];
      $nome = $_POST['nome'];
      $posto = $_POST['posto'];
      $pontos= $_POST['pontos'];
      $medalha= $_POST['medalha'];


      $conn = DBConnect();

      $update = DBUpdate('ranking',"nome = '$nome', posto = $posto, pontos = $pontos, medalha = '$medalha'"," WHERE idranking = $id");
      if($update){
            session_start();
            $_SESSION["upinsert"]= "UP";
            header("Location:apresentacao.php");
      }else{
      echo "Error: " . mysqli_error($conn); 
      }
?>   
