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
    if( $_SERVER['REQUEST_METHOD'] !== 'POST' ) exit;
        if(empty($_POST['age']) || (empty($_POST['name'] )))  

            exit('Поля не заполнено');

        if(empty($_POST['age'])) {

            exit;

        }

        if(preg_match('/\d+/', $_POST['name']))
            exit ("Неверный формат числа! 

            <br/> Можно использовать только цифры");

        if((int)$_POST['age'] < 1) 

            exit('Поле "возраст" < 1');

        echo 'Здравствуйте, '.htmlspecialchars($_POST['name']).'. <br>';

        echo 'Вам '.(int)$_POST['age'].' лет.'.'<br>';
        
?>
   <form action="index.php" method="post">
    <p>Вернутся на главную </p>
    <p><input type="submit"></p> 
    </form>

</body>
</html> 