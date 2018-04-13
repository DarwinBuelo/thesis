<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thesis</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
	<?php
		require 'init.php';
		require 'functions.php';


	
		session_start ();

	?>

	<div class="container">
		<!--header-->
		<div class="header orange">
			<h1>Word quiz Sign Language</h1>
			<p>where everything has trust</p>
			
			<?php 
				if (isset($_SESSION['user'])){
					echo "<p class='right'>".$_SESSION['user']."</p>";
				}
			?>
		</div>
		<!-- Sidebar -->
		<div class="sidenav emerald">
			<?php
				if(!isset($_SESSION['user'])){
					echo '<a href="index.php?p=login">Login</a>';
					echo "<a href=\"index.php?p=reg\">Register</a>";

				}else{
					echo "<a href=\"index.php?p=logout\">Logout</a>";
					
					echo "<a href=\"index.php?p=profile\">Profile</a>";
					if ($_SESSION['privilage'] == 1){
						echo "<a href=\"index.php?p=contentmgt\">Manage Content</a>";	
					}

					
				}
			?>
			<a href="index.php?p=about">About</a>
		</div>


		<!-- Main content-->
		<div class="content clouds">
			<?php

			//Just Shows the Content

			 $task = getParam('p');

			 switch ($task) {
			 	
			 	case 'login':
			 		//Show the Login menu
			 		show_login();
			 		break;
			 	case 'doLogin':
			 		//verify Users Credentials
			 		doLogin($_POST['username'],$_POST['password']);
			 		break;
			 	case 'reg':
			 		//shows registration form
			 		show_register();
			 		break;
			 	case 'doReg':
			 		//do registration 
			 		doReg();
			 		break;
			 	case 'upImage':
			 		//show modal on uploading Images
			 		$task = getParam('t');
			 		$id = getParam('id');
			 		switch ($task) {
			 			case 'edit':

			 				show_upImage($id);
			 				show_searchInput();
					 		$id = getParam('id');
					 		$filename = getParam('file');
			 				show_searchResult();
			 				break;
			 			
			 			default:
			 				show_upImage();
			 				show_ContentMgt();
			 				break;
			 		}

			 		break;

			 	case 'doUpload':
			 		//do the uploading of data
			 		$task = getParam('t');
			 		if(is_numeric($task)){
			 			doUpload($task);
			 			header('location:index.php?p=mgAllImage');
			 		}else{
			 			doUpload();
			 			header('location:index.php?p=contentmgt');

			 		}
			 		break;
			 	case 'profile':
			 		//shows profile
			 		profile();
			 		break;
			 	case 'about':
			 		//show about 
			 		show_about();
			 		break;
			 	case 'logout';
			 		//logout from session
			 		unset($_SESSION['user']);
			 		header("location:index.php");
			 		break;
			 	case 'contentmgt';
			 		//shows content management
			 		show_ContentMgt();
			 		break;
			 	//mange all image
			 	case 'mgAllImage';
			 		show_searchInput();
			 		$id = getParam('id');
			 		$filename = getParam('file');
			 		
			 		if (is_numeric($id)){
			 			do_deleteImage($id,$filename);
			 			header('location:index.php?p=mgAllImage');
			 		}

			 		if (isset($_POST['searchInput'])) {			 		show_searchResult($_POST['searchInput']);
			 		}else{
			 			show_searchResult();
			 		}
			 		


			 		break;

			 	default:
			 		index();
			 		break;
			 }


			?>
		</div>
		<div class="footer asbestos">
			<center>
				<p>footer</p>
			</center>
		</div>
	</div>


</body>
</html>