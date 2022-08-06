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
  <h1 class="text-primary"><i class="fas fa-users"></i>Attendance Report<small class="text-warning"> </small></h1>
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
     <li class="breadcrumb-item active" aria-current="page">Attandance Report</li>
  </ol>
</nav>
  <body>
    <div class="container"><br>
          <h3 class="text-center">Welcome to Student Attendance Management</h3><br>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form method="POST">
            <table class="text-center infotable" style="width:200%">
              <tr>
                <th colspan="2">
                  <p class="text-center">Get Report</p>
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
                 <select  name="roll" class="form-control"   id="roll"  required="">
                                                
                                                  <option value="0" disabled >please select semester first</option>    
                                                    </select>
                </td>
              </tr>
			   <tr>
                <td>
                  <p><label for="roll">Subject</label></p>
                </td>
                <td>
               <!--   <input class="form-control" type="text"  id="subject"  name="subject">  -->
			    <select type="text" name="subject" class="form-control" placeholder="Name"  id="subject"  required="">
                                                
                                                 
                                                           <option value="0" disabled selected>please select  semester first</option>    
                                                    </select>
                </td>
              </tr>
			   <tr>
                <td>
                  <p><label for="roll">From</label></p>
                </td>
                <td>
                  <input class="form-control" type="date"  placeholder="" name="startdate" required="">
                </td>
              </tr>
			   <tr>
                <td>
                  <p><label for="roll">To</label></p>
                </td>
                <td>
                  <input class="form-control" type="date"  placeholder="" name="enddate" required="">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="search" value="search">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['search'])) {
          $choose= $_POST['choose'];
          $roll = $_POST['roll'];
		  $subject = $_POST['subject'];
		  $startdate = $_POST['startdate'];
		  $enddate = $_POST['enddate'];
          if (!empty($choose && $roll)) {
            $query = mysqli_query($db_con,"SELECT * FROM `attendence` WHERE date BETWEEN '$startdate' AND '$enddate' AND `subject`='$subject'  AND `roll`='$roll' AND `class`='$choose' ORDER BY date");
				$per=mysqli_query($db_con,"SELECT * FROM `attendence` WHERE date BETWEEN '$startdate' AND '$enddate' AND `subject`='$subject' AND `status`='present' and `roll`='$roll';");
				$ttl=mysqli_query($db_con,"SELECT * FROM `attendence` WHERE date BETWEEN '$startdate' AND '$enddate' AND `subject`='$subject' AND  `roll`='$roll';");
			   $count=mysqli_num_rows($per);
			    $totalcount=mysqli_num_rows($ttl);
				if($totalcount!=0){
					
			   $monper=(($count/$totalcount)*100);
			   
			  ?>
			
        <div class="row">
          <div class="col-sm-6 offset-sm-3">
		 <div class="text-center" id="user">
            <table class="table  table-striped table-hover table-bordered" id="data">	 
            <thead class="thead-dark">
  <tr><td colspan="1"><h6 class="breadcrumb-item" aria-current="page" align="right"> Subject :<?php echo $subject; ?></h6></td>
  <td colspan=""><h6 class="breadcrumb-item" aria-current="page"> Name:<?php $show=mysqli_query($db_con,"SELECT name FROM `student_info` WHERE `roll`='$roll';"); $value=mysqli_fetch_array($show); echo ucwords($value ['name']); ?>
 </h6></td>
 <td>TPD:<?php  echo "$count/$totalcount Days"; ?></td>
 <td>%age=<?php  echo $monper; ?></td></tr> 
   <tr>
<!--	<th scope="col">SL</th>
      <th scope="col">id</th> -->
      <th scope="col">Roll no</th>
      <th scope="col">Semester</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <?php 
  $i=1;
       while ($result = mysqli_fetch_array($query)) { ?>
  <tbody>
  <tr>
      <?php  echo //'<td>'.$i.'</td>
          //<td>'.$result['id'].'</td>
          '<td>'.$result['roll'].'</td>
          <td>'.$result['class'].'</td>
          <td>'.$result['date'].'</td>
		  <td>'.$result['status'].'</td>';?>
			
			 </tr> 
			 
			  <?php $i++;
	
			   }
			  ?>
   		

  </tbody>
   
</table>
  
          </div><button class="btn btn-primary" onclick="printpagearea('user')">print</button>
          </div>
        </div>  
		
      <?php 
	   }else{
              echo '<p style="color:red;" align="center">Attendance not marked between these dates</p>';
                 }
		 
            }else{
              echo '<p style="color:red;">fillup fields</p>';
                 }
			
			}?>
              
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function printpagearea(){
		var printcontent= document.getElementById("user");
		var winprint=window.open();
		winprint.document.write(printcontent.innerHTML);
		winprint.document.close();
		winprint.focus();
		winprint.print();
		winprint.close();
	}
	</script>
	<script type="text/javascript"> 
$("#choose").change(function(){
  var x=$("#choose").val();
  req = new XMLHttpRequest();
req.open("GET","getdata.php?selectvalue="+x,false);
req.send(null);
$("#subject").html(req.responseText)
}
);


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