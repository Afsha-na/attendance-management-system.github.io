<?php include('myhead.php');?>
<?php// include('Admin.php');?> <br>
<?php
$query1="select * from `users`";
$result=mysqli_query($con,$query1);
?>
<center>
<button> <a class="edit" name="disable" href="admin_index.php?page=Admin_dashboard">dashboard
</a></button>
<table style="width:100%">
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
  <?php
  while($rows=mysqli_fetch_assoc($result)) {?>
  <tr class="odd">
  <td style="text-align:center"><?php echo $rows['id']; ?></td>
  <td><?php echo $rows['name']; ?></td>
  <!-- <td><?php //echo $rows['tlname']; ?></td> -->
  <td><?php echo $rows['email']; ?></td>
  <!-- <td><?php //echo $rows['username']; ?></td> -->
  <td><?php echo $rows['password']; ?></td>
  <td><?php echo $rows['status']; ?></td>
  <td><?php echo $rows['datetime']; ?></td>
  <td><button style="padding:0";><a href="EditTeacher.php?edit=<?php echo $rows['id']; ?>" class="edit">Edit</a></button>
  <button style="padding:0";><a href="DeleteTeacher.php?id=<?php echo $rows['id']; ?>"  onclick='return checkdelete()' class="delete">delete</a></button>
</td>
  </tr>
  <?php
  }
?>
</table>
<script>
  function checkdelete()
  {
    return confirm('Are you sure you want to delete this record');
  }
</script>