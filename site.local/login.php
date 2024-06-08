<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/mainpage.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/lobby.css'>
    <title>Вход</title>
</head>
<script type = "text/javascript" language="javascript">
function validateForm1() {   
    var pError = document.getElementById('Error');
    pError.style.display = 'block';
}
</script> 
<body>
    <header id="nav">
        <div class="nav--list">
            <a class="nav__link" id="to__mainpage" href="index.php">На Главную</a>
       </div>
    </header>

    <main id="mainpage__container">
        <div id="form__container">
            <form id="lobby__form" action="" method="post"> 
                <div class="form__field__wrapper">
                    <input type="text" name="login" placeholder="Введите логин">
                </div>
                <div class="form__field__wrapper">
                    <input type="password" name="password" placeholder="Введите пароль">
                </div>
                <div class="form__field__wrapper">
                    <button type="submit" name="submit">Войти</button>
                </div>
				<p id="Error" style="display: none; text-align: center; color: brown; padding: 0px; margin: 0px; text-align: center;">Неверный логин или пароль</p>	
            </form> 
        </div>

    </main>
    
</body>
<?php
	if (isset($_POST["submit"])){
		
		$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
		$pass = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
		
		
		for($i=0; $i<strlen($pass); $i++)  {
			$symbol=ord($pass[$i])+5;
			if($symbol>255)  {
				$symbol=$symbol-255;
			}
			$pass[$i] = chr($symbol);
		}
		
		$pass = hash('sha256', $pass);
		
		$mysql = new mysqli('MySQL-8.2', 'root', '', 'users-bd');
		
		$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
		$user = $result->fetch_assoc();
		if($user == null) {
			echo '<script type="text/javascript">',
			'validateForm1();',
			'</script>';
			$mysql->close();
			exit();
			
		}
		
		setcookie('user', $user['name'], time()+10800, "/");
		
		$mysql->close();

		header('Location: /');
		exit();
	}
?>
</html>