<?php

$statement = $pdo->prepare("SELECT * FROM todolist ORDER BY id DESC");
$statement->execute();
$todolist = $statement->fetchALL(PDO::FETCH_ASSOC);