<?php
require_once ("config.php");

try{
    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $db , $user, $pswd);
} catch (PDOException $e)
{
    echo $e->getMessage();
}