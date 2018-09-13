<?php
require 'init.php';
session_start();

// post array containt the following
// [listOfId,task,answer 1,answer 2,answer 3,answer 4,answer 5,answer 6,submit]


//fetch data from the data base on the id being passed
$list = json_decode($_POST['list']);
foreach($list as $value){
  $temp = $c->select('content','id',$value);
  $data[] =  $temp[0]['title'];
}


$score = 0;
$counter = null;
foreach ($_POST as $key) {
  $counter++;
  if($counter > 1 && $counter <> sizeof($_POST)){
    // compare the data and add some score if the answer is correct
    if ($key === $data[$counter - 2]){
      $score++;
    }
  }
}

//send the score to the database and proceed to level 3 if the user is atleast 60% passed the exam


// get the average of the score
$average_score = ($score/sizeof($list))*100;
if($average_score >=60){ 
  $lvl_status =  "passsed";
}else{
  $lvl_status = "failed";
}

// defining some variables
$user_id = $_SESSION['id'];
$score = $average_score;
$level = 2;
$duration = null;
$date = date("Y/m/d");
$sql = "INSERT INTO progress(userid,level,score,status,date_created,duration,tries) 
             VALUES ('$user_id','$level',$score,'passed','$date','$duration','1')";
$c->execute($sql);

?>