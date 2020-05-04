<?php
    require_once('connection.php');
?>

<?php

    if(isset($_POST)){

        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $email = $_POST['email'];

        $sql = "INSERT INTO user (Username, Password, Email) VALUES(?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$username, $password, $email]);
        if($result){
            echo 'Successfully saved.';
        }else{
            echo 'There were errors while saving the data.';
        }
    }else{
        echo 'No data';
    }

?>