<?php session_start();?>
<?php include('myhead.php') ?>
<?php
$_SESSION['user']=0;
$_SESSION['success']=0;
$name=$_POST['aname'];
//$lastname=$_POST['alname'];
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
if(!empty($name) || !empty($departmentname) ||  !empty($email) || !empty($password) || !empty($gender) || !empty($dob) || !empty($contact) || !empty($address) || !empty($photo)) {
echo "All fields are filled successfully";
//password encription
//$password=md5($password);
$SELECT="SELECT aemail from add_admin where aemail = ? Limit 1";
$INSERT="INSERT Into add_admin (aname, departmentname, aemail,apassword, agender, adob, acontact, aaddress, photo) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
 echo "Good";
 //storing username and password of registered admin in the session variable
//$_SESSION['aemail']=$email;
//$_SESSION['apassword']=$password;
//echo $_SESSION['apassword'];
//welcome message
//$_SESSION['success']="you have successfully registered";
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
$stmt->bind_param("sssssiiss",$name, $departmentname, $email,$password, $gender, $dob, $contact, $address, $photo_name);

    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);

$stmt->execute();
echo "New record insert successfully";
$_SESSION['success']= 1;
//page on which user will be redirected after registration
header('location: mylogin.php');
}
else {
    echo "Someone already registered with this email";
    //$user=1;
    
     $_SESSION['user']= 1;
    // echo $_SESSION['user'];
    header('location:AddAdmin.php');
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
?>