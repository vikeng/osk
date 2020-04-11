<?php

$host = 'localhost';
$dbname = 'osk';
$user = 'user';
$password = '124356';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", $user, $password);
} catch (PDOException $e) {
    echo "Невозможно установить соединение с БД";
}





