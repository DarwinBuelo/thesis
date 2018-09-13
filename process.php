<?php

/*
* this is file  handles  ajax request...  and processes them




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
		
		/*	========== NOTE =========
		*	THIS FIX GETS THE DATA ABOUT THE COUNTENT BASED ON THE CONTENT ID
		*	ALTHOUGHT THIS IS UNRELIABLE WAY . THIS IS THE FASTEST AND EASIEST WAY TO RETRIEVE THE
		* 	LEVEL OF THE CONTENT BEING LOG
		*
		*
		*/

		//GET THE ALL INFO ABOUT THE CONTENT

		$cont_details = $c->select('content','id',$contentId);
		$level  =intval($cont_details[0]['level']);
		

		//viewing if the user has already have a log on the database in an specific item
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

		// add the level of the content
		$query= "INSERT INTO user_log (userid,contentId,time_spent,lvl) VALUES ($user,$contentId,$time_spent,$level)";

	}
		$c->execute($query);

		break;

	// will handle the saving of data from the game to the database via ajax request
	// for level 1 only
	case 'user_progress';
		$user_id = $_SESSION['id'];
		$level = getParam('lvl');
		$score = getParam('rating');
		$duration = getParam('time');


		// sql for making the exam result available to the database


		 $passing_grade = 60; //change this to the passing score 

		if ($score > $passing_grade){
			$sql = "UPDATE user_study_guide SET stat='passed' WHERE userid ='$user_id' and level = $level";
		 	$c->execute($sql);
		 	$date = date("Y/m/d");
		 	$sql = "INSERT INTO progress(userid,level,score,status,date_created,duration,tries) 
		 				VALUES ('$user_id','$level',$score,'passed','$date','$duration','1')";
			$c->execute($sql);
		}
		// sql for  changing the status of the user_guide from lvl to lvl
		 



		break;
	
	default:
		# code...
		break;
}




?>