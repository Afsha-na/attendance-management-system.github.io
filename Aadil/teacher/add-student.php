<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
      // header('Location: index.php?page='.$corepage[0]);
     }
    }

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
		if ($corepage=='index.php') {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Inserted!</p>';
  		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
		}
		else{
			$datainsert['insertsucess'] = '<p style="color: green;">Student Inserted!</p>';
			move_uploaded_file($_FILES['photo']['tmp_name'], '../teacher/images/'.$photo);
		  }	
		
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Student Not Inserted, please input valid data</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Student<small class="text-warning"> Add New Student!</small></h1>
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
	 
     <li class="breadcrumb-item active" aria-current="page">Add Student</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
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
		<div class="form-group">
		    <label for="name">Student Name</label>
		    <input name="name" type="text" onkeyup="alp(this)" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Student Roll No</label>
		    <input name="roll" type="text" onkeyup="numb(this)" maxLength="6" pattern="[0-9]{6}" value="<?= isset($roll)? $roll: '' ; ?>" placeholder="6 digit Roll no." class="form-control"  id="roll" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Student Address</label>
		    <input name="address" type="text" value="<?= isset($address)? $address: '' ; ?>" class="form-control" id="address" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Contact NO</label>
		    <input name="pcontact" type="text" onkeyup="numb(this)" pattern="[0-9]{10}" class="form-control" id="pcontact" placeholder="10 digit ph no." maxLength="10" value="<?= isset($pcontact)? $pcontact: '' ; ?>" placeholder="" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="class">Student Class</label>
		    <select name="class" class="form-control" id="class" required="">
		    	<option>Select</option>
		    	<option value="1st Semester">1st Semester</option>
		    	<option value="2nd Semester">2nd Semester</option>
		    	<option value="3rd Semester">3rd Semester</option>
		    	<option value="4th Semester">4th Semester</option>
		    	<option value="5th Semester">5th Semester</option>
				<option value="6th Semester">6th Semester</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Student Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo" required="">
	  	</div>
	  	<div class="form-group text-center">
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