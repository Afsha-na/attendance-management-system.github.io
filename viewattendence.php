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
  <h1 class="text-primary"><i class="fas fa-users"></i>  Search Attendance<small class="text-warning"> </small></h1>
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
                   <select class="form-control" name="choose" id="choose" >
                     <option value="" disabled selected>
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
           <!--       <input class="form-control" type="text" id="subject" placeholder="Subject" name="subject" required=""> -->
		   
		    <select type="text" name="subject" class="form-control" placeholder="Name"  id="subject"  required="">
                                                
                                                  <option value="0" disabled selected>please select semester first</option>    
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
						 $subject = $_POST['subject'];
          if (!empty($choose && $roll)) {
                   $query = mysqli_query($db_con,"SELECT * FROM `attendence` WHERE `roll`='$roll' AND `roll`='$roll' AND `subject`='$subject';");
				   
                              ?>
			
                                 <div class="row">
                                   <div class="col-sm-6 offset-sm-3">
                                     <table class="table  table-striped table-hover table-bordered" id="data">
                                       <thead class="thead-dark">
                                        <tr><td colspan="2"><h6 class="breadcrumb-item active" aria-current="page" align="right">Roll no:<?php echo $roll ?></h6></td>
                                             <td colspan="3"><h6 class="breadcrumb-item active" aria-current="page" align="right">Subject:<?php echo $subject ?></h6></td></tr>
										  <tr>
	                                       <!-- <th scope="col">SL</th> -->
                                          <!--   <th scope="col">id</th> -->
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
                 <?php  echo //'<td>'.$i.'</td>  <td>'.$result['id'].'</td>
				            ' <td>'.$result['roll'].'</td>    
                            
                             
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
	<script>
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