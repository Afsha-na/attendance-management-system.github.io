<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='admin_index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: admin_index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
    $oldPhoto = base64_decode($_GET['photo']);

  if (isset($_POST['updatestudent'])) {
  	$name = $_POST['name'];
  	$roll = $_POST['roll'];
  	$address = $_POST['address'];
  	$pcontact = $_POST['pcontact'];
  	$class = $_POST['class'];
  	
  	if (!empty($_FILES['photo']['name'])) {
  		 $photo = $_FILES['photo']['name'];
	  	 $photo = explode('.', $photo);
		 $photo = end($photo); 
		 $photo = $roll.date('Y-m-d-m-s').'.'.$photo;
  	}else{
  		$photo = $oldPhoto;
  	}
  	

  	$query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$address',`pcontact`='$pcontact',`photo`='$photo' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
		if (!empty($_FILES['photo']['name'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], '../teacher/images/'.$photo);
			unlink('../teacher/images/'.$oldPhoto);
		}	
  		header('Location: admin_index.php?page=../teacher/all-student&edit=success');
		echo "<script>window.location.href = 'admin_index.php?page=../teacher/all-student&edit=success';</script>";
  	}else{
  		header('Location: admin_index.php?page=../teacher/all-student&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Student Informations!<small class="text-warning"> Edit Student!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="admin_index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="admin_index.php?page=../teacher/all-student">All Student </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Student</li>
  </ol>
</nav>
	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`, `date` FROM `student_info` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Student Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Student Roll</label>
		    <input name="roll" type="text" onkeyup="numb(this)" pattern="[0-9]{6}" maxLength="6" class="form-control" placeholder="6 digit Roll no."  id="roll" value="<?php echo $row['roll']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Student Address</label>
		    <input name="address" type="text" class="form-control" id="address" value="<?php echo $row['city']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Contact NO</label>
		    <input name="pcontact" type="text" onkeyup="numb(this)" pattern="[0-9]{10}" maxLength="10" class="form-control" placeholder="10 digit ph no." id="pcontact" value="<?php echo $row['pcontact']; ?>" pattern="[0-9]{10}" placeholder="" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="class">Student Class</label>
		    <select name="class" class="form-control" id="class" required="" value="">
		    	<option>Select</option>
		    	<option value="1st Semester" <?= $row['class']=='1st Semester'? 'selected':'' ?>>1st Semester</option>
		    	<option value="2nd Semester" <?= $row['class']=='2nd Semester'? 'selected':'' ?>>2nd Semester</option>
		    	<option value="3rd Semester" <?= $row['class']=='3rd Semester'? 'selected':'' ?>>3rd Semester</option>
		    	<option value="4th Semester" <?= $row['class']=='4th Semester'? 'selected':'' ?>>4th Semester</option>
		    	<option value="5th Semester" <?= $row['class']=='5th Semester'? 'selected':'' ?>>5th Semester</option>
				<option value="6th Semester" <?= $row['class']=='6th Semester'? 'selected':'' ?>>6th Semester</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Student Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Add Student" type="submit" class="btn btn-danger">
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