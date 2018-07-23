<?php

/*
* this is file is for the video processing only




*/
// do some processing to ajax request




require_once('init.php');

session_start();
$task = getParam('task');
$c = new dbcon();
$c->connect();

switch ($task) {
	case 'user_log':
		global $c;
		$user = $_SESSION['id']; 
		$contentId = getParam('contentId');
		$time_spent = getParam('time_spent');

		//viewing if the user has already have a log in the database in an specific item
		$query_check = "SELECT * FROM user_log WHERE userid = $user  AND contentId = $contentId";
		$result = $c->execute($query_check);
		$count	= mysqli_num_rows($result);
		$obj = mysqli_fetch_assoc($result);
		$c->debug($time_spent);

	if ($count > 0){

		$id = $obj['id'];
		$time_spent = $time_spent + $obj['time_spent'];
		$query = "UPDATE user_log SET time_spent=$time_spent WHERE id = $id";
	}else{
		$query= "INSERT INTO user_log (userid,contentId,time_spent) VALUES ($user,$contentId,$time_spent)";

	}
		$c->execute($query);

		break;
	
	default:
		# code...
		break;
}


?>