<?php  include_once('../teacher/db_con.php');
session_start();
// if (!isset($_SESSION['user_login'])) {
  // header('Location: admin_index.php');

// }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Admin Dashboard</title>
  </head>
  <body>
    <?php
  $user=$_SESSION['aemail'];
  //echo $user;
  $haha1=mysqli_query($db_con,"SELECT * FROM `add_admin` WHERE `aemail`='$user';"); 
  while($showrow=mysqli_fetch_array($haha1))
  {
$showuser=$showrow['aname'];
  }
 $_SESSION['admin_login']= $showuser;
  ?>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin_index.php"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
    <?php //$showuser = $_SESSION['user_login'];
     $haha = mysqli_query($db_con,"SELECT * FROM `add_admin` WHERE `aname`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
    <ul class="nav navbar-nav ">
     <li class="nav-item"><a class="nav-link" href="admin_index.php?page=admin_profile"><i class="fa fa-user"></i> Welcome <?php echo $showrow['aname'];?></a></li> 
       <li class="nav-item"><a class="nav-link" href="admin_index.php?page=../teacher/add-student"><i class="fa fa-user-plus"></i> Add Student</a></li> 
      <li class="nav-item"><a class="nav-link" href="admin_index.php?page=admin_profile"><i class="fa fa-user"></i> Profile</a></li>
      <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
  </div>
</nav>
<br>
    <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="admin_index.php?page=Admin_dashboard" class="list-group-item list-group-item-action active">
               <i class="fas fa-tachometer-alt"></i> Dashboard
              </a>
              <a href="admin_index.php?page=../teacher/add-student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
              <a href="admin_index.php?page=../teacher/all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Students</a>
              <a href="admin_index.php?page=admin_all_users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> New students</a>
              <a href="admin_index.php?page=../teacher/search" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> search student</a>
			  <!-- <a href="admin_index.php?page=mark_attendance" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Mark Attendence</a> -->
 			  <a href="admin_index.php?page=../teacher/viewattendence" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> View Attendence</a>
 			  <a href="admin_index.php?page=../teacher/viewclassattendence" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> View Class Attendence</a>
  			  <a href="admin_index.php?page=../teacher/tdattendence" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Todays attendence</a>
  			  <a href="admin_index.php?page=../teacher/getreport" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Generate Report</a>
          <a href="admin_index.php?page=../teacher/class report" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> class Report</a>
              <a href="admin_index.php?page=admin_profile" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> User Profile</a>
            </div>
          </div>
		  
          <div class="col-md-9">
             <div class="content">
                 <?php 
                   if (isset($_GET['page'])) {
                    $page = $_GET['page'].'.php';
                    }else{
                      $page = 'Admin_dashboard.php';
                    }

                    if (file_exists($page)) {
                      require_once $page;
                     }
                    //else{
                    //   require_once '404.php';
                    // }
                  ?>
             </div>
        </div>
        </div>  
    </div>
    <div class="clearfix"></div>
    <footer>
      <div class="container">
      <p align="center">GDC BARAMULLA </p>
      </div>
    </footer>
    <script type="text/javascript">
      jQuery('.toast').toast('show');
    </script>
  </body>
</html>