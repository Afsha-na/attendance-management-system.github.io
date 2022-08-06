<?php
include('myhead.php');
if(isset($_POST['btn_login'])){
if(isset($_POST['email'])==aemail)
$email=$_POST['email'];
if(isset($_POST['password']))
$password=$_POST['password'];
}
 if($email==$_SESSION["aemail"] and $password==$_SESSION["apassword"]){
    $q="INSERT INTO loginadmin (Admin,password) values ('$adminlogin','$adminpassword')";
    echo $q;
    echo "hello";
    $i=mysqli_query($con,$q);
    if(false===$i){
        printf("error:%s\n",mysqli_error($con));
    }
        else {
            echo "done";
        }
    
    echo $i;
    echo " hi";
    
    //mysqli_close($con);
    echo " Welcome, you successfully loged
        in new";
    }
    ?>
    
 }


?>
