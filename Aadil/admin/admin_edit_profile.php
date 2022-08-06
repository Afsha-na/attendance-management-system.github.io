<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
      // header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
  if (isset($_POST['userupdate'])) {
  	$name = $_POST['name'];
  	$email = $_POST['email'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];


  	$query = "UPDATE `add_admin` SET `aname`='$name', `aemail`='$email',`acontact`='$contact',`aaddress`='$address' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">User Updated!</p>';
  		//header('Location: index.php?page=admin_profile&edit=success');
          ?>
          <script>
            window.location.href='admin_index.php?page=admin_profile&edit=success';
          </script>>
          <?php
  	}else{
        ?>
        <script>
  		window.location.href='admin_index.php?page=admin_profile&edit=error';
        </script>
        <?php
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit  Informations!<small class="text-warning"> Edit your info!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=user-profile">User Profile </a></li>
     <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {

			$query = "SELECT * FROM `add_admin` WHERE `id`=$id;";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Full Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['aname']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="email" class="form-control"  id="email" value="<?php echo $row['aemail']; ?>" required="">
	  	</div>
	  	
          <div class="form-group">
		    <label for="contact">Contact</label>
		    <input name="contact" type="" class="form-control" id="contact" value="<?php echo $row['acontact']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Address</label>
		    <input name="address" type="text" class="form-control"  id="address" value="<?php echo $row['aaddress']; ?>" required="">
	  	</div>

	  	<div class="form-group text-center">
		    <input name="userupdate" value="Update Profile" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>