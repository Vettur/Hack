<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style3.css">
    <link rel = "stylesheet" href = "CSS/bootstrap.css">   
    <title>Document</title>
    <title>Document</title>
</head>
<body>
<body>
<div class = "wrapper"> 
    <div class = "overlay">
        <nav>
            <ul class = "top-menu">
                <div class = "left-links">
                    <li><a href = "manager.php" >Личный кабинет менеджера</a></li>
                </div>
                <div class = "right-links">
                    <li><a href = "manager.php" >Заявки</a></li>
                    <li><a href = "tests.php" >Тесты</a></li>
                    <li><a href = "Index.php" >Выход</a></li>
                </div>
            </ul>
        </nav>
        <?php
            session_start();
            include("db.php");
        ?>
        <div class ="row about">
            <div class = "col-lg-6 col-md-6 col-sm-12">
                <?php
                    //пагинация
                    $page = 1; // текущая страница
                    $kol = 4; //кол-во записей для ввода
                    $first = 0; //номер записи, с которой начинается вывод
                    if (isset($_GET['page']))
                    {
                        $page = $_GET['page'];
                    }
                    else $page = 1;
                    $first = ($page*$kol)-$kol;
                    $sql = "SELECT COUNT(*) FROM test_plus";
                    $result = mysqli_query($db, $sql); // выполнение запроса
                    $row = mysqli_fetch_row($result);
                    $total = $row[0]; //всего записей
                    $str_pag = ceil($total/$kol);
                    //формируем пагинацию
                    for ($i = 1; $i <= $str_pag; $i++)
                    {
                        echo "<a href = tests.php?page=".$i."> Страница ".$i." </a>"."|";
                    }
                    echo " <h4>Выбор теста</h4>";
                    //создание html-таблицы
                    $sql = "SELECT * FROM test LIMIT $first, $kol"; //$first – номер записи, с которой начинается вывод в таблицу, $kol - количество записей для вывода.
                    $result = mysqli_query($db, $sql); // выполнение запроса
                    echo "<table class = 'table table-bordered table-sm' bgcolor ='white'>
                    <tr class = 'table-primary'><th>ID теста</th><th>ID вопроса</th><th>Название</th><th>Описание</th><th></th>";
                    //вывод записей из массива $data в таблицу
                    while ($myrow=mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>".$myrow['Id_Test']."</td>";
                        echo "<td>".$myrow['Id_Question']."</td>";
                        echo "<td>".$myrow['Name_Que']."</td>";
                        echo "<td>".$myrow['Comment_Que']."</td>";
                        //кнопка для отправки заявки на программу 
                        echo "<td> <form method='post'>
                        <button type = 'submit' class='btn btn-primary' formaction = 'AnsMake.php' name = 'button1'>Добавить ответ</button>
                        </td>";
                        //скрытое поле для хранения значения ID_Program
                        echo "<input type = 'hidden' name = 'idans' value = '".$myrow['Id_Question']."'></form>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>

        <div class = "col-lg-6 col-md-6 col-sm-12 desc">

        </div>
        </div>
    </div>
</html>