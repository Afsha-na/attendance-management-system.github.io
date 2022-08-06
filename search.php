<?php require_once 'db_con.php'; 
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage!=='index.php') {
  if ($corepage==$corepage) {
    $corepage = explode('.', $corepage);
   //header('Location: index.php?page='.$corepage[0]);
 }
}
?>
<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>MCA project!</title>
  </head>
  <h1 class="text-primary"><i class="fas fa-users"></i>  Search Student<small class="text-warning"> </small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <?php
  if ($corepage=='index.php') {?>

     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
	 <?php
  }
	 else{?>
	 <li class="breadcrumb-item" aria-current="page"><a href="admin_index.php">Dashboard </a></li>
	 <?php
	 }
	 ?>
     <!-- <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li> -->
     <li class="breadcrumb-item active" aria-current="page">Search Student</li>
  </ol>
</nav>
  <body>
    <div class="container"><br>
          <h1 class="text-center">Welcome to Student Attendance Management</h1><br>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form method="POST">
            <table class="text-center infotable" style="width:200%">
              <tr>
                <th colspan="2">
                  <p class="text-center">Student Information</p>
                </th>
              </tr>
              <tr>
                <td>
                   <p>Choose Semester</p>
                </td>
                <td>
                   <select class="form-control" name="choose"  id="choose">
                     <option value="" disabled selected >
                       Select
                     </option>
                     <option value="1st Semester">
                       1St Semester
                     </option>
                     <option value="2nd Semester">
                       2nd Semester
                     </option>
                     <option value="3rd Semester">
                       3rd Semester
                     </option>
                     <option value="4th Semester">
                       4th Semester
                     </option>
                     <option value="5th Semester">
                       5th Semester
                     </option>
					 <option value="6th Semester">
                       6th Semester
                     </option>
                   </select>
                </td>
              </tr>

              <tr>
                <td>
                  <p><label for="roll">Roll No</label></p>
                </td>
                <td>
                  <select class="form-control"  id="roll" placeholder=" 6 digit" name="roll" required>
				   <option value="0" disabled >please select semester first</option> 
				  </select>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['showinfo'])) {
          $choose= $_POST['choose'];
          $roll = $_POST['roll'];
          if (!empty($choose && $roll)) {
            $query = mysqli_query($db_con,"SELECT * FROM `student_info` WHERE `roll`='$roll' AND `class`='$choose'");
            if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['roll']==$roll && $choose==$row['class']) {
                $stroll= $row['roll'];
                $stname= $row['name'];
                $stclass= $row['class'];
                $city= $row['city'];
                $photo= $row['photo'];
                $pcontact= $row['pcontact'];
              ?>
        <div class="row">
          <div class="col-sm-6 offset-sm-3">
            <table class="table table-bordered">
              <tr>
                <?php
              if ($corepage=='index.php') {
                ?>
                <td rowspan="5"><h3>Student Info</h3><img class="img-thumbnail" src="images/<?= isset($photo)?$photo:'';?>" width="250px"></td>
              <?php
              }
              else
              {
                
              ?>
              <td rowspan="5"><h3>Student Info</h3><img class="img-thumbnail" src="/Aadil/teacher/images/<?= isset($photo)?$photo:'';?>" width="250px"></td>
              <?php
              }
              ?>
                <td>Name</td>

                <td><?= isset($stname)?$stname:'';?></td>
              </tr>
              <tr>
                <td>Roll</td>
                <td><?= isset($stroll)?$stroll:'';?></td>
              </tr>
              <tr>
                <td>Class</td>
                <td><?= isset($stclass)?$stclass:'';?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?= isset($city)?$city:'';?></td>
              </tr>
              <tr>
                <td>Contact</td>
                <td><?= isset($pcontact)?$pcontact:'';?></td>
              </tr>
            </table>
          </div>
        </div>  
      <?php 
          }else{
                echo '<p style="color:red;">Please Input Valid Roll No & Class</p>';
              }
            }else{
              echo '<p style="color:red;">Your Input Doesn\'t Match!</p>';
            }
            }else{?>
              <script type="text/javascript">alert("Data Not Found!");</script>
            <?php }
          }; ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
	$("#choose").change(function(){
  var x=$("#choose").val();
  req = new XMLHttpRequest();
req.open("GET","getroll.php?selectvalue="+x,false);
 req.send(null);
$("#roll").html(req.responseText)
}
);

	</script>
  </body>
</html>