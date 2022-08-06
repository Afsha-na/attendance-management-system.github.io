<?php include('myhead.php')?> 
<?php
// if(isset($_GET['id']))
// {
// $id=$_GET['id'];
// if(isset($_GET['1st_sem'])){
// $name=$_GET['Name'];
// $subject=$_GET['Subject'];
// echo $subject;
// echo $q1="UPDATE `1st_sem` SET 'Name'=$name,`Subject`='$subject' WHERE `id`=$id";
// //$q1="UPDATE `1st_sem` SET 'Name'=$name,`Subject`='$subject' WHERE `id`='".$_GET['id']."'";
// //$query1="update '1st_sem' set Name='".$name."',Subject='".$subject."'";
// echo $result1=mysqli_query($con,$q1);

// if($result1)
// {
//     header('location:1stsem.php');

// }
// }
// else{
//     die(mysqli_error($con));
//     echo "please check again";
// }
// }
// else
// {
    
//     //header('location:1stSem.php');
//     echo "could not update";
// } 


//<?php include('myhead.php') ?>
<?php
include('connect.php');
//$name='';
//$subject='';
$update=false;
if(isset($_POST['1st_sem'])){
if(isset($_POST['name']))
$name=$_POST['name'];
// if(isset($_POST['tlname']))
// $lastname=$_POST['tlname'];
if(isset($_POST['email']))
$email=$_POST['email'];
if(isset($_POST['password']))
$password=$_POST['password'];
if(isset($_POST['gender']))
$gender=$_POST['gender'];
// if(isset($_POST['tdob']))
// $dob=$_POST['tdob'];
// if(isset($_POST['tcontact']))
// $contact=$_POST['tcontact'];
// if(isset($_POST['taddress']))
// $address=$_POST['taddress'];
if(isset($_POST['id']))
$id=$_POST['id'];
}
else{
echo "good";
}
//echo $name;
//$id=$_POST['id'];
echo $id;
$query="UPDATE `users` SET name ='$name',email ='$email', password ='$password'  WHERE id=$id";
//$query="UPDATE 1st_sem SET Name='$name',Subject='$subject' WHERE id=$id";
echo "nice";
echo $run=mysqli_query($con,$query);
echo $run;
if($run)
{
  echo "form submitted";
  header('location:viewTeacher.php');
}
else
{
echo "cannot edit";
die(mysqli_error($con));
}

// if(isset($_POST['edit'])){
//     $id=$_GET['edit'];
//     $update=true;
//     $result=$mysqli->query("UPDATE * from 1st_sem where id=$id") or die($mysqli->error());
//     if(count($result)==1)
//     {
//         $row=$result->fetch_array();
//         extract($row);
//         $name=$row['Name'];
//         $subject=$row['Subject'];
//     }
// }
// ?>
