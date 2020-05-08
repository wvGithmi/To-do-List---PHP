<?php

    if(isset($_POST['Id'])){
        require 'connection.php';

        $Id = $_POST['Id'];

        if(empty($Id)){
            echo 0;
        }else{
            $stmt = $db->prepare("DELETE FROM tasks WHERE Id=?");
            $res = $stmt->execute([$Id]);

            if($res){
                echo 1;
            }else{
                echo 0;
            }
            $db = null;
            exit();
        }
    }else{
        header("Location: index.php?mess=error");
    }
    
?>