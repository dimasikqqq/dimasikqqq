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
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Устанавливаем режим обработки ошибок PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Подключение успешно";
} 

    catch(PDOException $e) {
        echo "Ошибка подключения: " . $e->getMessage();
}

        echo "<table class= 'table' border = '2'>";
    $result = $conn->query('SELECT * FROM `product`');
        echo "<tr>"; 
    for($i - 0; $i < $result->columnCount();$i++){ 
        $column = $result->getColumnMeta($i); 
        echo "<th>{$column['name']}</th>"; 
} 
        echo "</tr>";
    while($row = $result->fetch( PDO::FETCH_ASSOC )){
        echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<td>".$value."</td>";
}
        echo "</tr>";
}
        echo "</table>";
?> 
</body>
</html>