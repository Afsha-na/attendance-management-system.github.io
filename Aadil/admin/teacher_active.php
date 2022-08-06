<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage!=='admin_index.php') {
  if ($corepage==$corepage) {
    $corepage = explode('.', $corepage);
   header('Location: admin_index.php?page='.$corepage[0]);
 }
}
$query1="select * from `users`";
$result=mysqli_query($db_con,$query1);
?>
<center>
<button> <a class="edit" name="disable" href="admin_index.php?page=Admin_dashboard">dashboard
</a></button>




<table class="table  table-striped table-hover table-bordered" id="data">
<thead class="thead-dark"> 
    <tr class="even">
<th>Employee id</th>
  <th>Name</th>
  <!-- <th>Last Name</th> -->
  <th>Email</th>
  <!-- <th>Username</th> -->
  <th>Password</th>
  <th>Status</th>
  <th>Date</th>
  <th>Action???</th>
  </tr>
</thead>
<?php 
// $query= mysqli_query($db_con,'SELECT * FROM `student_info` ORDER BY `student_info`.`date` DESC;');

$i=1;
while ($rows = mysqli_fetch_array($result)) { ?>
<tr class="odd">
  <td style="text-align:center"><?php echo $rows['id']; ?></td>
  <td><?php echo $rows['name']; ?></td>
  <!-- <td><?php //echo $rows['tlname']; ?></td> -->
  <td><?php echo $rows['email']; ?></td>
  <!-- <td><?php //echo $rows['username']; ?></td> -->
  <td><?php echo $rows['password']; ?></td>
  <td><?php echo $rows['status']; ?></td>
  <td><?php echo $rows['datetime']; ?></td>
  <?php
   if($rows['status']=="active"){?>
    <td>&nbsp;<button> <a class="btn btn-danger btn-toggle" data-id="<?php echo $rows['id'] ?>" name="disable">Disable</a></button></td>
    
 
  <?php
   }
   else{
   if($rows['status']=="inactive"){?>
    <td>&nbsp;<button> <a class="btn btn-success btn-toggle" data-id="<?php echo $rows['id'] ?>" name="disable">Enable</a></button></td>
    <?php
 }
  }

  ?>
      
   
</tr>  
<?php $i++;} ?>

</tbody>
</table>


<script>
  $('.btn-toggle').click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    $.get('admin_index.php?page=teacher_active&get=' + id);
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

$query= mysqli_query($db_con,"SELECT * FROM `users` WHERE `id`='$id';");
while($rows=mysqli_fetch_array($query)){
  $st=$rows['status'];
}
if($st=="active"){

$query="UPDATE `users` SET `status`='inactive' WHERE id=$id";
$result=mysqli_query($db_con,$query);
if($result)
{
  
   // header('location:Home.php');
   //header('location:index.php?page=user_disable');
  ?>
    <script>
      window.location.href='index.php?page=user_disable'
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

  $query="UPDATE `users` SET `status`='active' WHERE id=$id";
  $result=mysqli_query($db_con,$query);
  if($result)
  {
     // header('location:Home.php');
     ?>
     <script>
     // window.location.href='index.php?page=user_disable'
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
