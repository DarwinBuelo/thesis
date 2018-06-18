<?php

//databaseConnection

/**
*  @author Darwin Buelo
*/

class dbcon
{
	//define the variable needed
	protected $host = '127.0.0.1';
	protected $username = 'darwin';
	protected $password = '12345';
	protected $dbname = 'thesis';

	protected $conn;


	public $userId;
	public $user ;
	public $fname;
	public $lname;
	public $privilege;
	public $mname;



	//Connect to the database


	function connect(){
		try {
			$this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->dbname);	
		} catch (Exception $e) {
			echo "<pre>".$e."</pre>";
		}
	}

	function search($data=null,$table='content'){
		$this->connect();
		$data = $this->clean($data);
		

		if ($data == "") {
			$query = "SELECT * FROM $table";
		}else{
			$query = "SELECT * FROM $table WHERE note LIKE '%$data%' OR title LIKE '%$data%' OR english LIKE '%$data%' OR tagalog LIKE '%$data%' OR bicol LIKE '%$data%'";	
		}
		
		$result = mysqli_query($this->conn,$query);
		if($result->num_rows == 0){
			return false;
		}else{
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		$this->close();

	}

	//select data from the table
	function select($table,$data=null,$value=null){
		$this->connect();
		$value = $this->clean($value);

		if ($value !== "" and $data !== ""){
			$query = "SELECT * FROM $table WHERE $data=$value";	
		}
		else{
			$query = "SELECT * FROM $table";
		}
		if($result = mysqli_query($this->conn,$query)){
			return $result->fetch_all(MYSQLI_ASSOC);
		}else{
			return "error";
		}
		$this->close();
	}

	function setdata(){
		$_SESSION['user'] 		= $this->user ;
		$_SESSION['id']			= $this->userId;
		$_SESSION['privilege']	= $this->privilege;
		$_SESSION['name']		= $this->fname;
		$_SESSION['lastname']	= $this->lname ;
		$_SESSION['mname'] 		= $this->mname;
		
	}

	//for Login Verification
	function verifyUser($username,$password){
		$username = $this->clean($username);
		$password = $this->clean($password);

		$result =mysqli_query($this->conn,"SELECT * FROM user WHERE username ='$username' AND password = md5('$password')") ;
		$count=mysqli_num_rows($result);

		if ($count > 0){
			$obj = $result->fetch_object();

			//Set all session variables needed
			
			$this->user 		= $obj->username;
			$this->userId 		= $obj->id;
			$this->fname 		= $obj->name;
			$this->lname 		= $obj->lastname;
			$this->privilege 	= $obj->type;
			$this->mname 		= $obj->mname;
			
			$_SESSION['user'] 		= $this->user ;
			$_SESSION['id']			= $this->userId;
			$_SESSION['privilege']	= $this->privilege;
			$_SESSION['name']		= $this->fname;
			$_SESSION['lastname']	= $this->lname ;
			$_SESSION['mname'] 		= $this->mname;
			
			mysqli_query($this->conn,"UPDATE user SET lastlogin = now() WHERE id = $obj->id");
			return true;
		}else{
			return false;
		}
		
		
	}

	// Do The Registration
	function register($data){
		$x = 0;
		$result = array();
		foreach($data as $key){
			$result[$x] = $this->clean($key);
			$x++;
		}
		$x=0;

		$query = " INSERT INTO user
			(username
			,password
			,name
			,lastname
			,mname
			,birthday)
			VALUES 
			('$result[1]',
			MD5('$result[2]'),
			'$result[4]',
			'$result[5]',
			'$result[6]',
			'$result[7]')";

		try {
			mysqli_query($this->conn,$query)or die(mysqli_error($this->conn));

		} catch (Exception $e) {
			$e;
		}
	}


	function execute($query){
		$this->connect();
		if ($result = mysqli_query($this->conn,$query) or die(mysqli_error($this->conn))){
			return $result;
		}else{
			false;
		}
		$this->close();
	}


	//delete the file from database
	function delete($table,$id){
		$query ="DELETE FROM $table WHERE id = '$id'";
		$this->execute($query);
	}

	//just making debug easier
	function debug($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}



	//clean the data before posting it to the data base
	function clean($x){
		if ($x <> null){

		$x = stripcslashes($x);
		$x = mysqli_real_escape_string($this->conn,$x);
		return $x;
		}else{
			return false;
		}

	}
	
	function is_logged(){
		if(isset($_SESSION['user'])){
			if($_SESSION['privilege'] == 1){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 404;
			}	
	}

	function get_progress($id){
		$query = "SELECT * FROM user_study_guide WHERE userid = '$id'";
		$result = $this->execute($query);
		$row = mysqli_num_rows($result); 
		if ($row > 0){
			return true;
		}else{
			return false;
		}

	}

	function get_max($data=null,$table='content'){
		if ($data == null){
			$query = "SELECT * FROM $table";
		}else{
			$query = "SELECT * FROM $table WHERE level='$data'";
		}
		$result = $this->execute($query);
		$row = mysqli_num_rows($result);
		return $row;
	}

	function set_study_guide($json,$level=1,$stat='ongoing'){

		$user = $_SESSION['id'];
		$query = "INSERT INTO user_study_guide (userid,studyResource,level,stat) VALUES ('$user','$json','$level','$stat')";
		
		$this->execute($query);
	}

	
	
	function close(){
		mysqli_close($this->conn);
	}

	//destroy the connection everytime the page is closed
	function __destruct(){
		mysqli_close($this->conn);
	}

	function set(){
		$this->user =$_SESSION['user'];
	}


}
?>