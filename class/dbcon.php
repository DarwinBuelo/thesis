<?php

//databaseConnection

/**
*  @author Darwin Buelo
*/

class dbcon
{
	//difine the variable needed
	protected $host = '127.0.0.1';
	protected $username = 'darwin';
	protected $password = '12345';
	protected $dbname = 'thesis';

	public $conn;

	//creates a constructor for the class
/*	function __construct($dbname,$host=null,$username = null ,$password= null){
		//assigning the values
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;



	} */

	//Connect to the database
	function connect(){
		try {
			$this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->dbname);	
		} catch (Exception $e) {
			echo "<pre>".$e."</pre>";
		}
	}

	function search($data=null){
		$this->connect();
		$data = $this->clean($data);
		$table = 'content';

		if ($data == "") {
			$query = "SELECT * FROM $table";
		}else{
			$query = "SELECT * FROM $table WHERE note LIKE '$data' or note LIKE '%".$data."' or note LIKE '%".$data."%' or note LIKE '".$data."%'";	
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

	//for Login Verification
	function verifyUser($username,$password){
		$username = $this->clean($username);
		$password = $this->clean($password);

		$result =mysqli_query($this->conn,"SELECT * FROM user WHERE username ='$username' AND password = md5('$password')");
		$count=mysqli_num_rows($result);

		if ($count > 0){
			$obj = $result->fetch_object();

			//Set all session variables needed
			$_SESSION['user'] = $obj->username;
			$_SESSION['id'] = $obj->id;
			$_SESSION['privilege'] = $obj->type;
			$_SESSION['name'] = $obj->name;
			$_SESSION['lastname'] = $obj->lastname;
			$_SESSION['mname'] = $obj->mname;
			$_SESSION['bday'] = $obj->birthday;
			
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
		mysqli_query($this->conn,$query)or die(mysqli_error($this->conn));
		$this->close();
		return true;
		

	}


	//delete the file from database
	function delete($table,$id){
		$this->connect;
		$query ="DELETE FROM $table WHERE id = '$id'";
		mysqli_query($this->conn,$query)or die(mysqli_error($this->conn));
	}

	//just making debug easier
	function debug($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}



	//clean the data before posting it to the data base
	function clean($x){
	$x = stripcslashes($x);
	$x = mysqli_real_escape_string($this->conn,$x);
	return $x;
	}

	function close(){
		mysqli_close($this->conn);
	}

	//destroy the connection everytime the page is closed
	function __destruct(){
		mysqli_close($this->conn);
	}



}?>