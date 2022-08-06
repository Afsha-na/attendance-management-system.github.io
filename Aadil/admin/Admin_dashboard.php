<?php 
  $corepage1 = explode('/', $_SERVER['PHP_SELF']);
    $corepage1 = end($corepage1);
    if ($corepage1!=='admin_index.php') {
      if ($corepage1==$corepage1) {
        $corepage1 = explode('.', $corepage1);
       header('Location: admin_index.php?page='.$corepage1[0]);
     }
    }
    include_once('../teacher/db_con.php');
    $user=$_SESSION['admin_login'];
?>
<style>
        ul{
             list-style-type: none;
             margin: 0;
             padding: 0;
             overflow: hidden;
             background-color: #333;
         }
         li{
             float: left;
         }
         li a{
             display: block;
             padding: 27px 55px;
             color: white;
             text-align: center;
             text-decor7ation: none;
     
             }
             li a:hover:not(.active){
                 background-color: white;
             }
             .active{
                 background-color: #4CAF50;
             }
             body{
                 background-color: #87FFBA;
             }
     </style>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

<h1><a href="admin_index.php"> <i class="fas fa-tachometer-alt"> </i> Dashboard </a> <small> Overview</small></h1>
<?php
include('Admin.php');
?>
<br><br><br>
<div class="row student">
  <div class="col-sm-4">
     <div class=" text-white bg-primary mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php  $stu=mysqli_query($db_con,'SELECT * FROM `student_info`'); $stu= mysqli_num_rows($stu); echo $stu; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total Students</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
		<div class="row">
          <div class="col-sm-8">
            <p class="">All Students</p>
          </div>
          <div class="col-sm-4">
            <a href="admin_index.php?page=../teacher/all-student"><i class="fa fa-arrow-right float-sm-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class=" text-white bg-info mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Today Attendence</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="admin_index.php?page=../teacher/tdattendence">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Today Attendence</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class=" text-white bg-success mb-3">
      <div class="card-header">
        <div class="row">
          <?php  $usernameshow = $_SESSION['admin_login']; $userspro = mysqli_query($db_con,"SELECT * FROM `add_admin` WHERE `aname`='$usernameshow';"); $userrow=mysqli_fetch_array($userspro);?>
          <div class="col-sm-8">
            <img class="showimg" src="images/<?php echo $userrow['photo']; ?>">
            <div style="font-size: 15px"><?php echo ucwords($userrow['aname']); ?></div>
          </div>
          <div class="col-sm-4">
            
            <div class="clearfix"></div>
            <div class="float-sm-right">Welcome!</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <a href="admin_index.php?page=admin_profile">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Your Profile</p>
          </div>
          <div class="col-sm-4">
            <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>  
</div>

<?php
//session_start();
//include('myhead.php');
//include('teacher.php');
//$name=$_GET['name'];
include('..\admin\connect.php');
//$name=$_SESSION['tname'];
?>
<br><br>
<style>
  td{
    text-align:center;
    width:10%;
    height:10%;
  }
  tr{
    height: 50px;
  }

</style>

<center>
  <br>
  <br>
  <!-- <b style="background:#f5cbe8; font-size:30px">Subjects assigned to <?php// echo $usernameshow?></b> <br><br> -->
  <?php
$query1="Select * FROM `add_admin`";
$q1=mysqli_query($con,$query1);
while($result=mysqli_fetch_assoc($q1)){
    ?>
    <?php $usernameshow= $result['aname'];?>
<!-- <b style="background:#f5cbe8; font-size:30px"> welcome <?php echo $result['afname']; ?> sir -->
<?php
}
?>
<?php
//$usernameshow=$_GET['edit'];
//$query2="select * from 1st_sem";
//  $query2="SELECT * FROM my_semester WHERE Name='$usernameshow'";
//  $result=mysqli_query($con,$query2);
//  if($result)
//  {
//     while($rows=mysqli_fetch_assoc($result)) {?>
         <!-- <td><?php echo $rows['Subject']; ?></td>
   <td><?php //echo $rows['Semester']; ?></td>
   <tr class="odd">
   
   
   <td><button style="padding:0";><a href="show.php?edit=<?php //echo $rows['Subject'];  ?> &edit2=<?php //echo $rows['Semester']; ?>"class="page-link" > Attendance</a></button></td>
   </tr>
   </thead>   <?php 
//     }
// //   else
// //  {
// //  echo mysqli_error($con);
// //  }
// ?>
  
//   <table style="width:60%" class="table  table-striped table-hover table-bordered" id="data">
//   <thead class="thead-dark">
//  <tr class="even">
//    <th>Name</th> -->
   <!-- <th>Subject</th>
//   <th>Semester</th>
//   <th>Mark Attendence</th> -->
   <!-- <th>Action???</th> -->
   </tr>
   <?php
//   ?>

  
   <?php
//   }
//   ?>
 </table>















































