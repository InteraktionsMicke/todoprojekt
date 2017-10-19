<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
   <p>hejhej</p>

<?php
    //require 'partials/header.php';
$pdo = new PDO(
"mysql:host=localhost:3306;dbname=todo;charset=utf8",
"root",
"root"
);

$statement = $pdo->prepare("SELECT * FROM todolist");
$statement->execute();
$todolist = $statement->fetchALL(PDO::FETCH_ASSOC);
 ?>  
    <div class="list-wrapper container products-wrapper">
         <div class ="unfinished_list col-xs-6">
             <p>Att göra<p>
             <form>    
  <?php             
foreach($todolist as $dos){
    if($dos['completed'] == 0){
    echo "Vad ska göras: " . $dos["title"];
    echo "skapat av: " . $dos["createdBy"];
    echo "<input type='submit' name='remove'value='klar' >";    
    echo "<br />";
    }
}
 ?>
             </form>
             <form action="index.php" method="POST">
                 <input type="text" name="whatToDo" value="lägg till todo">
                 <input type="text" name="creator" value="skapare">
                 <input type="submit" name="add" value="lägg till">
             </form>
 
 </div> 

     
 <div class ="finished_list col-xs-6">
 <p>Klart</p>
  <?php            
foreach($todolist as $dos){
    if($dos['completed'] == 1){
    echo "Vad ska göras: " . $dos["title"];
    echo "skapat av: " . $dos["createdBy"];
    echo "<br />";
    }
}
?>
 </div>
     </div>


<?php
    //require 'partials/footer.php';
?>
    
</body>
</html>