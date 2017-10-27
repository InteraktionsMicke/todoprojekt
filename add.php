<?php
        
require 'pdo.php';

if (isset($_POST['add'])) {
$insert = "INSERT INTO todolist (id, title, completed, createdBy) 
VALUES (null, :title, :completed, :createdBy)";

    
/* $statement = $pdo->prepare("SELECT * FROM todolist WHERE title = :title ");
$statement->execute(array(
   ':title' => $_POST['title'] ));

$row_cnt = $statement->num_rows;

if ($row_cnt > 0) {

   echo "There is a matching record";
}
else {
    echo "det finns inte";
} 
*/
    
    
    
$statement = $pdo->prepare($insert);
$statement->execute(array(
':title' => $_POST['title'],
':createdBy' => $_POST['createdBy'],
':completed' => 0));
header( 'Location: index.php') ;


}