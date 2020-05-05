<?php
/*
    session_start();

    if(!isset($_SESSION['userlogin'])){
        header("Location: login.php");
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("Location: login.php");
    }
*/
?>

<?php
    require 'connection.php';
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
                <form action="">
                    <div class="d-flex justify-content-center heading">
                        <h1>To - Do List</h1>
                    </div>
                    <div class="input-group">
                        <input type="text" name="task" id="task" class="form-control input_task" placeholder="Enter your task" required>
                        <button type="submit" class="task_btn" name="submit" id="add">Add <b>&nbsp; &#43;</b></button>
                    </div>
                </form>
                    <?php
                        $todos = $db->query("SELECT * FROM tasks ORDER BY id DESC");
                    ?>
                    <div class="input-group show-todo-section">
                        <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="todo-item">
                                <input type="checkbox" class="form-check-input">
                                <p><?php echo $todo['Task'] ?></p>
                                <small>Created: 04/05/2020</small>   
                            </div>
                        <?php } ?>

                            
                                
                

                    </div>
                
            </div>
        </div>
    </div>
   
                    <!--<table class="table table-hover">
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
    </div>-->

    <!--<script type="text/javascript">
        $(function(){
            $('#add').click(function(e){

                var valid = this.form.checkValidity();

                if(valid){

                    var task = $('#task').val();
                    var username = $('#username').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'process_task.php',
                        data: {task: task, username: username},
                        success: function(data){
                            Swal.fire({
                                'title' : 'Successful!',
                                'text' : data,
                                'type' : 'success'
                            })
                        },
                        error: function(data){
                            Swal.fire({
                                'title' : 'Error!',
                                'text' : 'There were errors while saving the data.',
                                'type' : 'error'
                            })
                        }
                    });
 
                }else{
                   
                }

            });
        });
    </script>-->
    
</body>
</html>