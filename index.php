<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
    
foreach($todolist as $dos){
    echo "Vad ska göras: " . $dos["title"];
    echo "skapat av: " . $dos["createdBy"];
    
}


    //require 'partials/footer.php';
?>
</body>
</html>