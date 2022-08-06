<?php require_once 'db_con.php'; 
    $class=$_GET['clas'];
 $roll=$_GET['roll'];?>
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
  <h1 class="text-primary"><i class="fas fa-users"></i>  Search Attendance<small class="text-warning"> </small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page">Search Attendance</li>
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
                  <p class="text-center">Attendance search</p>
                </th>
              </tr>
              <tr>
                <td>
                   <p>Choose Semester</p>
                </td>
                <td>
                   <input class="form-control" type="text" id="class"  name="class" value="<?php echo $class ;?>" disabled="true">
                </td>
              </tr>

              <tr>
                <td>
                  <p><label for="roll">Roll No</label></p>
                </td>
                <td>
                  <input class="form-control" type="text" pattern="[0-9]{6}" id="roll"  name="roll" value="<?php echo $roll;?>" disabled="true">
                </td>
              </tr>
			   <tr>
                <td>
                  <p><label for="roll">Subject</label></p>
                </td>
                <td>
                 <!-- <input class="form-control" type="text" id="subject" placeholder="Subject" name="subject"> -->
				  <select type="text" name="subject" class="form-control" placeholder="Name"  id="event" onkeydown="return alphaOnly(event);" required="">
                                                
                                                 
                                                            <?php  
                                                            $sub = "SELECT Subject FROM `my_semester` WHERE `Semester`='$class'";
                                                            $rslt = $db_con->query($sub);

                                                           if ($rslt->num_rows > 0) {
                                                               while ($row = mysqli_fetch_array($rslt)) {?>
                                                                    <option value="<?php echo $row["Subject"];?>">
                                                                        <?php echo $row['Subject'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "no results";
                                                                }
                                                            ?>
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
                  <input class="btn btn-danger" type="submit" name="showinfo" value="GET REPORT">&emsp;&emsp;&emsp;&emsp; <a class="btn btn-danger" href="../index.php">Home</a></h3>
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
<?php if (isset($_POST['showinfo'])) {
                     //  $choose= $_POST['choose'];
						 $subject = $_POST['subject'];
						 $startdate = $_POST['startdate'];
		                 $enddate = $_POST['enddate'];
          if (!empty($class && $roll)) {
                   $query = mysqli_query($db_con,"SELECT * FROM `attendence` WHERE date BETWEEN '$startdate' AND '$enddate' AND `subject`='$subject'  AND `roll`='$roll' AND `class`='$class' ORDER BY date");
				$per=mysqli_query($db_con,"SELECT * FROM `attendence` WHERE date BETWEEN '$startdate' AND '$enddate' AND `subject`='$subject' AND `status`='present' and `roll`='$roll';");
				$ttl=mysqli_query($db_con,"SELECT * FROM `attendence` WHERE date BETWEEN '$startdate' AND '$enddate' AND `subject`='$subject' AND  `roll`='$roll';");
			   $count=mysqli_num_rows($per);
			    $totalcount=mysqli_num_rows($ttl);
				if($totalcount==0){echo '<p align="center" style="color:red;">NO DATA FOUND OR STATUS INACTIVE</p>';
				      $monper=0;}
			     else{     $monper=(($count/$totalcount)*100);}
					
                              ?>
			
                                 <div class="row">
                                   <div class="col-sm-6 offset-sm-3">
                                     <table class="table  table-striped table-hover table-bordered" id="data">
                                       <thead class="thead-dark">
                                        <tr><td colspan="1"><h6 class="breadcrumb-item active" aria-current="page" align="right">working days:<?php echo $totalcount ?></h6></td>
										    <td colspan="1"><h6 class="breadcrumb-item active" aria-current="page" align="right">present days:<?php echo $count ?></h6></td>
                                             <td colspan="1"><h6 class="breadcrumb-item active" aria-current="page" align="right">Subject:<?php echo $subject ?></h6></td>
											 <td colspan="1"><h6 class="breadcrumb-item active" aria-current="page" align="right">%age=<?php echo $monper ?></h6></td></tr>
										  <tr>
	                                      <!--  <th scope="col">SL</th>
                                             <th scope="col">id</th>-->
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
                             <td>'.ucwords($result['class']).'</td>
                             <td>'.$result['date'].'</td>
		                    <td>'.ucwords($result['status']).'</td>';?>
			
			          </tr> 
					 <?php  $i++;} 
                      				 
			                        ?>
    
                   </tbody>
                 </table>
           </div>
         </div>  
      <?php 
           if($count==0){ echo '<p align="center" style="color:red;">NO DATA FOUND</p>';}	
		   }else{
              echo '<p style="color:red;">Fillup fields</p>';
                 }
            }
				 ?>
              
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>