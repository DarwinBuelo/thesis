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
 	if(is_logged() !== 404){
 		redirect('index.php?p=profile');
 	}
 	else{
 		?>
			<div class="content mt-3">
				<p ><div align="center"><h1 >Welcome to ASL Word Quiz</h1></div></p>
				<p>
					<img src="image/logo.png" width="250px" style="float:left;padding:10px;">
				</p>
				<p style="padding:10px;"><br>
					Word Quiz is an Educational Material / Tool that provides references to the users and make things much more easier and faster in understanding sign language.This will provide as tool for the teacher to assest users progress in the asl (American Sign Language). This will also provide as a references to the users showing information such as English Translation , Tagalog Translation, Bicol Translation and  the some information about the sign.
				</p>
				<p style="padding:10px">
					The content of this web application was based on the book Love Signs - The Sign Language in English and Pilipino by REV. S. WAYNE SHANEYFELT.
				</p>
				<p>
				</p>
			</div>


 		<?php

 	}
}


function profile(){
    global $c;
    $userProgress = $c->select('progress','id',$_SESSION['id']);

    show_msgModal('nenen');
	?>
    <div class="col-sm-4">
    <div class="card">
        <div class="card-header">
           <strong class="card-title mb-3">Profile Card </strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class="rounded-circle mx-auto d-block" src="image/avatar.jpg" alt="Card image cap">
                <h5 class="text-sm-center mt-2 mb-1"><?php 
                    echo $_SESSION['name']." ".$_SESSION['mname']." ".$_SESSION['lastname'] ;
                ?></h5>
                <table class="table">
                    <tr>
                        <td>Level</td>
                        <td><?php echo (sizeof($userProgress) !== 0) ? $userProgress['level'] : '1';?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
	</div>
	<?php
}

/* This part make the page front end with the Prefix Show*/
function show_register(){
	//just shows the registration

	?>
	<div class="content mt-3">
		    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
            	<div class="login-logo">
            		<h2>Registration Form</h2>
                </div>
                <div class="login-form">
                	*NOTE: Registration Button will only show once all information has properly filled
                    <form action="index.php" method="post" id="regform">
                    	<input type="hidden" name="p" value="doReg">
                        <div class="form-group">
                            <label>*User Name</label>
                            <input required type="text" class="form-control" placeholder="User Name" name="username">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label>*Firstname</label>
                            <input required type="text" class="form-control" placeholder="First name" name="name">
                        </div>
                        <div class="form-group">
                            <label>*LASTNAME</label>
                            <input required type="text" class="form-control" placeholder="Last name" name="lastname">
                        </div>
                        <div class="form-group">
                            <label>*MIDDLENAME</label>
                            <input  required type="text" class="form-control" placeholder="Middle name" name="middlename">
                        </div>
                            <label>*Birthday</label>
                        <div class="form-group">
                            <input required type="date" class="form-control" placeholder="Birthday"name="birthday">
                        </div>

                        <div class="form-group">
                            <label>*Password</label>
                            <input required type="password" class="form-control" placeholder="Password"name="password" id="pass1" onchange=>
                            <div  id="pswd_info" >
                            		It is important to use a strong password
                                  <p class="mb-0"><ul class="error">
											        <li id="letter" class="invalid">At least <strong>one letter</strong></li>
											        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
											        <li id="number" class="invalid">At least <strong>one number</strong></li>
											        <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
											    </ul>
											</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>*Retype Password</label>
                            <input required type="password" class="form-control" placeholder="Password" id="pass2">
                            <div  id="pswd_match">
                            	<p >Password Not Match</p>

                            </div>
                        </div>
                        <script type="text/javascript">

                        </script>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" id="button">Register</button>

                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="index.php?p=login"> Sign in</a></p>
                        </div>
                    </form>
                    <script type="text/javascript">
                    	jQuery(document).ready(function(){
                    		jQuery('#pass1').keyup(function() {
							    var pswd = jQuery(this).val();
							    

							 	if ( pswd.length < 8 ) {
								   jQuery('#length').removeClass('valid').addClass('invalid');
								} else {
								    jQuery('#length').removeClass('invalid').addClass('valid');
								    
								}
								//validate letter
								if ( pswd.match(/[A-z]/) ) {
								    jQuery('#letter').removeClass('invalid').addClass('valid');
								    

								} else {
								    jQuery('#letter').removeClass('valid').addClass('invalid');
								}

								//validate capital letter
								if ( pswd.match(/[A-Z]/) ) {
								    jQuery('#capital').removeClass('invalid').addClass('valid');
								    
								} else {
								    jQuery('#capital').removeClass('valid').addClass('invalid');
								}

								//validate number
								if ( pswd.match(/\d/) ) {
								    jQuery('#number').removeClass('invalid').addClass('valid');
								    
								} else {
								    jQuery('#number').removeClass('valid').addClass('invalid');
								}
							}).focus(function() {
							    jQuery('#pswd_info').show();

							    
							}).blur(function() {
							    jQuery('#pswd_info').hide();
							});

							jQuery('#pass2').keyup(function(){
								
								var pass1 = jQuery("#pass1").val();
								var pass2 = jQuery(this).val();

								if (pass1 == pass2 ){
									jQuery('#pswd_match').hide();
									jQuery("#button").show();
								}else{
									jQuery('#pswd_match').show();
									jQuery("#button").hide();
								}
							}).blur(function(){
								jQuery('#pswd_match').hide();
							});
						});
                    </script>
                </div>
            </div>
        </div>
    </div>

	<?php
}


//show login
function show_login($message=null){
	?>
	
    <div class=" sufee-login d-flex align-content-center flex-wrap content " >
        <div class="content" >
            <div class="login-content">
            	<?php 		if($message !== null){
            		echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-danger">Error</span> Incorrect Username or Password
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                              </div>';}?>
           		<div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form " >
                    <form action="index.php" method="post">
                    	<input type="hidden" name="p" value="doLogin">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
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
        if (!is_numeric($id)){

            $msg = $id;
            $id =null;
            switch ($msg) {
                case 'complete':    
                ?>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span> Upload Complete
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                <?php 
                break;

                case 'error':
                ?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Error</span> Error occured while uploading
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                <?php 

                break;
                
                default:
                    # code...
                    break;
            }
        
        }
        
	if($id == null ){
		?>
			<div class="col-lg-12 col-md-4" >
				<div class="card ">
					<div class="card-header text-center">
						<h2><b>Upload Image</b></h2>
					</div>
                    <div class="card-body">
                        <form action="index.php?p=doUpload" method="post" enctype="multipart/form-data">
                        <table width="100%" style="margin:auto;">
                            <tr>
                                <td rowspan="9" align="center">
                                    <img src="image/defualt-size.jpg" id="preview" class="imgholder">
}

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="file" name="image" id="imageIn">
                                   
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
			<div class="col-lg-12 col-md-4" >
                <div class="card animated fadeIn">
                    <div class="card-header text-center">
                        <h2><b>Edit Image</b></h2>
                    </div>
                    <div class="card-body">
					<form action="index.php?p=doUpload" method="post" enctype="multipart/form-data">
    					<?php
    						echo "<input type='hidden' name='t' value='".$key['id']."'>";
    			 		?>
                        <div class="col-sm-6 col-md-12 text-center">
                            <div class="col-sm-6">
                                <?php
                                    echo '<img class="imgholder" src="media/images/'.$key['media_link'].'" id="preview" width="375px" height="450px">';
                                ?>                
                            </div>
                        <!-- image input form -->
                        <div class="col-md-6  col-sm-6 ">
                            <div class="col-sm-2">
                                File :    
                            </div>
                            <div class="col-sm-2   ml-auto">
                            <input type="file" name="image" id="imageIn">
                        </div>
                        </div>
                        <!---->
                        <div class="col-md-6 col-sm-6">
                            <div class="col-sm-2">
                                Title :    
                            </div>
                            <div class="col-sm-2   ml-auto">
                                <?php echo '<input type="text" name="title" value="'.$key['title'].'">';?>    
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4  col-sm-6 ">
                            <div class="col-sm-4 col-md-4">
                                Category : 
                            </div>
                            <div class="col-sm-2   ml-auto">
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
                        </div>
                        </div>
                         </div>
                       <!--
                       <table>
                       
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
						</table> -->
					</form>

				</div>
			</div>
        </div>

         <script type="text/javascript">
                jQuery("#imageIn").change(function() {
                     readURL(this);
                });

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            jQuery('#preview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                        }
                }
        </script>
			<?php

	}
}}


//shows the Content Manager
function show_ContentMgt(){
	?>
    <div class="col-lg-3">
        <div class="card">
            <a href="index.php?p=upImage">
            <div class="card-body color-">
                <h1 class="text-center"><i class="fa fa-upload"></i></h1>
                <h3 class="text-center">Upload New Content</i></h3>
            </div>
        </a>
        </div>
    </div>
        
        <div class=" col-lg-3 col-md-4">
        <div class="card">
            <a href="index.php?p=mgAllImage">
            <div class="card-body color-">
                <h1 class="text-center"><i class="fa fa-upload"></i></h1>
                <h3 class="text-center">Show All Content</i></h3>
            </div>
        </a>
        </div>
    </div>

	<?php
}


//show All images  'mgAllImage' task
function show_searchInput(){
	?>

    <form  method="post" action="index.php">
    <div class="input-group">
        <div class="input-group-btn">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i> Search
            </button> 
        </div>
        <input id="input1-group2" name="searchInput" placeholder="Keyword Input English, Tagalog, and Bicol" class="form-control" type="text">
                              </div>
	<!--  Search Bar -->
		<input type="hidden" name="p" value="mgAllImage">
		<input type="hidden" name="t" value="dosearch">
	</form>
	<br>
	
	<?php
}
//do the searching for mgAllImage
function show_searchResult($data=null,$page=0){
        // set the value of page to 1 if the value is smaller
        // than 0 and set convert the string to integer if the
        // $page is a string
        intval($page )<= 0 ? $page = 1 : $page = intval($page);
        
        global $c;
        $result = $c->search($data,$page);
        ?>

        <div class="card-header">
            <strong class="card-title">Results</strong>
        </div>
        <div class="card-body">
        <table class="table">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">English</th>
                <th scope="col" >Defination</th>
                <th scope="col" >Tagalog</th>
                <th scope="col">Options</th>
            </tr>
        <?php
        if( $result == false){
            echo "<tr class='center'><td colspan='5'><h2>No Record Found</h2></td></tr>";
        
        }else{

            foreach ($result as $key) {
            ?>
            <tr class="center">
                <th scope="row"><?php echo $key['id']?></th>
                <td >
                    <img src=<?php echo "'media/images/".$key['media_link']."'" ?>  class="zoom" width="75px" height="100px">
                </td>
                <td><?php echo $key['english']?></td>
                <td><?php echo $key['tagalog']?></td>
                <td><?php echo $key['defination']?></td>
                
                <td>
                    <button class="btn btn-sm btn-primary"  onclick="toggleModal(<?php echo $key['id'] ?>)">View</button>
                    <?php 
                    if (is_logged() == 1){
                        echo "<a href=\"index.php?p=upImage&id=".$key['id']."&task=edit\">Edit </a>";
                     echo "<a href=\"index.php?p=mgAllImage&task=del&id=".$key['id']."&file=".$key['media_link']."\">Delete</a>";
                     }
                        ?>
                </td>
            </tr>
            <tr class="pb-0">
                <td colspan="7">
                    <?php show_viewDetails($key['id'])?>
                </td>
            </tr>
            <?php
            } // close tag for foreach loop
        } //close tag for else statement
            ?>
        </table>
        <?php

            //generate a pagination
            $result = $c->execute("SELECT COUNT(id) FROM content");  
            $row =mysqli_fetch_row($result);
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $c->limits);  
            $pagLink = "<nav ='nav-page'>Page:<ul class='pagination'>";  
            for ($i=1; $i<=$total_pages; $i++) {  
                         $pagLink .= "<li><a href='index.php?p=mgAllImage&page=".$i."'>".$i."</a></li>";  
            };  
            echo $pagLink . "</ul></nav>"; 
            //echo "<a href='index.php?p=mgAllImage&page=2'>2</>";

        ?>

        <!-- Script for toggling the modal_new -->
        <script type="text/javascript" > function toggleModal(id){
             var modalStat = jQuery('#'+id).css('display');
             
             if (modalStat == 'block'){
                jQuery('#'+ id).css('display','none');
             }else{
                jQuery('#'+ id).css('display','block');
             }
            }
        </script></div><?php         
}

function show_viewDetails($id){
	
	//fetch data from the database according to $id
	global $c;
	$result = $c->select('content','id',$id);

	//create the view for the user
	?>
    

    <?php echo'<div class="modal_new animated fadeIn" id="'.$result[0]['id'].'">';  ?>
	
		<div class="modalContent">
			<div class="header">
				Details of <?php echo $result[0]['title'];?>
			</div>
			<table class="table">
				<tr>
					<td rowspan="5" >
						<?php
							echo '<img src="media/images/'.$result[0]['media_link'].'" width="375px" height="450px" class="zoom2">';
						?>
					</td>
					<td>English : </td>
					<td><?php echo $result[0]['english'];?></td>
				</tr>
				<tr>
					<td > Tagalog : </td>
					<td > <?php echo $result[0]['tagalog'];?> </td>
				</tr>
				<tr>
					<td > Bicol : </td>
					<td > <?php echo $result[0]['bicol'];?> </td>
				</tr>
				<tr>
					<td > Note : </td>
					<td > <?php echo $result[0]['note'];?> </td>
				</tr>
				
			</table>
			<div class="footer">
				<button class="btn btn-success"onclick="toggleModal(<?php echo $result[0]['id'] ?>)"> Close</button>

 
			</div>
		</div>
	</div>
	<?php
}


function show_msgModal($msg){
	?>
		<div class="modal_new">
			<div class="modalContent center">
				<?php echo '<h3>'.$msg.'</h3>';?>
				<div class="footer">
					<button onclick="toggleModal('modal2')"> Close</button>
					
				</div>
			</div>	
		</div>
        <script type="text/javascript"> function toggleModal(modal){
     var modalStat = jQuery('.'+modal).css('display');
     
     if (modalStat == 'block'){
        jQuery('.'+modal).css('display','none');
     }else{
        jQuery('.'+ modal).css('display','block');
     }
}</script>



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
				return 'complete';
			}else{
				return 'error';

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
			return 'complete';
		}else{
			return "error";
		}
	} 
}


function doLogin($username,$password){
	global $c;
	$check = $c->verifyUser($username,$password);
	
	if ($check == true){
		//echo "welcome";
		//header("location:index.php");
		redirect('index.php?p=profile');
	}else{

		show_login('error');
	}
}

//do Registration
function doReg(){
	global $c;
	$result = $c->register($_POST);	
}

function do_cert(){
	echo "<embed src=\"certificate.php\" width=\"100%\" height=\"800px\">";
}

function is_logged(){
	global $c;
	return $c->is_logged();
}

function do_logout(){
   session_unset();
   session_destroy();
}



#################################################
###### FUNCTION for the Study Program	#########
#################################################
	// first get the users progress in database
	// 2nd decide what to show by randomly picking 20 items from the database and showing it to the user one by one

	//data field in user_study_guide table
#### id , userid , studyResource, date, level, stat
	


// this function show the study materials based on the database.
function show_study($current){
	global $c;

	echo '<p>Hello '.$_SESSION['name'].'</p>';

	// check if the user already had a record in the database
    // if the user  has no record it will generate the study material.
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
        foreach ($array as $key) {
            $result = $c->select('content','id',$key);
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                <div class="card-header">
                    <stong class="card-title"><?php echo $result[0]['title']?></stong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                    <?php echo '<img class="mx-auto d-block zoom2" src="media/images/'.$result[0]['media_link'].'" width="100px" height="125px"></div>';   
                          echo "<div class='text-sm-center'><a href='#' onclick=\"toggleModalId('modal_".$key."')\">View</a></div>";
                    ?>
                 </div> 
                </div>
            </div>
     
                <?php
                }
  

		//generate the modal.. by running another foreach loop to the array
		// we cannot include this one to the foreach load from the top because t
		// this includes  different html tags does making the modal in appropriate to view
		foreach ($array as $key) {
			# code...
			generate_modal($key);
		}
        ?>
        <script type="text/javascript">
            function toggleModalId(modal){
                 var modalStat = jQuery('#'+modal).css('display');
                 
                 if (modalStat == 'block'){
                    jQuery('#'+modal).css('display','none');
                 }else{
                    jQuery('#'+ modal).css('display','block');
                 }
            }
        </script>

        <?php
		
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
	echo '<div class="modal_new_2 animated fadeIn" id="modal_'.$id.'">';
    ?>
   
		<div class="modalContent "> 
            <?php
                echo "<a  href=\"#\"onclick=\"toggleModalId('modal_".$id."')\"><div class=\"close\">
                x </div></a>";
                
                ?>
           
			<table class="table" >
				<tr>
					<td rowspan="4" class="center">
						<?php
							echo '<img src="media/images/'.$result[0]['media_link'].'" width="375px" height="450px" >';
						?>
					</td>
					<td  class="center">English : </td>
					<td  class="center"><?php echo $result[0]['english'];?></td>
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