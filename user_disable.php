<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage!=='index.php') {
  if ($corepage==$corepage) {
    $corepage = explode('.', $corepage);
   header('Location: index.php?page='.$corepage[0]);
 }
}



if (isset($_POST['showinfo'])) {
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
    <td>&nbsp;<button> <a class="btn btn-danger btn-toggle" data-id="<?php echo $result['id'] ?>" name="disable">Disable</a></button></td>
    
 
  <?php
   }
   else{
   if($result['status']=="inactive"){?>
    <td>&nbsp;<button> <a class="btn btn-success btn-toggle" data-id="<?php echo $result['id'] ?>" name="disable">Enable</a></button></td>
    <?php
 }
  }

  ?>
      
   
</tr>  
<?php $i++;}} ?>

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





<?php
if(isset($_GET['get'])){
$id=$_GET['get'];
echo $id;

$query= mysqli_query($db_con,"SELECT * FROM `student_info` WHERE `id`='$id';");
while($rows=mysqli_fetch_array($query)){
  $st=$rows['status'];
}
if($st=="active"){

$query="UPDATE `student_info` SET `status`='inactive' WHERE id=$id";
$result=mysqli_query($db_con,$query);
if($result)
{
  
   // header('location:Home.php');
   //header('location:index.php?page=user_disable');
  ?>
    <script>
     // window.location.href='index.php?page=user_disable'
      </script>
      <script type="text/javascript">

$(document).ready(function () {
  $("my").onclick(function(event){
    alert("alert");
  })


});

</script>
      <?php
}


else
{
    echo "cannot llldelete";
    die(mysqli_error($db_con));
}
}



if($st=="inactive"){

  $query="UPDATE `student_info` SET `status`='active' WHERE id=$id";
  $result=mysqli_query($db_con,$query);
  if($result)
  {
     // header('location:Home.php');
     ?>
     <script>
      window.location.href='index.php?page=user_disable'
      </script>
      <?php
     //header('location:index.php?page=all-users');
  }
  
  else
  {
      echo "cannot delete";
      die(mysqli_error($db_con));
  }
  }
}
?>
