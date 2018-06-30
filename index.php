<!DOCTYPE html>
<html>
<head>


<!-- This will be the new UI  this is included in the theme-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ASL Word Quiz</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="image/favicon.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.less"> 
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>

<!-- Customize the theme-->
	<link rel="stylesheet" type="text/css" href="css/styles_new.css">
	<script src="js/functions.js"></script>




</head>
<body  >
	<?php
		require_once'init.php';
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

								echo '<li><a href="index.php?p=contentmgt"><i class="menu-icon fa fa-sign-in"></i>Manage Content</a></li>';
								echo '<li><a href="index.php?p=logout"><i class="menu-icon fa fa-sign-in"></i>Logout</a></li>';

							}else if($_SESSION['privilege'] == 0) {
								
								echo '<li><a href="index.php?p=profile"><i class="menu-icon fa fa-user"></i>Profile</a></li>';
								echo '<li><a href="index.php?p=study"><i class="menu-icon ti-blackboard"></i>Study</a></li>';
								echo '<li><a href="index.php?p=mgAllImage"><i class="menu-icon fa fa-book"></i>Reference</a></li>';
								echo '<li><a href="index.php?p=cert"><i class="menu-icon fa fa-certificate"></i>Get Certificate</a></li>';
							echo '<li><a href="index.php?p=logout"><i class="menu-icon fa fa-sign-in"></i>Logout</a></li>';
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
				<!-- Header-->
      <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    
                  Welcome to Word Quiz Sign Language
                </div>
            </div>

        </header>

   	<div  class="content">
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
			 		if(is_logged()==1){
			 			//show the modal uploading  form
			 			//show editing mode if the id was not set
				 		$task = getParam('task');
				 		$id = getParam('id');
				 		$msg = getParam('msg');
				 		switch ($task) {
				 			case 'complete':
				 				show_upImage('complete');
				 				break;
				 			case 'error':
				 				show_upImage('error');
				 				break;
				 			case 'edit':
				 				show_upImage($id);
				 		 	 		$id = getParam('id');
						 		$filename = getParam('file');
				 				break;
				 			
				 			default:
				 				show_upImage();
				 				break;
				 		}
			 		}

			 		break;


			 	//do the uploading of data
			 	case 'doUpload':
			 		$task = getParam('t');
			 		if(is_numeric($task)){
			 			// editing content
			 			$msg = do_upload($task);
			 			redirect('index.php?p=mgAllImage&task='.$msg);
			 		}else{
			 			//uploading new content
			 			$msg = do_upload();
			 			redirect('index.php?p=upImage&task='.$msg);
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
			 		if(is_logged() == 1 ){
				 		$task =getParam('task');
				 		$msg = getParam('msg');
				 		if ($task<> null) {
				 			show_msgModal($msg);
				 		}
				 		show_ContentMgt();
			 		}else{
			 			redirect('index.php?p=403');
			 		}
			 		break;
			 	
			 	//mange all image
			 	case 'mgAllImage';
			 		show_searchInput();
			 		$task = getParam('task');
			 		$id = getParam('id');
			 		$filename = getParam('file');
			 		$msg = getParam('msg');
			 		$page = getParam('page');

			 		switch ($task) {
			 			case 'msg':
			 				show_msgModal($msg);
			 				break;
			 			case 'del':
							if (is_numeric($id)&&isset($filename)){
								do_deleteImage($id,$filename);
					 			redirect('index.php?p=mgAllImage&task=msg&msg=deleted');
					 		}
			 				break;
			 		}
			 		
			 			//when the user search something
					if (isset($_POST['searchInput'])) {
						show_searchResult($_POST['searchInput'],0);
				 	}else{
				 		//default display
						
						show_searchResult(null,$page);
						
		 			}		 		
			 		

			 		break;
			 	case 'cert':
			 		do_cert();
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