
 <?php session_start(); ?>
 <?php include('myhead.php');
 ?>
 

<br>

<?php
//  //storing username and password of registered admin in the session variable
// //$_SESSION['aemail']=$email;
// //$_SESSION['apassword']=$password;
    

// }
// echo "do it";
// $stmt->close();
// $con->close();
// }
// else {

//     echo "All fields are required";
//     die();
    
// }
// echo "thanku";
?> 















<style>
    strong{
        text:red;
    
    }
</style>


<center>
<div  >
 <?php 

 if(isset($_SESSION['user'])){
 if($_SESSION['user']){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color:#f57c7c; width:40%; height: 30px">
<strong>Oh noo sorry </strong> User already exist
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
 }}

 ?>
 
</div> 
<div class="login-content card">
    <div class="green"> ~Add Admin~ </div>

<form class="form-horizontal" method="POST" action="
SaveAdmin.php" name="adminform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"> Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="aname" class="form-control" placeholder=" Name" id="event" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Last Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  name="alname" id="event" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="Last Name" required="">
                                                </div>
                                            </div>
                                        </div> -->


                                       


                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Department Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  name="departmentname" id="cname" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="Department Name" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">

                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="aemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input password="text" name="apassword" class="form-control" placeholder="Password" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-9">
                                                   <select name="agender" id="gender" class="form-control" required="">
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
                                                  <input type="date" name="adob" class="form-control" placeholder="Birth Date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Contact</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="acontact" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="aaddress" placeholder="Address" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
				  	<div class="col-sm-3"><label for="photo">Choose your photo</label></div>
				  	<div class="col-sm-9">
				      <input type="file" id="photo" name="photo" class="form-control" >
				      <br>
				    </div>
				  </div>

                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
</div>
                
</center> 
 <?php
// $user='';
//  if(isset($_SESSION['user'])){
//  if($_SESSION['user']==1){
// echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" green>
// <strong>Oh noo sorry </strong> User already exist
// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//   <span aria-hidden="true">&times;</span>
// </button>
// </div>';
//  }}
//  else{
//      echo "No user";
//  }
 ?>
<!-- <?php


$firstname=$_POST['afname'];
$lastname=$_POST['alname'];
$departmentname=$_POST['departmentname'];

$email=$_POST['aemail'];
$password=$_POST['apassword'];
$gender=$_POST['agender'];
$dob=$_POST['adob'];
$contact=$_POST['acontact'];
$address=$_POST['aaddress'];
$photo = explode('.', $_FILES['photo']['name']);
		$photo= end($photo);
		$photo_name= $name.'.'.$photo;


if(!empty($firstname) || !empty($lastname) || !empty($departmentname) ||  !empty($email) || !empty($password) || !empty($gender) || !empty($dob) || !empty($contact) || !empty($address) || !empty($photo)) {
    
echo "All fields are filled successfully";
//password encription
//$password=md5($password);
$SELECT="SELECT aemail from add_admin where aemail = ? Limit 1";
$INSERT="INSERT Into add_admin (afname, alname, departmentname, aemail,apassword, agender, adob, acontact, aaddress,photo) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
if ($INSERT) {
    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
}
 echo "Good";
 //storing username and password of registered admin in the session variable
//$_SESSION['aemail']=$email;
//$_SESSION['apassword']=$password;
//echo $_SESSION['apassword'];
//welcome message
$_SESSION['success']="you have successfully registered";
//prepare statement
$stmt=$con->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num_rows;
if($rnum==0) {
    $stmt->close();
    $stmt=$con->prepare($INSERT);
$stmt->bind_param("ssssssiiss",$firstname, $lastname, $departmentname, $email,$password, $gender, $dob, $contact, $address,$photo);
$stmt->execute();
//echo "New record insert successfully";
$success=1;

//page on which user will be redirected after registration
header('location: mylogin.php');
}
else {
    //echo "user already exist";
    $user=1;
    $_SESSION['sorry']="something went wrong";
}
echo "do it";
$stmt->close();
$con->close();
}
else {

    echo "All fields are required";
    die();
    
}
echo "thanku";
?> -->
