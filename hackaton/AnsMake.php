<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style3.css">
    <link rel = "stylesheet" href = "CSS/bootstrap.css">   
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include('manNav.php');
        include("db.php");

        ?>
        <div>
        <form method = "post" action = "" id = "#form" style = "left: 37%; top: 45%; width: 50em;">
            <h4>Новый ответ</h4>
            Название ответа: 
            <input type = "text" name = "addName" placeholder = "" class = "form-control">
            Комментарий к ответа:
            <input type = "text" name = "addContext" placeholder = "" class = "form-control">
            Тип ответа:
            <select name = "typeAnswer" value = "Вид2" class = "form-control">
                <option value = "Правильный">Правильный</option>
                <option value = "Неправавильный">Неправавильный</option>
            </select>
            <br>
            <button type = "submit" name = "submit" class = "btn btn-primary">Добавить</button>
            <button type = "submit" name = "relocate" class = "btn btn-primary">Ответы</button>
        </form>
        </div>

    <?php

        //нажата кнопка "submit", переданы данные по POST_методу
        if (ISSET($_POST['submit']))
        {
            //$idTest = $_SESSION['Id_Test'];
            $idAns = $_POST['idans'];
            $nameAns=$_POST["addName"];
            $conAns=$_POST["addContext"];
            $typeAns=$_POST["typeAnswer"];

            $query = "INSERT INTO 'test_answers' ('Id_Question', 'Name_Answer', 'Comment_Answer', 'Status_Answer') 
            VALUES ($idQue, '$nameAns', '$conAns', '$typeAns')";
            $result = mysqli_query($db, $query);
            if ($result == TRUE)
            {
                echo "Данные успешно сохранены!";
                echo "<script> document.location.href = 'AnsMake.php' </script>"; //обновляем страницу
            }   
            else 
            {
                echo "Ошибка";
            } 
        }
    ?>



    
</body>
</html>