<?php

    session_start();

    if(!isset($_SESSION['userlogin'])){
        header("Location: login.php");
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="screen1">
                <from>
                    <div class="d-flex justify-content-center h-100 heading">
                        <h1>To - Do List</h1>
                    </div>
                    <div class="input-group mb-4">
                        <input type="text" name="task" class="form-control task_input" required>
                        <button type="submit" class="task_btn" name="submit">Add Task</button>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Task</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>First Task</td>
                                <td class="delete"><a href="#">x</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3 button_container">
                        <button type="button" name="button" id="logout" class="btn login_btn"><a href="index.php?logout=true">Logout</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>