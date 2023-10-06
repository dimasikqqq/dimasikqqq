<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <?php 
$host = "db4.myarena.ru";
$username = "u19978_b12";
$password = "xJ8zL3vK6b";
$dbname = "u19978_b12";
    try {
    $connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Подключение успешно";
} 

    catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
    }

    $result = $connection->query('SELECT * FROM  `product` WHERE 1');

    if ($result){
    if ($result->rowCount() == 0) {
        echo "Запрос не вернул результатов.";
    } else {

    echo "<table border='1'>";
        // Вывод заголовков таблицы
    echo "<tr>";
        for ($i = 0; $i < $result->columnCount(); $i++) {
            $column = $result->getColumnMeta($i);
            echo "<th>{$column['name']}</th>";
        }
    echo "</tr>";
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>".$value."</td>";
        }
    echo "</tr>";
        }
    echo "</table>";
        }}
    else {
    echo "Запросвыполнен с ошибкой ";
        }
?> 
</body>
</html>