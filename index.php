<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">

</head>

<body>
    <h1>MICKES TODOS</h1>

    <?php
require 'pdo.php';    
require 'fetch.php';

 ?>
        <div class="listWrapper container-fluid">
            <div class="unfinishedList col-xs-10 col-xs-offset-1">
                <h2>OFÄRDIGT</h2>

                <div class="listHead col-xs-3">
                    <p>Syssla</p>
                </div>
                <div class="listHead col-xs-3">
                    <p>Skapare</p>
                </div>

                <div class="clear"></div>

                <?php        
                foreach($todolist as $dos){
                ?>

                <?php  
                    if($dos['completed'] == 0){
                    ?>
                <div class='listRow col-xs-12'>
                    <div class="todo col-xs-3">
                        <p>
                            <?php echo $dos["title"]; ?> </p>

                    </div>

                    <div class="createdBy col-xs-3">

                        <p>
                            <?php echo $dos["createdBy"]; ?> </p>
                    </div>

                    <form action="complete.php" method="POST">
                        <input type="submit" name="done" value="klar">
                        <input type="hidden" name="done" value="<?php echo $dos['id'] ?>">
                    </form>

                    <form action="delete.php" method="POST">
                        <input type="submit" name="delete" value="delete">
                        <input type="hidden" name="delete" value="<?php echo $dos['id'] ?>">
                    </form>
                    <div class="clear"></div>
                    <div class="underline"></div>

                </div>
                <?php    
                }
            }
                    ?>
            </div>
            <div class="clear"></div>

            <h3>LÄGG TILL SYSSLA</h3>
            <div class="addPost col-xs-10 col-xs-offset-1">

                <form action="add.php" method="POST">

                    <div class="form-inline col-xs-4">
                        <label for="formGroupExampleInput">Syssla</label>
                        <input type="text" class="form-control " name="title" placeholder="...">
                    </div>
                    <div class="form-inline col-xs-4">
                        <label for="formGroupExampleInput2">Skapare</label>
                        <input type="text" class="form-control" name="createdBy" placeholder="...">
                    </div>


                    <div class="form-inline col-xs-3 col-xs-offset-1">
                        <input type="submit" name="add" value="lägg till">
                    </div>
                </form>
            </div>




            <div class="finishedList col-xs-10 col-xs-offset-1">
                <h2>FÄRDIGT</h2>

                <div class="listHead col-xs-3">
                    <p>Syssla</p>
                </div>

                <div class="listHead col-xs-3">
                    <p>Skapare</p>
                </div>

                <?php            
        foreach($todolist as $dos){
            if($dos['completed'] == 1){
                ?>
                <div class='listRow col-xs-12'>
                    <div class="todo col-xs-3">
                        <p> <?php echo $dos["title"];?> </p>
                    </div>

                    <div class="createdBy col-xs-3">
                        <p><?php echo $dos["createdBy"]; ?> </p>
                    </div>

                    <form class="col-xs-3" action="delete.php" method="POST">
                        <input type="submit" name="delete" value="delete">
                        <input type="hidden" name="delete" value="<?php echo $dos['id'] ?>">
                    </form>
                </div>

                <div class="clear"></div>
                <div class="underline"></div>
                <?php
            }
        }
        ?>
            </div>
        </div>

</body>

</html>
