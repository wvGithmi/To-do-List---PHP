<?php

    $db_Name = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "to-do_db";

    try{
        $db = new PDO("mysql:host=$db_Name;dbname=$db_name", $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Connection failed : " . $e->getMessage();
    }
    
?>