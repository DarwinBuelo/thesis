<?php
//function
 	$c = new dbcon();
	$c->connect();



//do Registration
function doReg(){
	global $c;
	$result = $c->register($_POST);	
}


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
			<label for="email">Email address:</label>
			<input type="hidden" name="p" value="doLogin">
			<input type="text" class="form-control" name="username">
	  		<br>
		    <label for="pwd">Password:</label>
			<input type="text" name="password">
			 <br><input type="submit" value="Submit">
		</form>
	</div>

	<?php

}

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
		</tr>
	</table>



	<?php
}


//about page
function show_about(){
	echo "this is the about page";
}

//show upload Image
function show_upImage(){
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
				<button onclick="toggleModal()"> Close</button>
				<script type="text/javascript" src="js/functions.js"></script>
			</div>
		</div>
		</div>
	<?php
}

//do the uploading of images to the database and the file folder
function doUpload($data=null){
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
				$conn = new dbcon();
				$conn->connect();
				$conn->execute($query);
			}else{
				echo 'error occured: '.$upImage->error;
			}
		}
	} 
}


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

//do the searching for mgAllImage
function show_searchResult($id=null){
		?>
		<table width="100%">
		<?php
		$c = new dbcon();
		$result = $c->select('content','id',$id);
		var_dump($result);
		?>
			<tr class="center">
				<th>Image</th>
				<th>English</th>
				<th>Tagalog</th>
				<th>Note</th>
				<th>Options</th>
			</tr>
		<?php
		try {
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
					<button>Edit</button>
					<button>Delete</button>
				</td>
			</tr>
			<?php
		}
		} catch (Exception $e) {
			echo $e;
		}
		

		?>
	</table><?php			
}

?>