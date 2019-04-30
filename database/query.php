<?php 
    include_once 'database/conn.php';

    function DBQuery($table, $params = null, $columns = "*"){
        $params = ($params) ? "{$params}" : null;
        $columns = ($columns) ? "{$columns}" : "*";
        
        $sql = "SELECT {$columns} FROM {$table}{$params}";
        // return var_dump($sql);
        $result = DBExecute($sql);
        
        return $result;
            
    }

    function DBInsert ($table, $params = null, $columns = "*"){
        $params = ($params) ? "{$params}" : null;
        $columns = ($columns) ? "{$columns}" : "*";
        
        $insert = "INSERT INTO {$table} ({$params}) VALUES ({$columns});";
        if(!DBExecute($insert)){
            return false;
        }else{
            return true;
        }
    }
    function DBDelete ($table, $params = null){
        $params = ($params) ? "{$params}" : null;
        
        $delete = "DELETE FROM {$table} {$params};";
        if(!DBExecute($delete)){
            return false;
        }else{
            return true;
        }
    }
    function DBUpdate ($table,$columns = null,$params = null){
        $columns = ($columns) ? "{$columns}" : null;
        $params = ($params) ? "{$params}" : null;
        
        $update = "UPDATE {$table} SET $columns {$params};";
        // echo var_dump($update);
        if(!DBExecute($update)){
            return false;
        }else{
            return true;
        }
    }
 
    
    function DBExecute($sql){
        $con = DBConnect();
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        DBClose($con);
        return $result;
    }
?>