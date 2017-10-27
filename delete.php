<?php

require 'pdo.php';

if (isset($_POST['delete'])){
    
   $statement = $pdo->prepare("DELETE FROM todolist WHERE id = :id");
   $statement->execute(array(
   ':id' => $_POST['delete'] ));
   header('Location: index.php');
     
}