<?php
session_start(); 
include('myhead.php');

if(isset($_POST['Resetpassword']))
{
    $email=$_POST['email'];
mysqli_real_escape_string($con,$email);
$myemail="SELECT * FROM `add_admin` WHERE aemail='$email' LIMIT 1";
$query=mysqli_query($con,$myemail);
if(mysqli_num_rows($query) > 0)
{
while($row = mysqli_fetch_array($query)){
//echo $row;
$get_pass=$row['apassword'];
echo $get_pass;
}
// if($get_pass)
// {
// send_password_reset($get_pass,$email);
//     $_SESSION['status']="We emailed you a password reset link";
//     header('location:Resetpassword');
//     exit(0);
// }
// else
// {
//     die(mysqli_error($con));
//     $_SESSION['status']="Something went wrong";
//     header('location:Resetpassword');
//     exit(0);  
// }
}
else
{
    die(mysqli_error($con));
    $_SESSION['status']="No Email Found";
    header('location:Resetpassword');
    exit(0);
}
}
?>
