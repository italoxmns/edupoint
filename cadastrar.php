<?php
      // echo "<meta charset='UTF-8'>";
      //HTTP
      //POST - formulários
      //GET  - hyperlinks
      //REQUEST - para os dois

      @$nome = $_POST['nome'];
      @$posto = $_POST['posto'];
      @$pontos= $_POST['pontos'];
      @$medalha= $_POST['medalha'];

      // echo $nome."<br>";
      // echo $posto."<br>";
      // echo $pontos."<br>";
      // echo $medalha."<br>";


      include_once 'database/query.php';
      include_once 'database/conn.php';

      $conn = DBConnect();

      $select = DBQuery('ranking', " WHERE nome = '$nome'");
      $linha = mysqli_num_rows($select);

      echo $linha;
      if($linha == 0){
            $insert = DBInsert('ranking','nome,posto,pontos,medalha',"'$nome',$posto,$pontos,'$medalha'");
            if($insert){
                  session_start();
                  $_SESSION["bdinsert"]= "OK";
                  header("Location:apresentacao.php");
            } 
      }else{
            echo "Error: " . var_dump($select) . "<br>" . mysqli_error($conn); 
      }
?>