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
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src = "js/bootstrap.js"></script>

    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="#">
            <img src="CSS/Pictures/Oggettoacad.webp" alt="" width="100" height="75">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-4">
            <li class="nav-item active">
              <a class="nav-link" href="#">О Компании <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Вход / Регистрация</a>
            </li>
           
          </ul>
        </div>
      </nav>

    <header class = "header">
        <div class = "overlay"> </div>
        <div class = "container">
        </div>
        <div class = "discription">
            <h3><font color = "#000000">
                ЕСЛИ ХОЧЕШЬ УЧИТЬ НОВОЕ И СТАТЬ ЧАСТЬЮ НАШЕЙ КОМАНДЫ — 
                <h3> НАШИ ДВЕРИ ДЛЯ ТЕБЯ ОТКРЫТЫ!</h3>
                <br>
                <p>
                    Попробуй свои силы и пройди легкий тест!
                    <br>
                    <br>
                    <button type = "submit" name = "relocate" class = "btn btn-primary">Узнать больше</button>
                </p>
            </font></h3>
        </div>
    </header>

    <?php
        session_start();
        include("db.php");
    ?>

    <?php
    if (ISSET($_POST['relocate']))
    {
        echo "<script> document.location.href = 'login.php' </script>";
    }
    ?>

    <div class = "contact-form">
        <div class = "container">
            <form class = "fform">
                <div class = "row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h1>Get in Touch</h1>
                    </div>
                    <div class = "col-lg-8 col-md-8 col-sm-12 right">
                        <div class = "form-group">
                            <input type = "text" class = "form-control form-control-lg" placeholder="Your Name" name ="">
                        </div>
                        <div class = "form-group">
                            <input type = "email" class = "form-control form-control-lg" placeholder="Your Email@email.com" name ="email">
                        </div>
                        <div class = "form-group">
                            <textarea class = "form-control form-control-lg">

                            </textarea>
                        </div>
                        <input type = "submit" class = "btn btn-secondary btn-block" value = "Send" name ="">
                    </div> 
                </div>
            </form>
        </div>
    </div>
    



    

       

</body>
</html>