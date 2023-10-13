<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pr8</title>
</head>
<body>

    <?php 

        $host = "db4.myarena.ru";
        $dbname = "u19978_b12";
        $user = "u19978_b12";
        $password = "xJ8zL3vK6b";   
                   
        $connection = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);

        $link = '<a href = "./index.php">На главную</a>';

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            if(empty($_POST['login'])) 
            exit('Не все поля формы заполнены'.'<br>'.$link);

            if(empty($_POST['password'])) 
            exit('Не все поля формы заполнены'.'<br>'.$link);
        }
        
        $userLogin= $_POST['login'];
    
        $stmt = $connection->prepare("SELECT * FROM `users` WHERE `login` = ? or `Email` = ?");

        $stmt->execute([$userLogin, $userLogin]);

        $row = $stmt->fetch();

        if (!$stmt->rowCount()) {
            exit('Пользователь с такими данными не зарегистрирован'.'<br>'.$link);
            die;
        }

        if ($row && password_verify($_POST['password'],$row ["password"])) 
        exit ( "Успешно".'<br>'.$link );
        
        else{
                echo "Не правильный логин или пароль";
        }

    ?>
</body>
</html>    