<?php
		setcookie('user', '', time()-10800, "/");

		header('Location: /');
?>