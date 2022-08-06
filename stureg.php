
<?php    require_once 'db_con.php';





if (isset($_POST['addstudent'])) {
  	$name = $_POST['name'];
  	$roll = $_POST['roll'];
  	$address = $_POST['address'];
  	$pcontact = $_POST['pcontact'];
  	$class = $_POST['class'];
  	
  	$photo = explode('.', $_FILES['photo']['name']);
  	$photo = end($photo); 
  	$photo = $roll.date('Y-m-d').'.'.$photo;

  	$query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name', '$roll', '$class', '$address', '$pcontact','$photo');";
  	if (mysqli_query($db_con,$query)) {
 
  		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
		echo '<script> alert("Registration succesful");location.href="studentlogin.php"</script>';
  	}else{
  		echo '<script> alert("Registration unsuccesful")</script>';
  	}
  }
?> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>MCA project!</title>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> &nbsp&nbsp&nbsp Add Student<small class="text-warning"> ENTER DETAILS</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    
     <li class="breadcrumb-item active" aria-current="page"> &nbsp&nbsp&nbsp Add details</li>&nbsp&nbsp&nbsp
	  <p align="center"> <button class="btn btn-success" ><a href="studentlogin.php"><span style="color:white;">Back</span></a></button></p>
  </ol>
</nav>

<div class="row" >
	
<div class="col-md-6 offset-md-4" align="center">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Student Insert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="col-sm-12" align="center" >
		    <label for="name" >Student Name</label>
		  <input  name="name" type="text" onkeyup="alp(this)" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>" required="">
	  	</div>
	  	<div class="col-sm-12" align="center">
		    <label for="roll">Student Roll</label>
		    <input name="roll" type="text" value="<?= isset($roll)? $roll: '' ; ?>" class="form-control" onkeyup="numb(this)" pattern="[0-9]{6}" maxLength="6" id="roll" required="">
	  	</div>
	  	<div class="col-sm-12" align="center">
		    <label for="address">Student Address</label>
		    <input name="address" type="text" value="<?= isset($address)? $address: '' ; ?>" class="form-control" id="address" required="">
	  	</div>
	  	<div class="col-sm-12" align="center">
		    <label for="pcontact">Contact NO</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact" onkeyup="numb(this)" pattern="[0-9]{10}" maxLength="10" value="<?= isset($pcontact)? $pcontact: '' ; ?>" placeholder="" required="">
	  	</div>
	  	<div class="col-sm-12" align="center">
		    <label for="class" align="center">Student Class</label>
		    <select name="class" class="form-control" id="class" required="">
		    	<option>Select</option>
		    	<option value="1st">1st Semester</option>
		    	<option value="2nd">2nd Semester</option>
		    	<option value="3rd">3rd Semester</option>
		    	<option value="4th">4th Semester</option>
		    	<option value="5th">5th Semester</option>
				<option value="6th">6th Semester</option>
		    </select>
	  	</div>
	  	<div class="col-sm-12"  align="center">
		    <label for="photo">Student Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo" required="">
	  	</div>
	  	<div class="col-sm-12" align="center">
		    <input name="addstudent" value="Add Student" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
	
</div>
</div>
<script>
function numb(input){
	var num= /[^0-9]/gi;
	input.value=input.value.replace(num,"");
	
}
</script>
<script>
function alp(input){
	var num= /[^a-z]/gi;
	input.value=input.value.replace(num,"");
	
}
</script>