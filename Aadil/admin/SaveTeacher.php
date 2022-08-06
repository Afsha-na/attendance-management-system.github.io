<?php include('myhead.php') ?>

<?php
$name=$_POST['tname'];
//$lastname=$_POST['tlname'];
$email=$_POST['temail'];
$password=$_POST['tpassword'];
$gender=$_POST['tgender'];
$dob=$_POST['tdob'];
$contact=$_POST['tcontact'];
$address=$_POST['taddress'];
$photo = explode('.', $_FILES['photo']['name']);
		$photo= end($photo);
		$photo_name= $name.'.'.$photo;
if (empty($photo)) {
    $input_error['photo'] = "The Photo Filed is Required";
}
if(!empty($name) || !empty($email) ||!empty($password) || !empty($gender) || !empty($dob) || !empty($contact) || !empty($address)) {
//echo "All fields are filled successfully";

$SELECT="SELECT temail from add_teacher where temail = ? Limit 1";
$INSERT="INSERT Into add_teacher (tname, temail, tpassword, tgender, tdob,
 tcontact, taddress, photo) values(?, ?, ?, ?, ?, ?, ?, ?)";
 
 //echo "Good";

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
$stmt->bind_param("ssssiiss",$name,$email, $password, $gender, $dob, $contact, $address, $photo);
if ($rnum) {
    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
}
$stmt->execute();

//echo "New record insert successfully";

}
else {
    
    echo "Someone already registered with this email";
    header('location:AddTeacher.php');  
}
header('location:viewTeacher.php');
//echo "do it";
$stmt->close();
$con->close();
}

else {

    //echo "All fields are required";
    header('location:AddTeacher.php');
}
//echo "thanku";
?>