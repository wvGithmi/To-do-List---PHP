<?php

    if(isset($_POST['task'])){
        require 'connection.php';

        $task = $_POST['task'];

        if(empty($task)){
            header("Location: index.php?mess=error");
        }else{
            $stmt = $db->prepare("INSERT INTO tasks(Task) VALUE(?)");
            $res = $stmt->execute([$task]);

            if($res){
                header("Location: index.php?mess=success");
            }else{
                header("Location: index.php");
            }
            $db = null;
            exit();
        }
    }else{
        header("Location: index.php?mess=error");
    }
?>