<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/mainpage.css'>
    <title>Главная</title>
</head>
<body>
    
    <header id="nav">
        <div class="nav--list">

       </div>

        <div id="nav__links">
			<?php 
			if(!isset($_COOKIE['user']) or $_COOKIE['user'] == ''):
			?>
            <?php else: ?>
            <a href="profile.html" style="padding: 8px 0px 8px 0px;"><?=$_COOKIE['user']?></a>
			<?php endif; ?>
        </div>
    </header>

    <main id="mainpage__container">
        <form id="lobby__form">
            <div id="choose">
                <a href="signup.php" class="mainpage__btn" id="signup"><center>Регистрация</center></a>
                <a href="login.php" class="mainpage__btn" id="signup" style="margin-left: 25px;"><center>Вход</center></a>
            </div>   
            <?php 
            if(isset($_COOKIE['user']) and $_COOKIE['user'] != ''):
            ?>
                <div id="choose">
                    <a href="lobby.php" class="mainpage__btn"><center>Создать комнату</center></a>
                </div>
			<?php endif; ?>
        </form>
    </main>
</body>
</html>
