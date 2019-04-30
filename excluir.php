<?php

      $ID = $_GET['ID'];
      include_once 'database/query.php';
      include_once 'database/conn.php';

      $conn = DBConnect();

      $delete = DBDelete('ranking',"WHERE idranking = '$ID'");
      if($delete){
            session_start();
            $_SESSION["exinsert"]= "EX";
            header("Location:apresentacao.php");
      }else{
      echo "Error: " . var_dump($delete) . "<br>" . mysqli_error($conn); 
      }
?>