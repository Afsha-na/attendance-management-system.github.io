 <?php    require_once 'db_con.php';
  if (isset($_POST['btnlogin'])) {
          $roll= $_POST['roll'];
          if (!empty($roll)) {
  $query=mysqli_query($db_con,"SELECT * FROM `student_info` WHERE `roll` ='$roll';");
  $count=mysqli_num_rows($query);
  if($count!=0){
  if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['roll']==$roll) {
                $stroll= $row['roll'];
                $stname= $row['name'];
                $stclass= $row['class'];
                $city= $row['city'];
                $photo= $row['photo'];
                $pcontact= $row['pcontact'];
				$status= $row['status'];
  ?>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>MCA project!</title>
  
		    <div class="row" align="center">
          <div class="col-sm-6 offset-sm-3">
            <table class="table table-bordered">
              <tr>
                <td rowspan="6"><h3>Student Info</h3><img class="img-thumbnail" src="images/<?= isset($photo)?$photo:'';?>" width="250px"></td>
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
  <td><?= isset($pcontact)?$pcontact:'';?></td></tr> 
               <tr>  <td>Status</td>
  <td><?= isset($status)?$status:'';?></td>
              </tr> 
			   <tr>  <td> <h3 align="center"> <a   href="viewstuatt.php?roll=<?php echo urlencode($stroll);?>&amp;clas=<?php echo urlencode($stclass);?>">View Attendance</a></></td>
			   <td colspan="2"><h3 align="center"><a class="btn btn-danger" href="studentlogin.php">Cancel</a></h3></td></tr>
            </table>
          </div>
        </div>  
		  <?php	}}
		  }else{echo '<p align="center" style="color:red;">ENTER CORRECT 6 DIGIT ROLL NO. ADD ZEROS BEFORE TO MAKE 6 DIGITS </p>';
		  echo "<h3 align='center'><button><a class='btn btn-danger' href='studentlogin.php'><span style='color:red;'>Back</span></a></button></h3>";}
		  
	 }}?>
	