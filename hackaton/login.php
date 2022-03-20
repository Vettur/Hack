<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<body>
    <form action = "" method="POST" onsubmit = "return valid(event)">
        <input checked = "" id = "signin" name = "action" type = "radio" value = "signin">
        <label for = "signin">Вход</label>
        <input id = "signup" name = "action" type = "radio" value = "signup">
        <label for = "signup">Регистрация</label>
        <input id = "reset" name = "action" type = "radio" value = "reset">
        <label for = "reset">Reset</label>

        <div id = "wrapper">
            <div id = "arrow"></div>
                <input id = "email" name = "email" placeholder = "Email" type = "text">
                <input id = "pass" name = "pass" placeholder = "Пароль" type = "password">
                <input id = "repass" name = "repass" placeholder = "Повторите пароль" type = "password">
        </div>
        <button type = "submit" name = "submit">
            <span>
                Reset
                <br>
                Вход
                <br>
                Регистрация
            </span>
        </button>
    </form>
    <div id = "hint">Click on the tabs</div>
    <script type = "text/javascript"></script>
</body>

<?php
    //нажата кнопка submit, данные переданы по POST методу
    if (ISSET($_POST['submit']))
    {
        //получаем данные с формы
        $email = $_POST['email'];
        $passw = $_POST['pass'];
        //при незаполненных полях выводим сообщение об ошибке и прекращаем работу скрипта
        if (empty($email) or empty($passw))
        {
            exit("Вы ввели не всю информацию");
        }
        //включаем скрипт с подключением БД
        include("db.php");
        //проверяем вид команды
        if($_POST['action'] == "signup") //передана радиокнопка signup /регистрация
        {
            //проверяем существование такого пользователя по логину и email
            $query = "SELECT * FROM user WHERE Name_User = '$email' OR Email_User = '$email'"; //скрипт sql запроса
            $result = mysqli_query($db, $query); //выполнение запроса
            $myrow = mysqli_fetch_array($result); //результат записываем в ассоциативный массив
            if (!empty($myrow['Id_User']))
            {
                exit("Извините, пользователь с таким email уже существует");
            }
            //sql-запрос на добавление новой записи
            $query = "INSERT INTO user(Email_User,Name_User,Passw_User) VALUES ('$email', '$email', '$passw')";
            $result = mysqli_query($db, $query);

            if ($result == TRUE)
            {
                echo "Вы успешно зарегестрированы. Теперь вы можете авторизироваться и перейти в личный кабинет.";
                echo "<script> document.location.href = 'personalcabinet.php' </script>"; //переход в личный кабинет
            }
            else 
            {
                echo ("Ошибка регистрации");
            }
        }

        if($_POST['action'] == "signin") //преедана радиокнопка signin /вход
        {
            //echo "hello";
            //проверяем существование пользователя с такими login и email
            $query = "SELECT * FROM user WHERE Name_User = '$email' OR Email_User = '$email'"; //скрипт sql запроса
            $result = mysqli_query($db, $query); //выполнение запроса
            $myrow = mysqli_fetch_array($result); //ассоциативный массив записей
            //записей нет
            if (empty($myrow['Name_User']))
            {
                exit("Извините, пользователь с таким логином/email еще не зарегестрирован");
            }
            //запись возвращается, пользователь найден
            else
            {
                //проверка пароля
                if ($myrow['Passw_User'] == $passw)
                {
                    echo "hello";
                    //пароль верный, записываем данные в сессию
                    $_SESSION['Name_User'] = $myrow['Name_User'];
                    $_SESSION['Id_User'] = $myrow['Id_User'];
                    //переходим в личный кабинет
                    if ($_SESSION['Name_User']=="manager")
                    {
                        echo "<script> document.location.href = 'manager.php' </script>"; //переход в личный кабинет менеджера
                    }
                    else 
                    {
                        echo "<script> document.location.href = 'personalcabinet.php' </script>"; //переход в личный кабинет студента
                    }
                }
                else 
                {
                    exit("Пароль неверный");
                }
            }
        }
    }
?>


<script type = "text/javascript">
    var button = document.getElementsByName("action");
    function valid()
    {
        if (button[0].checked) 
        {
            if (document.getElementById('email').value == "")
            {
                alert("Email не заполнен");
                return false;
            }
            else if (document.getElementById('pass').value == "")
            {
                alert("Пароль не заполнен");
                return false;
            }
        }
        else if (button[1].checked)
        {
            if (document.getElementById('pass').value != document.getElementById('repass').value)
            {
                alert("Пароли не совпадают");
                return false;
            }
            if (document.getElementById('email').value == "")
            {
                alert("Email не заполнен");
                return false;
            }
            else if (document.getElementById('pass').value == "")
            {
                alert("Пароль не заполнен");
                return false;
            }
            else if (document.getElementById('repass').value == "")
            {
                alert("Второй пароль не заполнен");
                return false;
            }
        }
    }

</script>


