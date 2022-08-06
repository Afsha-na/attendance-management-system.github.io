<?php session_start(); 
$_SESSION['login']=1;
?>
<?php
include('myhead.php');
// if(isset($_POST['btn_login'])){
// if(isset($_POST['email'])==aemail)
// $email=$_POST['email'];
// if(isset($_POST['password']))
// $password=$_POST['password'];
// }
//  if($email==$_SESSION["aemail"] and $password==$_SESSION["apassword"])
// }
?>

    <style>
        .button {
  margin-bottom: 4px;
  padding: 8px 12px;
  border: 1px solid #75B9E1;
  border-radius: 3px;
  background: #4FA0D0;
  cursor: pointer;
  font-family: inherit;
  text-transform: uppercase;
  color: #fff;

}
h2{
    text-align: center;
    background-color: blue;
    }
    h3{
    text-align: center;
    background-color: rgb(145, 119, 168);
    }
        .img-container2 {
        text-align: center;
        
    }
    body
    {
       
        background-color:#6ccccc ;
        max-width=40%;
    }
    .popup__background {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 10000;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.4);
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
}
.popup__content {
  position: fixed;
  top: 50%;
  left: 50%;
  z-index: 10001;
  min-width: 400px;
  padding: 25px 50px;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 3px;
  text-align: center;
  -webkit-animation: hide-popup 0.3s forwards;
          animation: hide-popup 0.3s forwards;
  /**
   * Popup types.
   */
}
.popup__content__title {
  margin-bottom: 10px;
  font-size: 28px;
  font-weight: 100;
  color: #626262;
}
    </style>
</head>
<body>
    <!-- <img src="p4.png" alt="loading"width="100%" height= "150"><br> -->
    <br>
    <br>
    <center>
    <?php 
if(isset($_SESSION['success'])){
	if($_SESSION['success']){
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#f57c7c; width:40%; height: 30px">
	<strong>Success: </strong> You have successfully registered
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	 <span aria-hidden="true">&times;</span>
	</button>
	</div>';
	}}
if(isset($_SESSION['sorry'])){
if($_SESSION['sorry']){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color:#f57c7c; width:40%; height: 30px">
<strong>Ops: </strong> something went wrong
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>';
}}

?> 
    <span background color="blue"><b> ATTENDENCE AUTOMATION SYSTEM</b></span>
    <br>
    <br>
    
    <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <img src="1.png" style="width:20%;"><br>
                                <form action="mylogin.php" method="POST">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="aemail" class="form-control" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="apassword" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                                <input type="checkbox"> Remember Me
                                            </label> 
                                           <label class="pull-right">
                                                <a href="forgetpassword.php">Forgotten Password?</a>
                                           </label>   
                                    </div>
                                    <button type="submit"  name="btn_login" class="btn btn-primary btn-flat m-b-30 m-t-30" >Sign in</button>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> 
<b>------------------------or------------------------</b>
</div><div class="login-form ">
                                    <button type="submit"  name="btn_login" class="btn btn-primary btn-flat m-b-30 m-t-30" ><a href="AddAdmin.php">New User</a></button></div>
 </center>
</body>
</html>


<?php
if(isset($_POST['btn_login'])){
if(isset($_POST['aemail']))
$email=$_POST['aemail'];
if(isset($_POST['apassword']))
$password=$_POST['apassword'];
// echo $_SESSION['aemail']."\\\\\\   ".$_SESSION['apassword'];
// if(isset($_SESSION['aemail']))
// $email=$_POST['aemail'];
// if(isset($_SESSION['apassword']))
// $password=$_POST['apassword'];
}
//password matching
//$password=md5($password);
if(!empty($email) || !empty($password)){
    $SELECT="SELECT * from add_admin where aemail='$email' and apassword='$password'";
    $result=mysqli_query($con,$SELECT);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
           // echo "login successfully";
            $_SESSION['aemail']=$email;
            //header('location:Home.php');
            ?>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script>
        
        swal ( "success" ,  "congratulation!" ,  "success" )
    
         </script>

       
      <?php echo "<script>setTimeout(\"location.href = 'Admin_dashboard.php';\",1500);</script>";  
        ?>
        <?php
        }
        else
        {
            ?>
            <script>
              swal ( "Oops" ,  "Something went wrong!" ,  "error" )
            </script>
            
            <?php echo "<script>setTimeout(\"location.href = 'mylogin.php';\",1500);</script>";  
                ?>
             <?php
        }
    } 
}