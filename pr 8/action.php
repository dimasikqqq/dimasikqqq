    <?php 

        $host = "db4.myarena.ru";
        $dbname = "u19978_b12";
        $user = "u19978_b12";
        $password = "xJ8zL3vK6b";              
        $connection = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);

        $link = '<a href = "./index.php"><p><input type="submit" value="back to the main"></p> </a>';
        
        $userLogin= $_POST['login'];
    
        $stmt = $connection->prepare("SELECT * FROM `users` WHERE `login` = ? or `Email` = ?");

        $stmt->execute([$userLogin, $userLogin]);
        
        //проверка полей 
        if( $_SERVER['REQUEST_METHOD'] !== 'POST' ) {
        exit;
            if(empty($_POST['login'])) 
            exit('login field is empty'.'<br>'.$link);

            if(empty($_POST['password'])) 
            exit('password field is empty'.'<br>'.$link);
        }

        $row = $stmt->fetch();
        
        //проверка пользователя в БД
        if (!$stmt->rowCount()) {
            exit('User is not found :('.'<br>'.$link);
            die;
        }

        //
        if ($row && password_verify($_POST['password'],$row ["password"])) 
        exit ( "successfully!".'<br>'.$link );
        
        else{
                echo "incorrect login or password";
        }

    ?>