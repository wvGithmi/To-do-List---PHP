<?php

    if(isset($_POST['Id'])){
        require 'connection.php';

        $Id = $_POST['Id'];

        if(empty($Id)){
            echo 'error';
        }else{
            $todos = $db->prepare("SELECT Id, Checked FROM tasks WHERE Id=?");
            $todos->execute([$Id]);

            $todo = $todos->fetch();
            $uId = $todo['Id'];
            $Checked = $todo['Checked'];

            $uChecked = $Checked ? 0 : 1;

            $res = $db->query("UPDATE tasks SET Checked=$uChecked WHERE Id=$uId");

            if($res){
                echo $Checked;
            }else{
                echo "error";
            }

            $db = null;
            exit();
        }
    }else{
        header("Location: index.php?mess=error");
    }

?>