<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "diff";

$dsn = "mysql:localhost=$host; dbname=$dbname";



try{
    $pdo = new PDO($dsn, $user, $pass);
}
catch(PDOException $e){
    exit("Error". e->getmessage());
}




?>