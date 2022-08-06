<?php 
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
 
  <h1 class="text-primary"><i class="fas fa-users"></i>  Mark attendance<small class="text-warning"> Class attendance</small></h1>
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
     <li class="breadcrumb-item active" aria-current="page">Mark attendance</li>
  </ol>
</nav>
  <body>
    <div class="container"><br>
          <h1 class="text-center">Welcome to Student Attendance Management</h1><br>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form method="GET" action="show.php">
            <table class="table  table-striped table-hover table-bordered" style="width:200%" >
              <tr>
                <th colspan="2">
                  <p class="text-center">Select semester</p>
                </th>
              </tr>
              <tr>
                <td>
                   <p>Choose Semester</p>
                </td>
                <td>
                   <select class="form-control" name="Semester"  onchange="fundata(this.value)" id=catg required="">
                     <option  disabled selected>
                       Select
                     </option>
                     <option value="1st Semester">
                       1st Semester
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
                  <p><label for="subject">Subject</label></p>
                </td>
                <td>
             <!--     <input class="form-control" type="text" id="subject" placeholder="Subject" name="subject"> -->
			  <select  class="form-control" placeholder=""  id="subject" value="subject" name="subject" required="">
                                         
                                                             <option  disabled>please select  semester first</option>                                           
                                                    </select>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="show">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
      
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
  function confirmation(anchor)
{
   var conf = confirm('Are you sure?');
   if(conf)
      window.location=anchor.attr("href");
}
 </script>
<script type="text/javascript"> 
$("#catg").change(function(){
  var x=$("#catg").val();
  req = new XMLHttpRequest();
req.open("GET","getdata.php?selectvalue="+x,false);
req.send(null);
$("#subject").html(req.responseText)
}
);

</script>

  </body>
</html>
