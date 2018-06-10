<?php
//function
 	require 'init.php';

 	$c = new dbcon();
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
 		echo "Welcome ".	$_SESSION['user']."<br>";
 	}
 	else{
 		echo "Welcome Guest";
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
					<td><input type="password" name="password"></td>
				</tr>
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
	if ($check== true){
		echo "welcome";
		header("location:index.php");
	}else{
		echo "error";
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
?>