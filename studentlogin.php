<?php session_start(); ?>

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
    <title>my project</title>
  </head>
  <body>
    <div class="container"><br>
          <h1 class="text-center"><span background color="blue"><b> ATTENDENCE AUTOMATION SYSTEM</b></span></h1><hr><br>
          <div class="d-flex justify-content-center">
          	<?php if(isset($usernameerr)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $usernameerr; ?></div><?php };?>
          		<?php if(isset($worngpass)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $worngpass; ?></div><?php };?>
          		<?php if(isset($status_inactive)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $status_inactive; ?></div><?php };?>
         
		 </div>
          <div class="row animate__animated animate__pulse">
            <div class="col-md-4 offset-md-4">
             	<form method="POST" action="studetail.php">
				  <div class="form-group row">
				    <div class="col-sm-12">
				      <input type="text" class="form-control" placeholder="6 Digit Roll number/number only" name="roll"  required="" onkeyup="numb(this)" pattern="[0-9]{6}" maxLength="6">
				    </div>
				  </div>
				 <p align="center">
				      <button type="submit" name="btnlogin" class="btn btn-warning">VIEW</button></p>
					
				   </form> 				 
				
			
				<p align="center">New Student? &emsp;<a href="stureg.php"> Register here</a></p>
				    
				  </div> 
				  </div>
          </div>
    </div>
<div class="">
 <p align="center"> <button class="btn btn-success" ><a href="../index.php"><span style="color:yellow;">Back</span></a></button></p>

   </div>

   


                                   
 </center>
</body>
</html>
<script>
function numb(input){
	var num= /[^0-9]/gi;
	input.value=input.value.replace(num,"");
	
}
</script>
