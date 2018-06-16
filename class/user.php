<?php
//user class
// this will handle all users interaction to the database

/**
*	@author Darwin Buelo
*	@version 1
*/

/**
* 
*/
class user extends dbcon
{
	public $user = 'new user';



	function set(){
		$this->user = 'none';
		
	}

	function show(){
		return $this->user;
	} 
}



?>