<?php
//function
 	require 'init.php';

// create a global con
 	$c = new dbcon 	;
 	$c->connect();

function getParam($page){
	@$page = $_REQUEST[$page];
	if($page == ""){
		return "";
	}else{
		return $page;
	}
}

function index(){
 	if(isset($_SESSION['user'])){
 		?>
		<!-- Header-->
      <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>

        <!-- Header-->
		
 		<?php
 	}
 	else{
 		?>
			<div class="content mt-3">
				<p ><div align="center"><h1 >Welcome to ASL Word Quiz</h1></div></p>
				<p>
					<img src="image/logo.png" width="250px" style="float:left;padding:10px;">
				</p>
				<p style="padding:10px;"><br>
					Word Quiz is an Educational Material / Tools that provides references to the users and make things much more easier and faster. This will provide as tool for the teacher to assest users progress in the asl (American Sign Language). This will also provide that
				</p>
			</div>


 		<?php

 	}
}


function profile(){
	?>

	<table width="100%">
		<tr>
			<td>Name</td>
			<td>
				<?php 
					echo $_SESSION['name']." ".$_SESSION['mname']." ".$_SESSION['lastname'] ;
				?></td>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td>Birthday</td>
			<td><?php  echo $_SESSION['bday']; ?></td>
	</table>



	<?php
}

/* This part make the page front end with the Prefix Show*/

function show_register(){
	//just shows the registration

	?>
	<form action="index.php" method="post">
		<table>
			<input type="hidden" name="p" value="doReg">
			<tr>
				<td>
					Username 
				</td>
				<td colspan="2">
					<input type="text" name="username" placeholder="username">
				</td>

			</tr>
			<tr>
				<td>Password</td>
				<td colspan="2">
					<input type="password" name="password" id="password">
				</td>
			</tr>
			<tr>
				<td>Re-Password</td>	
				<td colspan="2">
					<input type="password" name="password1" id= "password1">
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td colspan="2">
					<input type="text" name="name">
				</td>
			</tr>
			<tr>
				<td>Lastname</td>
				<td colspan=ss"2">
					<input type="text" name="Lastname">
				</td>
			</tr>
			<tr>
				<td>
					Middle Names
				</td>
				<td colspan="2">
					<input type="text" name="middlename">
				</td>
			</tr>
			<tr>
				<td>
					Birthday
				</td>
				<td colspan="2">
					<input type="date" name="Birthday">
				</td>
			</tr>
			<tr>
				<td><br></td>
				<td><input type="submit" name="submit" Value="Submit"></td>
				<td><br></td>
			</tr>
		</table>
	</form>




	<?php
}


//show login
function show_login(){
	?>
	<div class="obj-center">
		<form action="index.php" method="post" >
			<input type="hidden" name="p" value="doLogin">
			<table>
				<tr>
					<td><label for="email">Email address:</label></td>
					<td><input type="text" class="form-control" name="username"></td>
				</tr>
				<tr>
					<td><label for="pwd">Password:</label></td>
					<td><input type="password" name="password" id="passinput"> </td>
					
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="checkbox" onclick="showpass()">Show Password</td>	
				</tr>
				<script type="text/javascript">
						function showpass() {
						    var x = document.getElementById("passinput");
						    if (x.type === "password") {
						        x.type = "text";
						    } else {
						        x.type = "password";
						    }
						}
					</script>
				<tr>
					<td colspan="2" class="center"><input type="submit" value="Submit"></td>
				</tr>
			</table>
		</form>
	</div>

	<?php
}

//about page
function show_about(){
	echo "this is the about page";
}

//show upload Image for uploading and editing
function show_upImage($id=null){
	if ($_SESSION['privilege'] == 1){
	if($id == null ){
		?>
			<div class="modal" >
				<div class="content">
					<div class="header">
						Upload Image
					</div>
					<form action="index.php?p=doUpload" method="post" enctype="multipart/form-data">
						<table width="100%" style="margin:auto;">
							<tr>
								<td rowspan="9" align="center">
									<img src="#" id="preview" width="375px" height="450px">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="file" name="image" id="imageIn">
									<script type="text/javascript">
										$("#imageIn").change(function() {
											readURL(this);
										});
									</script>
								</td>
							</tr>
							<tr>
								<td>Title :</td>
								<td><input type="text" name="title"></td>
							</tr>
							<tr>
								<td>Category :</td>
								<td>
									<select name =level>
										<option value="1">Letters</option>
										<option value="2">Words</option>
										<option value="3">Phrases</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>English :</td>
								<td><input type="text" name="english"></td>
							</tr>
							<tr>
								<td>Tagalog :</td>
								<td>
									<input type="text" name="tagalog">
								</td>
							</tr>
							<tr>
								<td>Bicol :</td>
								<td><input type="text" name="bicol"></td>
							</tr>
							<tr>
								<td>Notes :</td>
								<td><textarea type="text" rows="10" name="note"></textarea></td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit" value="upload">
								</td>
							</tr>
						</table>
					</form>
					<div class="footer">
						<button onclick="toggleModal('modal')"> Close</button>
						<script type="text/javascript" src="js/functions.js"></script>
					</div>
				</div>
				</div>
			<?php

	}else{
		# editing page
		global $c;
		$result = $c->select('content','id',$id);
		$key = $result[0];

		?>
			<div class="modal" >
				<div class="content">
					<div class="header">
						Upload Image
					</div>
					<form action="index.php?p=doUpload" method="post" enctype="multipart/form-data">
					<?php
						echo "<input type='hidden' name='t' value='".$key['id']."'>";
					?>
						<table width="100%" style="margin:auto;">
							<tr>
								<td rowspan="9" align="center">
									<?php
										echo '<img src="media/images/'.$key['media_link'].'" id="preview" width="375px" height="450px">';
									?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="file" name="image" id="imageIn">
									<script type="text/javascript">
										$("#imageIn").change(function() {
											readURL(this);
										});
									</script>
								</td>
							</tr>
							<tr>
								<td>Title :</td>
								<td>
									<?php echo '<input type="text" name="title" value="'.$key['title'].'">';?>
									
								</td>
							</tr>
							<tr>
								<td>Category :</td>
								<td>
									<select name =level>
										<?php 
											switch ($key['level']) {
												case '1':
													echo '
														<option value="1" selected>Letters</option>
														<option value="2">Words</option>
														<option value="3">Phrases</option>';
													break;
												case '2':
													echo '
														<option value="1" >Letters</option>
														<option value="2" selected>Words</option>
														<option value="3">Phrases</option>';
													break;
												case '3':
													echo '
														<option value="1" >Letters</option>
														<option value="2">Words</option>
														<option value="3" selected>Phrases</option>';
													break;
												
												default:
													echo '
														<option value="1" >Letters</option>
														<option value="2">Words</option>
														<option value="3" selected>Phrases</option>';
													break;
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>English :</td>
								<td>
									<?php
										echo '<input type="text" name="english" value="'.$key['english'].'">'
									?>
									
								</td>
							</tr>
							<tr>
								<td>Tagalog :</td>
								<td>
									<?php
										echo '<input type="text" name="tagalog" value="'.$key['tagalog'].'">'
									?>
								</td>
							</tr>
							<tr>
								<td>Bicol :</td>
								<td>
									<?php
										echo '<input type="text" name="bicol" value="'.$key['bicol'].'">'
									?>
								</td>
							</tr>
							<tr>
								<td>Notes :</td>
								<td>
									<?php
										echo '<textarea type="text" rows="10" name="note">'.$key['note'].'</textarea>'
									?>
									
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit" value="upload">
								</td>
							</tr>
						</table>
					</form>
					<div class="footer">
						<button onclick="toggleModal('modal')"> Close</button>
						<script type="text/javascript" src="js/functions.js"></script>
					</div>
				</div>
				</div>
			<?php

	}
}}


//shows the Content Manager
function show_ContentMgt(){
	?>
		<a href="index.php?p=upImage"> Upload New Image</a><br>
		<a href="index.php?p=mgAllImage"> Show all Images</a>

	<?php
}


//show All images  'mgAllImage' task
function show_searchInput(){
	?>
	All Images<br>
	<!--  Search Bar -->
	<form class="center" method="post" action="index.php">
		<input type="hidden" name="p" value="mgAllImage">
		<input type="hidden" name="t" value="dosearch">
		<input type="text" name="searchInput">
		<input type="submit" name="search" value="Search">
	</form>
	<br>
	
	<?php
}

function show_viewDetails($id){
	
	//fetch data from the database according to $id
	global $c;
	$result = $c->select('content','id',$id);

	//create the view for the user
	?>

	<div class="modal" >
		<div class="content">
			<div class="header">
				Details of <?php echo $result[0]['title'];?>
			</div>
			<table width="100%" >
				<tr>
					<td rowspan="5" width="50%" class="center">
						<?php
							echo '<img src="media/images/'.$result[0]['media_link'].'" width="375px" height="450px">';
						?>
					</td>
					<td width="25%" class="center">English : </td>
					<td width="25%" class="center"><?php echo $result[0]['english'];?></td>
				</tr>
				<tr>
					<td class="center"> Tagalog : </td>
					<td class="center"> <?php echo $result[0]['tagalog'];?> </td>
				</tr>
				<tr>
					<td class="center"> Bicol : </td>
					<td class="center"> <?php echo $result[0]['bicol'];?> </td>
				</tr>
				<tr>
					<td class="center" rowspan="2"> Note : </td>
					<td class="center" rowspan="2"> <?php echo $result[0]['note'];?> </td>
				</tr>
				
			</table>
			<div class="footer">
				<button onclick="toggleModal('modal')"> Close</button>
				<script type="text/javascript" src="js/functions.js"></script>
			</div>
		</div>
	</div>
	<?php
}

//do the searching for mgAllImage
function show_searchResult($data=null){
		?>
		<div class="overflowY">
		<table width="100%">
		<?php
		global $c;
		$result = $c->search($data);
		
		?>
			<tr class="center">
				<th>Image</th>
				<th>English</th>
				<th>Tagalog</th>
				<th>Note</th>
				<th>Options</th>
			</tr>
		<?php
		if( $result == false){
			echo "<tr class='center'><td colspan='5'><h2>No Record Found</h2></td></tr>";
		}else{
			foreach ($result as $key) {
			?>
			<tr class="center">
				<td>
					<img src=<?php echo "'media/images/".$key['media_link']."'" ?> width="100px" height="125px">
				</td>
				<td><?php echo $key['english']?></td>
				<td><?php echo $key['tagalog']?></td>
				<td><?php echo $key['note']?></td>
				<td>
					<?php 
					echo "<a href=\"index.php?p=mgAllImage&task=view&id=".$key['id']."\"> View </a>";

					if ($_SESSION['privilege'] == 1){
						echo "<a href=\"index.php?p=upImage&id=".$key['id']."&t=edit\"
					
				>Edit </a>";
					 echo "<a href=\"index.php?p=mgAllImage&task=del&id=".$key['id']."&file=".$key['media_link']."\"
				>Delete</a>";
			}
				?>
					
				</td>
			</tr>
			<?php
			}
		}

			?>

		</table>
		</div><?php			
}
function show_msgModal($msg){
	?>
		<div class="modal2">
			<div class="content center">
				<?php echo '<h3>'.$msg.'</h3>';?>
				<div class="footer">
					<button onclick="toggleModal('modal2')"> Close</button>
					<script type="text/javascript" src="js/functions.js"></script>
				</div>
			</div>	
		</div>



	<?php
}
// Show the video uploading form
function show_upVideo($file,$update=false){
	?>
	<!-- initial muna  -->
	<form action="index.php?">
		<table>
			

		</table>		
	</form>
		

	<?php
}
function show_403(){
	?>

	<img src="media/images/403.png" width="100%" height="100%">

	<?php
}

##########################################################################################
##########################################################################################

/* This area provides the work or the do the processing of data */


//delete Image from table content with the id
function do_deleteImage($id,$filename){
	global $c;
 	$c->delete('content',$id);
 	$path = "media/images/".$filename;
 	unlink($path);
}

//do the uploading of images to the database and the file folder
//Insert and edit
function do_upload($data=null){
	$upImage = new Upload($_FILES['image']);
	$upImage->file_new_name_body = "dclcwq";

	if($data==null){
		if($upImage->uploaded){
			$upImage->Process('media/images');
			if($upImage->processed){
				echo 'original image copied';
				$query= "INSERT INTO content
					(userid, 
					 title,
					 media_link,
					 note,
					 english,
					 tagalog,
					 bicol,
					 level)
				 VALUES (
				 '".$_SESSION['id']."',
				 '".$_POST['title']."',
				 '".$upImage->file_dst_name."'
				 ,'".$_POST['note']."'
				 ,'".$_POST['english']."'
				 ,'".$_POST['tagalog']."'
				 ,'".$_POST['bicol']."'
				 ,'".$_POST['level']."'

					)" ;
				global $c;
				$c->execute($query);
				return 'Upload Complete';
			}else{
				return 'error occured: '.$upImage->error;
			}
		}
	}else{
		$query= "UPDATE content SET 
					userid='".$_SESSION['id']."',
					title='".$_POST['title']."',
					note='".$_POST['note']."',
					english='".$_POST['english']."',
					tagalog='".$_POST['tagalog']."',
					bicol='".$_POST['bicol']."',
					level='".$_POST['level']."' 
					WHERE id = '".$data."'";
		global $c;
		if ($c->execute($query)){
			return 'Update Complete';
		}else{
			return "Error Occured while uploading";
		}
	} 
}


function doLogin($username,$password){
	global $c;
	$check = $c->verifyUser($username,$password);
	
	if ($check == true){
		//echo "welcome";
		//header("location:index.php");
		redirect('index.php');
	}else{
		//echo "error";
		show_login();
	}
}


//do Registration
function doReg(){
	global $c;
	$result = $c->register($_POST);	
}

function do_cert(){
	
	define('FPDF_FONTPATH','font');

	$pdf = new FPDF();
	$pdf->AddPage('L','Letter');
	$pdf->AddFont('ananda','R');
	$pdf->SetFont('ananda','R',40);
	$pdf->Image('media/images/cert.jpg',0,0,-300,-300);
	$pdf->SetXY(13,118);
	$pdf->SetTextColor(45,50,125);
	$pdf->Cell(10,0,'Darwin Buelo',0,0,'L');
	return $pdf->Output();

}

function is_logged(){
	global $c;
	return $c->is_logged();
}

function do_logout(){
   session_unset();
   session_destroy();
}


function rand_string( $length ) {
    $length += 3;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
    $str= "";
    $size = strlen( $chars );
    for( $i = 0; $i < $length; $i++ ) {
            if($i == 5 || $i == 11 || $i == 17 )
                $str .= '-';
            else
                $str .= $chars[ rand( 0, $size - 1 ) ];
    }

    return $str;
}



#################################################
###### FUNCTION for the Study Program	#########
#################################################
	// first get the users progress in database
	// 2nd decide what to show by randomly picking 20 items from the database and showing it to the user one by one

	//data field in user_study_guide table
#### id , userid , studyResource, date, level, stat
	

function show_study($current){
	global $c;

	echo '<p>Hello '.$_SESSION['name'].'</p>';

	// check if the user already had a record in the database
	if($c->get_progress($_SESSION['id'])){
		$array = get_studyMaterial($_SESSION['id']);
		show_studyList($array);
		
	}else{

		echo 'You are new to this site.';
		generate_Study(1);
		get_studyMaterial($_SESSION['id']);
		
	}
}

function show_studyList($array){
	global $c;
	//check if the array is not null and is an actual array
	if (is_array($array) and $array !== null){
		?>
		<table width="100%">
		<?php
		foreach ($array as $key) {
			$result = $c->select('content','id',$key);
			?>

				<tr> 
					<td><?php echo '<img src="media/images/'.$result[0]['media_link'].'" width="100px" height="125px">'?>
					</td>
					<td>
						<?php echo '<h2>'.$result[0]['title'].'</h2>'?>
					</td>
					<td>

						<?php echo "<button onclick=\"toggleModalId('modal_".$key."')\">View</button>" ?>

					</td>
				</tr>
				
			<?php
		}
		?></table>
		<?php 

		//generate the modal.. by running another foreach loop to the array
		// we cannot include this one to the foreach load from the top because t
		// this includes  different html tags does making the modal in appropriate to view
		foreach ($array as $key) {
			# code...
			generate_modal($key);
		}
		
	}
}


function generate_Study($level){
	global $c;
	$max = $c->get_max($level);
	$array = randomGen(1,$max,20);
	$list = array();

	foreach($array as $key){
		$result = $c->select('content','level',$level);
		$list[] =$result[$key-1]['id'];
		}

	$c->set_study_guide(json_encode($list));

}

function randomGen($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function get_studyMaterial($id){
	global $c;
	//fetch the list of study guide in the database
	$user_guide = $c->select('user_study_guide','userid',$id);
	//fetch the actual json list and decode it to array
	$guideList = json_decode($user_guide[0]['studyResource']);
	//fetch the resources

	return $guideList;
 	
	
}

function generate_modal($id){
	global $c ;
	$result = $c->select('content','id',$id);
	?>
	<div class="modal" id=<?php echo '"modal_'.$id.'"';?>>
		<div class="content">
			<table width="100%" >
				<tr>
					<td rowspan="5" width="50%" class="center">
						<?php
							echo '<img src="media/images/'.$result[0]['media_link'].'" width="375px" height="450px">';
						?>
					</td>
					<td width="25%" class="center">English : </td>
					<td width="25%" class="center"><?php echo $result[0]['english'];?></td>
				</tr>
				<tr>
					<td class="center"> Tagalog : </td>
					<td class="center"> <?php echo $result[0]['tagalog'];?> </td>
				</tr>
				<tr>
					<td class="center"> Bicol : </td>
					<td class="center"> <?php echo $result[0]['bicol'];?> </td>
				</tr>
				<tr>
					<td class="center" rowspan="2"> Note : </td>
					<td class="center" rowspan="2"> <?php echo $result[0]['note'];?> </td>
				</tr>
				
			</table>
			<div class="footer">
				<?php
				echo	"<button onclick=\"toggleModalId('modal_".$id."')\"> Close</button>";
				?>
				
			</div>
		</div>
	</div>
	<?php 
}

function redirect($url){

	echo '<script type="text/javascript">
				window.location.replace("'.$url.'");
		</script>';

}

?>