<?php //require_once 'db_con.php'; ?>
<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='admin_index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       //header('Location: index.php?page='.$corepage[0]);
     }
    }
    // else{
    
    //   if ($corepage1!=='admin_index.php') {
    //     if ($corepage1==$corepage1) {
    //       $corepage1 = explode('.', $corepage1);
    //      //header('Location: admin_index.php?page='.$corepage1[0]);
    //    }
    //   }
    // }
	 ?>
<h1 class="text-primary"><i class="fas fa-users"></i>  New Students<small class="text-warning"> Requeting student List!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="admin_index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">View class</li>
  </ol>
</nav>
 <div class="container"><br>
          <h1 class="text-center">Welcome to Student Attendance Management</h1><br>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form  method="post" action="admin_index.php?page=admin_user_disable">
            <table class="table  table-striped table-hover table-bordered" style="width:200%" >
              <tr>
                <th colspan="2">
                  <p class="text-center">CLASS SEARCH</p>
                </th>
              </tr>
              <tr>
                <td>
                   <p>Choose Semester</p>
                </td>
                <td >
                   <select class="form-control" name="choose" >
                     <option value="">
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
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo" value="search">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
	<?php if (isset($_POST['showinfo'])) {
          $choose= $_POST['choose'];	
		$query= mysqli_query($db_con,"SELECT * FROM `student_info` WHERE `class`='$choose';"); ?>
		
		

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
  <tr><td colspan="6"><h3 class="breadcrumb-item active" aria-current="page">Semester:<?php echo $choose ?></h3></td></tr>
    <tr>
      <!-- <th scope="col">SL</th> -->
      <th scope="col">Name</th>
      <th scope="col">Roll no</th>
      <th scope="col">Semester</th>
      <!-- <th scope="col">Photo</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
     // $query= mysqli_query($db_con,'SELECT * FROM `student_info` ORDER BY `student_info`.`date` DESC;');
	  
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
         
       <!-- <td> <?php// echo $i ?></td> -->
          <td> <?php echo ucwords($result['name'])?></td>
          <td> <?php echo $result['roll'] ?></td>
         <td> <?php echo ucwords($result['class'])?></td>
          <!-- <td><img src="images/'.$result['photo'].'" height="50px"></td> -->
          <?php
           if($result['status']=="active"){?>
            <td>&nbsp;<button> <a class="btn btn-danger" name="disable" href="admin_index.php?page=admin_user_disable&get=<?php echo $result['id'] ?>">Disable</a></button></td>';
            
         }
          <?php
           }
           else{
           if($result['status']=="inactive"){?>
            <td>&nbsp;<button> <a class="btn btn-success" name="disable" href="admin_index.php?page=admin_user_disable&get=<?php echo $result['id'] ?>">Enable</a></button></td>';
            <?php
         }
          }
          ?>
              
           
      </tr>  
     <?php $i++;} } ?>
   
  </tbody>
</table>
<!-- <script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script> -->
<?php
// if(isset($_GET['get'])){
// $id=$_GET['get'];
// echo $id;
// $query="UPDATE `student_info` SET `status`='inactive' WHERE id=$id";
// $result=mysqli_query($db_con,$query);
// if($result)
// {
//    // header('location:Home.php');
//    header('location:index.php?page=all-users');
// }
// else
// {
//     echo "cannot delete";
//     die(mysqli_error($db_con));
// }
// }
?>


