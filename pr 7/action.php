<?php 
        if( $_SERVER['REQUEST_METHOD'] !== 'POST' ) 
                exit;

                if (strlen($_POST['login']) < 9) {
           
                        exit('Логин должен быть минимум 8 символов ');
                }

        if(empty($_POST['login']))
                exit('Поле "логин" не заполнено');

        if(empty($_POST['password'])) 
                exit('Поле "пароль" не заполнено');

                if (strlen($_POST['password']) < 9) {
            
                        exit('Пароль должен быть минимум 8 символов');
                }        

        if(empty($_POST['passwordtry'])) 
                exit('Поле "Подверждение пароля" не заполнено');

        if($_POST['password'] !== $_POST['passwordtry']) 
                exit('Пароли не совпадают' );

        if(empty($_POST['Email'])) 
                exit('Поле "почта" не заполнено');

        $host = "db4.myarena.ru";
        $dbname = "u19978_b12";
        $user = "u19978_b12";
        $password = "xJ8zL3vK6b";    

        try {
                $connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $password);
            
                } catch (PDOException $e) {
                    die("Ошибка подключения: " . $e->getMessage());
                }
        

                $select = $connection->prepare( "SELECT COUNT(`id`) as cnt FROM `users` WHERE `login` = ?;" ); 
                $res = $select->execute([ $_POST['login'] ] );
                $row = $select->fetch();
            
                if(!$res ){
                    exit( 'Ошибка регистрации...');
                }
            
                if( $res && isset($row['cnt']) && $row[0] > 0 ){
                exit( 'Ошибка регистрации... (Пользователь уже существует)' );
                }

        
                $pwd = $_POST['password'];
                $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

                // создание нового пользователя

                $data = [ $_POST['login'], $pwd_hash, $_POST['Email'] ];
                $res = $connection->prepare( "INSERT INTO `users` (`login`, `password`, `Email`) VALUES (?,?,?);" ); 
                $res = $res->execute( $data);
            
                if( $res ){
                    exit( 'Регистрация прошла успешно' );
                    echo 'Здравствуйте, '.htmlspecialchars($_POST['login']).'. <br>';
                    echo 'Ваш аккаунт создан'.'. <br>';
                }
            
                ?>
            
             <form action="index.php" method="post">
             <p style="text-align: left"><button>На главную</button>
