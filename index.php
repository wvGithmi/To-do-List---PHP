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
                <form action="add.php" method="POST" autocomplete="off">
                    <div class="d-flex justify-content-center heading">
                        <h1>To - Do List</h1>
                        <h2><?php ?></h2>
                    </div>
                    <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                        <div class="input-group">
                            <input type="text" name="task" id="task" class="form-control input_task" placeholder="Enter your task" required>
                            <button type="submit" class="task_btn" name="submit" id="add">Add <b>&nbsp; &#43;</b></button>
                        </div>
                    <?php }else{ ?>
                        <div class="input-group">
                            <input type="text" name="task" id="task" class="form-control input_task" placeholder="What do you need to do?" required>
                            <button type="submit" class="task_btn" name="submit" id="add">Add <b>&nbsp; &#43;</b></button>
                        </div>
                    <?php } ?>
                </form>
                <?php
                    $todos = $db->query("SELECT * FROM tasks ORDER BY id DESC");
                ?>
                <div class="input-group show-todo-section">
                    <?php if($todos->rowCount() <= 0){ ?>
                            <div class="empty">
                                <img src="unnamed.jpg" width="100%">
                            </div>
                    <?php } ?>
                
                    <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="todo-item">
                            <span Id="<?php echo $todo['Id']; ?>" class="remove-to-do">x</span>
                            <?php if($todo['Checked']){ ?>
                                <input type="checkbox" class="check-box form-check-input" data-todo-id="<?php echo $todo['Id']; ?>" checked />
                                <p class="checked"><?php echo $todo['Task'] ?></p>
                            <?php }else{ ?>
                                <input type="checkbox" data-todo-id="<?php echo $todo['Id']; ?>" class="check-box form-check-input" />
                                <p><?php echo $todo['Task'] ?></p>
                            <?php } ?>
                            <br>
                            <small>Created: <?php echo $todo['Date_Time'] ?></small> 
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        
    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const Id = $(this).attr('Id');

                $.post("remove.php",
                    {
                        Id: Id
                    },
                    (data) => {
                        if(data){
                            $(this).parent().hide(600);
                        }
                    }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('check.php',
                    {
                        Id: Id
                    },
                    (data) => {
                        if(data != 'error'){
                            const p = $(this).next();
                            if(data === '1'){
                                p.removeClass('checked');
                            }else{
                                p.addClass('checked');
                            }
                        }
                    }
                );
            });

        });
    </script>

</body>
</html>