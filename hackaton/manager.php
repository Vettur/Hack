<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="CSS/Style2.css">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include('manNav.php');
        include("db.php");
    ?>

    <div class = "row about">
        <label class="image_upload">
            <input type="file" accept="image/*" onchange="loadFile(event)" placeholder="quests[0][quest_img]"/>
            <img id="output"/>
            <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
                }
            };
            </script>
        </label>
    </div>

    <form method = "post" action = "" id = "#form" style = "left: 57%; top: 38%; width: 50em;">
        <h4>Новая запись</h4>
        Название теста:
        <input type = "text" name = "addName" placeholder = "" class = "form-control">
        Тип теста:
        <select name = "addtypeTest" value = "Вид1" class = "form-control">
            <option value = "Backend Test">Backend</option>
            <option value = "Frontend Test">Frontend</option>
            <option value = "DevOps Test">DevOps</option>
            <option value = "OOP">Object-oriented programming</option>
        </select>
        Описание теста:
        <input type = "text" name = "addComment" placeholder = "" class = "form-control">
        <button type = "submit" name = "submit" class = "btn btn-primary">Добавить</button>
    </form>




    <?php

    //нажата кнопка "submit", переданы данные по POST_методу
    if (ISSET($_POST['submit']))
    {
        $nameTest=$_POST["addName"];
        $typeTest=$_POST["addtypeTest"];
        $typeComment=$_POST["addComment"];

        $sql = "INSERT INTO test(Name_Test, Type_Test, Comment_Test)
        VALUES ('$nameTest', '$typeTest', '$typeComment')";
        $result = mysqli_query($db, $sql);
        if ($result == TRUE)
        {
            echo "Данные успешно сохранены!";
            echo "<script> document.location.href = 'manager.php' </script>"; //обновляем страницу
        }        
        else 
        {
            echo "Ошибка";
        } 
    }
    ?>
</body>
</html>