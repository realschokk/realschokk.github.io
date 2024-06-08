<?php
	if(isset($_POST)){
		$data = file_get_contents("php://input");
		$room = json_decode($data, true);
		echo $room["id"];
		$id = $room["id"];
		$mysql = new mysqli('MySQL-8.2', 'root', '', 'room-bd');
		$mysql->query("INSERT INTO `rooms` (`id`, `members`) VALUES('$id', '0')");
		$mysql->close();
			
		}

?>