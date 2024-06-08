<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Лобби</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/lobby.css'>
</head>
<body>

    <header id="nav">
       <div class="nav--list">
            <a class="nav__link" id="to__mainpage" href="index.php">На Главную</a>
       </div>

        <div id="nav__links">
            <?php 
			if($_COOKIE['user'] == ''):
			?>
            <?php else: ?>
            <a href="profile.html"><?=$_COOKIE['user']?></a>
			<?php endif; ?>
        </div>
    </header>

    <main id="room__lobby__container">
        
        <div id="form__container">
             <div id="form__container__header">
                 <p>Создать или присоединиться к комнате</p>
             </div>
 
 
            <form id="lobby__form">
 
                 <div class="form__field__wrapper">
                     <label>Ваше имя</label>
                     <input type="text" name="name" required placeholder="Введите отображаемое имя..." />
                 </div>
 
                 <div class="form__field__wrapper">
                     <label>Название комнаты</label>
                     <input type="text" name="room"  placeholder="Введите название комнаты..." />
                 </div>
 
                 <div class="form__field__wrapper">
                     <button type="submit">Присоединиться к комнате</button>
                 </div>
            </form>
        </div>
     </main>
    
</body>
<script type="text/javascript" src="js/lobby.js"></script>
</html>