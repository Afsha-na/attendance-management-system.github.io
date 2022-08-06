
 
  <?php    require_once 'db_con.php';
        // if (isset($_POST['show'])) {
        //  $choose= $_POST['Semester'];
		 $choose = $_GET['Semester'];
	      $subject = $_GET['subject'];
		  //$subject= $_POST['subject'];
          if (!empty($choose && $subject)) {
           $query=mysqli_query($db_con,"SELECT * FROM `student_info` WHERE `class` ='$choose' AND `status`='active';");?>													          		   
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
		   <h1 class="text-primary"><i class="fas fa-users"></i>  Mark attendence<small class="text-warning"> Class attendence</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Mark attendence</li>
  </ol>
</nav>
  <body>
    <div class="container"><br>
          <h1 class="text-center">Welcome to Student Attendance Management</h1><br>
		   <table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
 <tr><td colspan="4"><h3 class="breadcrumb-item active" aria-current="page">Semester:<?php echo $choose ?></h3></td>
  <td colspan="3"><h3 class="breadcrumb-item active" aria-current="page">Subject:<?php echo $subject ?></h3></td></tr>
    <tr>
  <!--    <th scope="col">SL</th> -->
       <th scope="col">Roll no</th>
      <th scope="col">Name</th>
     
      <th scope="col">Semester</th>
	   <th scope="col">Subject</th>
      <th scope="col">Contact</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
    <?php  $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
  
		
            <tbody>
              <tr>
      <?php  echo //'<td>'.$i.'</td>
	      '<td>'.$result['roll'].'</td>
          <td>'.ucwords($result['name']).'</td>
         
          <td>'.ucwords($result['class']).'</td>
		  <td>'.$subject.'</td>
          <td>'.$result['pcontact'].'</td>
          <td><a class="btn btn-danger btn-action"  data-page="absent" data-id="'.base64_encode($result['id']).'" data-subject="'.base64_encode($subject).'">Absent</a>
             &nbsp;<a class="btn btn-success btn-action" data-page="present" data-id="'.base64_encode($result['id']).'" data-subject="'.base64_encode($subject).'">Present</a></td>';?>
			
			 </tr> 
			 <?php $i++;} ?>
    
  </tbody>
</table>
		
		<?php  }
		        else{echo "input valid fields";}
	//	} ?>         
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">

$('.btn-action').click(function(){
	const btn = $(this);
	$.get(btn.data('page') === 'absent' ? "Absent.php" : 'present.php', { page: btn.data('page'), id: btn.data('id'), subject: btn.data('subject') } ).done(function( data ) {
		data = JSON.parse(data);
		if(!data.status) {
			alert(data.error)
		}
		btn.parents('tr').remove();
  });
});

</script>
 </body>
</html>
