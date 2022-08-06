<?php //session_start();?>
<?php include('myhead.php');?>
<?php
// include('Admin.php');
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage!=='admin_index.php') {
  if ($corepage==$corepage) {
    $corepage = explode('.', $corepage);
   header('Location: admin_index.php?page='.$corepage[0]);
 }
}



// require_once 'db_con.php'; 

	//session_start();
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		//$username = $_POST['username'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];

		$photo = explode('.', $_FILES['photo']['name']);
		$photo= end($photo);
		$photo_name= $name.'.'.$photo;

		$input_error = array();
		if (empty($name)) {
			$input_error['name'] = "The Name Field is Required";
		}
		if (empty($email)) {
			$input_error['email'] = "The Email Field is Required";
		}
		// if (empty($username)) {
		// 	$input_error['username'] = "The UserName Field is Required";
		// }
		if (empty($password)) {
			$input_error['password'] = "The Password Field is Required";
		}
		if (empty($photo)) {
			$input_error['photo'] = "The Photo Field is Required";
		}

		if (!empty($password)) {
			if ($c_password!==$password) {
				$input_error['notmatch']="You Typed Wrong Password!";
			}
		}

		if (count($input_error)==0) {
			$check_email= mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email';");

			 if (mysqli_num_rows($check_email)==0) {
			 	$check_username= mysqli_query($con,"SELECT * FROM `users` WHERE `name`='$name';");

				 if (mysqli_num_rows($check_username)==0) {
					// if (strlen($username)>10) {
						if (strlen($password)>7) {
								$password = ($password);
							$query = "INSERT INTO `users`(`name`, `email`, `password`, `photo`, `status`) VALUES ('$name', '$email', '$password','$photo_name','inactive');";
									$result = mysqli_query($con,$query) or die('error'.mysqli_error($con));
								if ($result) {
									move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
                  
									//header('Location: register.php?insert=sucess');
                  
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" >
                    <strong><span style="color:blue;">Success: </span></strong><span style="color:blue;"> You have successfully registered</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    
                  //$_SESSION['success']="you have successfully registered";
								}else{
									header('Location: register.php?insert=error');
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color:#f57c7c; width:40%; height: 30px">
<strong>Oh noo sorry </strong> Data Not Inserted
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
                  
								}
						}else{
							$passlan="This password more than 8 charset";
						}
					 // }
          //else{
					//  	$usernamelan= 'This username more than 10 charset';
					//  }
				 }
        else{
				  	$username_error="This username already exists!";
				  }
			}else{
				$email_error= "This email already exists";
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color:#f57c7c; width:70%; height: 40px">
<strong>Oh noo sorry:  </strong> Duplicate entry found,signup with different email
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
			}
			
		 }
		
	 }

?>




<br>
<center><div style="max-width:51%"; class="login-content card">
    <div class="green"> ~Add Teacher~ </div>

<br>
<form class="form-horizontal" method="POST" action="" name="teacherform" enctype="multipart/form-data">
<div style="background-color:#a18af9; width:45%; height:30px;font-weight:bold;"  >
<?php  
                                                            //$c1 = "SELECT  *  FROM `users` ORDER BY 'id' DESC LIMIT 1";
                                                            $c1="SELECT MAX(id) from `users`;";
                                                            $result = $con->query($c1);

                                                            if (isset($result->num_rows) && $result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                  echo 
                                                                    $t_id = $row['0']+1;
                                                                   //$t_id=mysqli_insert_id($con);
                                                                   // $E_id=$t_id+1;
                                                                    ?>
                                                                
                                                                      <!-- <option value="<?php  //echo $E_id;?>"><b> -->
                                                                        <?php//  echo " id : ".$E_id; 
                                                                        ?>
                                                                        </b>
                                                                     </option>
                                                                    <?php
                                                                }
                                                            } else {
                echo die(mysqli_error($con));                                            echo "0 results";
                                                                }
                                                            ?>
                                                            </div>
                                                            <br>
                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Name</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= isset($name)? $name:'' ?>" name="name" placeholder="Name" id="inputEmail3"><?= isset($input_error['name'])? '<label for="inputEmail3" class="error">'.$input_error['name'].'</label>':'';  ?>
                                                </div>
                                            </div>
                                        </div>

                                        

                                       


                                        



                                                        <div class="form-group">
                                            <div class="row">

                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">username</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="username" class="form-control" placeholder="Enter Username" id="event" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
				 <!-- 	<div class="col-sm-4">
				      <input type="text" name="username" value="<?= isset($username)? $username:'' ?>" class="form-control" id="inputPassword3" placeholder="Username"><?= isset($input_error['usrname'])? '<label class="error">'.$input_error['username'].'</label>':'';  ?><?= isset($username_error)? '<label class="error">'.$username_error.'</label>':'';  ?><?= isset($usernamelan)? '<label class="error">'.$usernamelan.'</label>':'';  ?>
				    </div> -->

                                         <div class="form-group">
                                            <div class="row">
                                                 <label class="col-sm-3 control-label">Password</label> 
                                                <!-- <div class="col-sm-9">
                                                    <input password="text" name="password" class="form-control" placeholder="Password" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div> -->
                                       
                                          <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-9">
                                                   <select name="tgender" id="gender" class="form-control" required="">
                                                    <option value="">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Date Of Birth</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="tdob" class="form-control" placeholder="Birth Date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Contact</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="tcontact" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="taddress" placeholder="Address" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
				  	<div class="col-sm-3"><label for="photo">Choose your photo</label></div>
				  	<div class="col-sm-9">
				      <input type="file" id="photo" name="photo" class="form-control" id="inputPassword3" >
				      <br>
				    </div>
				  </div>
                  
                  

                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                                                             -->
                  
                <!-- </div> -->
<!-- </div> -->
<div class="form-group row">
				 <!-- 	<div class="col-sm-4">
				      <input type="text" name="username" value="<?= isset($username)? $username:'' ?>" class="form-control" id="inputPassword3" placeholder="Username"><?= isset($input_error['usrname'])? '<label class="error">'.$input_error['username'].'</label>':'';  ?><?= isset($username_error)? '<label class="error">'.$username_error.'</label>':'';  ?><?= isset($usernamelan)? '<label class="error">'.$usernamelan.'</label>':'';  ?>
				    </div> -->
				    <div class="col-sm-4">
				      <input type="password" name="password" class="form-control" placeholder="Password"><?= isset($input_error['password'])? '<label class="error">'.$input_error['password'].'</label>':'';  ?> <?= isset($passlan)? '<label class="error">'.$passlan.'</label>':'';  ?>  
				    </div>
				    <div class="col-sm-4">
				      <input type="password" name="c_password" class="form-control" placeholder="Confirm Password"><?= isset($input_error['notmatch'])? '<label class="error">'.$input_error['notmatch'].'</label>':'';  ?> <?= isset($passlan)? '<label class="error">'.$passlan.'</label>':'';  ?>
				    </div>
				  </div>
				  <div class="row">
				  	<div class="col-sm-3"><label for="photo">Choose your photo</label></div>
				  	<div class="col-sm-9">
				      <input type="file" id="photo" name="photo" class="form-control" id="inputPassword3" >
				      <br>
				    </div>
				  </div>
				  <div class="text-center">
				      <button type="submit" name="register" class="btn btn-danger">Register!</button>
				    </div>
				  </div>
				</form>
            </div>
          </div>
            
                  </center>    
<!-- <?php include('footer.php');?>   --> 
<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$('.toast').toast('show')
    </script>   