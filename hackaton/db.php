<?php
$servername = "localhost";
$database = "test_school";
$user = "root";
$password = "";
//создаем соединение
$db = mysqli_connect($servername, $user, $password, $database);
//проверяем подключение, если соединение не выполнено - выводим ошибку и прекращаем работу скрипта
if (!$db) {
    die("Connection failed".mysqli_connect_error());
}

?>