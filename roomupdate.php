<?php
	if(isset($_POST)){
		$data = file_get_contents("php://input");
		$room = json_decode($data, true);
		echo $room["count"];
		$id = $room["id"];
		$id = "$id";
		$count = $room["count"];
		$mysql = new mysqli('MySQL-8.2', 'root', '', 'room-bd');
		if($count > 0){
			$mysql->query("UPDATE rooms SET members = '$count' WHERE id = '$id'");
		}
		else{
			$mysql->query("DELETE FROM rooms WHERE id = '$id'");
		}
		$mysql->close();
			
		}

?>