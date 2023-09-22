<?php 
$host = "db4.myarena.ru";
$username = "u19978_b12";
$password = "xJ8zL3vK6b";
$dbname = "u19978_b12";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Устанавливаем режим обработки ошибок PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Подключение успешно";
} 

catch(PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}



?>
