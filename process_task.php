<?php
    require_once('connection.php');
?>

<?php

    if(isset($_POST)){

        $task = $_POST['task'];
        $username = $_POST['username'];

        $sql = "INSERT INTO tasks (Task, Username) VALUES(?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$task, $username]);
        if($result){
            echo 'Successfully saved.';
        }else{
            echo 'There were errors while saving the data.';
        }
    }else{
        echo 'No data';
    }

?>