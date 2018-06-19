<!DOCTYPE html>
<html>
<head>
	<!--<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Thesis</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">



	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
-->

<!-- This will be the new UI  this is included in the theme-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ASL Word Quiz</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.less"> 
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/styles_new.css">

   <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
   <script src="assets/js/plugins.js"></script>
   <script src="assets/js/main.js"></script>

	<script src="assets/js/dashboard.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</head>
<body>
	<?php
		require 'init.php';
		session_start ();

	?>

<!-- Left Panel start-->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="image/logo1.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="image/logo.png" alt="Logo" ></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
	                <?php
						if(!isset($_SESSION['user'])){
							echo '<li><a href="index.php?p=login"><i class="menu-icon fa fa-sign-in"></i>Login </a></li>';
							echo '<li><a href="index.php?p=reg"><i class="menu-icon fa fa-sign-in"></i>Register</a></li>';
						}else{
							if ($_SESSION['privilege'] == 1){
								echo '<li><a href="index.php?p=logout"><i class="menu-icon fa fa-sign-in"></i>Login </a></li>';
								echo '<li><a href="index.php?p=profile"><i class="menu-icon fa fa-sign-in"></i>Register</a></li>';
								echo '<li><a href="index.php?p=contentmgt"><i class="menu-icon fa fa-sign-in"></i>Manage Content</a></li>';
						

							}else if($_SESSION['privilege'] == 0) {
								echo '<li><a href="index.php?p=logout"><i class="menu-icon fa fa-sign-in"></i>Logout</a></li>';
								echo '<li><a href="index.php?p=profile"><i class="menu-icon fa fa-user"></i>Profile</a></li>';
								echo '<li><a href="index.php?p=study"><i class="menu-icon fa fa-book"></i>Study</a></li>';
								echo '<li><a href="index.php?p=mgAllImage"><i class="menu-icon fa fa-book"></i>Reference</a></li>';
								echo '<li><a href="index.php?p=cert" target="blank"><i class="menu-icon fa fa-certificate"></i>Get Certificate</a></li>';
							
							}

							
						}
					?>
                    <li>
                    	<a href="index.php?p=about"><i class="menu-icon fa fa-info-circle"></i>About
                    	</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

<!-- Left Panel Ends-->



<!-- Right Panel Start-->
   <div id="right-panel" class="right-panel">
   		<?php

			//Just Shows the Content

			/* Some reserved parameters for the program
				-p = page 		==== this refer to the page to be display or to the action to make
				-t = task 		==== this refers to the action to make in the page
				-id = id 		==== refers to the id of the specific file or data in the database
				-file = file 	==== indicates the file name 

			*/

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


			 	//do the uploading of data
			 	case 'doUpload':
			 		$task = getParam('t');
			 		if(is_numeric($task)){
			 			$msg = do_upload($task);
			 			header('location:index.php?p=mgAllImage&task=msg&msg='.$msg);
			 		}else{
			 			$msg = do_upload();
			 			header('location:index.php?p=contentmgt&task=msg&msg='.$msg);
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
			 		do_logout();
			 		redirect('index.php');
			 		//header("location:index.php");
			 		break;
			 	
			 	case 'contentmgt';
			 		//shows content management
			 		$task =getParam('task');
			 		$msg = getParam('msg');
			 		if ($task<> null) {
			 			show_msgModal($msg);
			 		}
			 		show_ContentMgt();
			 		break;
			 	
			 	//mange all image
			 	case 'mgAllImage';
			 		show_searchInput();
			 		$task = getParam('task');
			 		$id = getParam('id');
			 		$filename = getParam('file');
			 		$msg = getParam('msg');

			 		switch ($task) {
			 			case 'msg':
			 				show_msgModal($msg);
			 				break;
			 			case 'del':
							if (is_numeric($id)&&isset($filename)){
								do_deleteImage($id,$filename);
					 			header('location:index.php?p=mgAllImage&task=msg&msg=deleted');
					 		}
			 				break;
			 			case 'view':
			 				show_viewDetails($id);
			 				break;
			 		}
			 		

					if (isset($_POST['searchInput'])) {
						show_searchResult($_POST['searchInput']);
				 	}else{
						show_searchResult();
		 			}		 		
			 		

			 		break;
			 	case 'cert':
			 		do_cert();
			 		//redirect('certificate.php');
				 	//header('Location : fpdftest.php');
				 	break;

			 	case '403':
				 	show_403();
				 	break;
				
				// case the user click study
				case 'study';
					$state = getParam('st');
					if (is_null($state) or !is_numeric($state)){
						show_study(0);	
					}else{
						show_study($state);
					}
					
					break;

			 	default:
			 		index();
			 		break;
			 }


			?>

   </div><!-- /#right-panel -->



<!-- Right Panel Ends-->



</body>
</html>