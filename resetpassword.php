<?php require_once 'db_con.php'; 
session_start(); 

if(isset($_POST['Resetpassword']))
{
    $email=$_POST['email'];
mysqli_real_escape_string($db_con,$email);
$myemail="SELECT * FROM `users` WHERE email='$email' LIMIT 1";
$query=mysqli_query($db_con,$myemail);
if(mysqli_num_rows($query) > 0)
{
while($row = mysqli_fetch_array($query)){
$get_pass=$row['password'];
echo "<h1 align='center' style='color:red'>your password is =  $get_pass <h1>";
 echo "<h1 align='center'><button><a class='btn btn-danger' href='login.php'><span style='color:red;'>Login</span></a></button></h1>";
}
}
else
{?>
	<div>
	<p  ><h3 align="center" style="color:red">No email found</h3></p></div>
  <?php 
   echo "<h3 align='center'><button><a class='btn btn-danger' href='forgotpassword.php'><span style='color:red;'>Back</span></a></button></h3>";
  die(mysqli_error($db_con));
    $_SESSION['status']="No Email Found";
    header('location:Resetpassword');
    exit(0);
}
}
?>