<?php
    include_once 'database/config.php';
    
    function DBConnect(){
        $conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die(mysqli_error());
//      0 mysqli_set_charset($sql,CHARSET) or die (mysqli_error($sql));
        return ($conn);
    }
    function DBClose($conn){
        mysqli_close($conn) or die(mysqli_error($conn));
    }
?>