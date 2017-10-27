<?php
require 'pdo.php';           

if (isset($_POST['done'])) {

$change = "UPDATE todolist 
SET completed = '1' 
WHERE id = :id"; 


$statement = $pdo->prepare($change);
$statement->execute(array(
':id' => $_POST['done']));
header( 'Location: index.php' ) ;
     

}