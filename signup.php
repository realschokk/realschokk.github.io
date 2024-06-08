<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/mainpage.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/lobby.css'>
    <script type="text/javascript" src="js/signupError.js"></script>
    <title>Регистрация</title>
</head>
<body>
    
    <header id="nav">
        <div class="nav--list">
             <a class="nav__link" id="to__mainpage" href="index.php">На Главную</a>
        </div>
        <div id="nav__links">
    
        </div>


     </header>

    <main id="mainpage__container">
        <div id="form__container">
            <form id="lobby__form" action="" method="post"> 
                <div class="form__field__wrapper">
                    <input type="text" id="login" name="login" placeholder="Введите логин">
                </div>
                <div class="form__field__wrapper">
                    <input type="text" id="name" name="name" placeholder="Введите имя">
                </div>
                <div class="form__field__wrapper">
                    <input type="password" id="password" name="password" placeholder="Введите пароль">
                </div>
                <div class="form__field__wrapper">
                    <button type="submit" name="submit">Зарегистрироваться</button>
                </div>
				<?php if (isset($_COOKIE['error'])){ ?>
                <p id="Error" style="display: block; text-align: center; color: brown; padding: 0px; margin: 0px; text-align: center;"><?=$_COOKIE['error'];}?></p>

            </form>
        </div>
    </main>
</body>
<?php
	if (isset($_POST["submit"])){
		$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
		$name = filter_var(trim($_POST['name']), FILTER_UNSAFE_RAW);
		$pass = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
		
		if(mb_strlen($login) < 5 || mb_strlen($login) > 25) {
			setcookie('error', "неверная длина логина (от 5 до 25 символов)", time()+1800, "/");
			header('Location: '.$_SERVER['REQUEST_URI']);
			exit();
		} 
		$mysql = new mysqli('MySQL-8.2', 'root', '', 'users-bd');
		$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
		$user = $result->fetch_assoc();
		if($user != null) {
			$mysql->close();
			setcookie('error', "Пользователь с таким логином существует", time()+1800, "/");
			header('Location: '.$_SERVER['REQUEST_URI']);
			exit();
		} else if(mb_strlen($name) < 3 || mb_strlen($name) > 25) {
			$mysql->close();
			setcookie('error', "неверная длина имени (от 3 до 25 символов)", time()+1800, "/");
			header('Location: '.$_SERVER['REQUEST_URI']);
			exit();
		} else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 32) {
			$mysql->close();
			setcookie('error', "неверная длина пароля (от 8 до 32 символов)", time()+1800, "/");
			header('Location: '.$_SERVER['REQUEST_URI']);
			exit();
		}
		
		for($i=0; $i<strlen($pass); $i++)  {
			$symbol=ord($pass[$i])+5;
			if($symbol>255)  {
				$symbol=$symbol-255;
			}
			$pass[$i] = chr($symbol);
		}

		$pass = hash('sha256', $pass);
		$mysql->query("INSERT INTO `users` (`name`, `pass`, `login`) VALUES('$name', '$pass', '$login')");
		$mysql->close();
		header('Location: /');
		exit();
	}
?>
<script>
window.onbeforeunload = function() {
	document.cookie = "error=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
}
</script>
</html>