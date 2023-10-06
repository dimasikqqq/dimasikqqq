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

            exit('Поля заполнены неверно');

        if(empty($_POST['age'])) {

            exit;

        }

        if(preg_match('/\d+/', $_POST['name']))
            exit ("Неверный формат заполнения имени! 

            <br/> Можно использовать только буквы");

        if((int)$_POST['age'] < 1) 

        exit ("Неверный формат заполнения даты рождения! 

        <br/> Можно использовать только цифры");

        echo 'Здравствуйте, '.htmlspecialchars($_POST['name']).'. <br>';

        echo 'Вам '.(int)$_POST['age'].' лет.'.'<br>';

?>
</body>
</html> 