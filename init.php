<?php


// just load the classes

spl_autoload_register(function($class) {
	require_once "class/".$class.".php";
});


?>