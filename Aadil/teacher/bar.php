<?php require_once 'db_con.php'; ?>
<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>
<h1 class="text-primary"><i class="fas fa-users"></i>  Inactive Students<small class="text-warning"> Inactive Students List!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Inactive Students</li>
  </ol>
</nav>
<?php if(isset($_GET['delete']) || isset($_GET['edit'])) {?>
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
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='success') {
            echo "<p style='color: green; font-weight: bold;'>Student Deleted Successfully!</p>";
          }  
        }
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='error') {
            echo "<p style='color: red'; font-weight: bold;>Student Not Deleted!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='success') {
            echo "<p style='color: green; font-weight: bold; '>Student Edited Successfully!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='error') {
            echo "<p style='color: red; font-weight: bold;'>Student Not Edited!</p>";
          }  
        }
      ?>
    </div>
  </div>
    <?php } ?>
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
     <!-- <th scope="col">SL</th> -->
	  <th scope="col">Roll</th>
      <th scope="col">Name</th>
     
	  <th scope="col">Class</th>
     
      <th scope="col">Contact</th>
      <th scope="col">Photo</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `student_info` WHERE `status`="inactive" ORDER BY `student_info`.`date` DESC;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo // '<td>'.$i.'</td>
          '<td>'.$result['roll'].'</td>
		  <td>'.ucwords($result['name']).'</td>
          
		  <td>'.$result['class'].'</td>
          
          <td>'.$result['pcontact'].'</td>
          <td><img src="images/'.$result['photo'].'" height="50px"></td>';?>
		   <?php
   if($result['status']=="active"){?>
    <td>&nbsp;<button> <a class="btn btn-danger btn-toggle" data-id="<?php echo $result['id'] ?>" name="disable">Disable</a></button></td>
    
 
  <?php
   }
   else{
   if($result['status']=="inactive"){?>
    <td>&nbsp;<button> <a class="btn btn-success btn-toggle" data-id="<?php echo $result['id'] ?>" name="disable">Enable</a></button></td>
    <?php
 }
  }?>
         
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>
<script>
  $('.btn-toggle').click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    $.get('index.php?page=user_disable&get=' + id);
    if($(this).hasClass('btn-success')) {
      $(this).removeClass('btn-success')
      $(this).addClass('btn-danger')
      $(this).text('Disable')
    } else {
      $(this).removeClass('btn-danger')
      $(this).addClass('btn-success')
      $(this).text('Enable')
    }
  })
</script>