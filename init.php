<?php


// just load the classes
// auto load all classes inside the class folder

spl_autoload_register(function($class) {
	require_once "class/".$class.".php";
});

require_once 'functions.php';


?>