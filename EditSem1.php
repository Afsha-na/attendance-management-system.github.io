<?php include('myhead.php');?>
<?php //include('Admin.php');?>

<?php
// $id='';
// $name='';
// $subject='';

?>
<center>
<button> <a class="edit" name="disable" href="admin_index.php?page=Home">BACK
</a></button>
</center>
<style>
    .inline{
        display:inline-block;
        background: #c9e97f none repeat scroll 0 0;
  margin: 5px 0;
  padding: 32px;
  border: 0 solid #e7e7e7;
  border-radius: 80px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
  max-width: 56%;
    }

</style>
<center>
<div class="inline"  >
    <div class="green"> ~ Edit Semister~ </div><br>
<form action=""  method="POST"   name="1st_sem">
     
  <?php
  include('connect.php');

if(isset($_GET['edit'])){
  $id=$_GET['edit'];
 $query1="SELECT * FROM `my_semester` where id='$id'";

 $result=$con->query($query1);
 foreach($result as $row)

{
?>
<div style="text-align:center border-radius:1px size:3 width:3px" >
<label>id:</label>
<input type="text" name="id" value="<?=$row['id'];?>" size="2" readonly></div>
<div style="display:inline-block;">
<div class="inline">
<label>Teacher Name</label>
                                                  <input type="text" name="Name" value="<?php echo $row['Name']; ?>"class="form-control"        placeholder="Name" id="event" onkeydown="return alphaOnly(event);" required="">
</div>
                                                <div class="inline">
     
                                               <label class="col-sm-3 control-label">Subject Name</label>
                                                  <input type="text" name="Subject" value="<?= $row['Subject'];?>"

class="form-control" placeholder="Subject" id="event" onkeydown="return alphaOnly(event);" required="">
                                                  </div>
                                                  <button type="submit" name="update_sem" class="btn btn-primary btn-flat m-b-30 m-t-30"> update</a></button> 
   
 <?php                                        
 }
}

else
{
   echo "no records";
}

// else{
//   echo "sorry";
// }


    ?>
    </div >  
</div>          
</div>                                           </form>
    </center> 
    <?php
//     if(isset($_POST['1st_sem']))
// if(isset($_POST['Name']))
// $name=$_POST['Name'];
// if(isset($_POST['Subject']))
// $subject=$_POST['Subject'];
// $query="UPDATE 1st_sem set Name='$name',Subject='$subject' where id=$id";
// echo "nice";
// $run=mysqli_query($con,$query) or die(mysqli_error($con));
// if($run)
// {
//   echo "form submitted";
//   header('location:1stSem.php');
// }
// else
// {
//   echo "ERROR";
//   mysqli_error($con);
// }

?>
  <?php //include('myhead.php')?> 

<?php
//include('connect.php');
$update=false;
if(isset($_POST['update_sem'])){
if(isset($_POST['Name']))
$name=$_POST['Name'];
if(isset($_POST['Subject']))
$subject=$_POST['Subject'];
if(isset($_POST['id']))
$id=$_POST['id'];
//echo "good";
//echo $name;
$id=$_POST['id'];
//echo $id;

$query="UPDATE `my_semester` SET Name ='$name',Subject ='$subject' WHERE id=$id";
//echo "nice";
echo $run=mysqli_query($con,$query);
echo $run;
if($run)
{
  echo "data updated";
  ?>
 <script>
     window.location.href='Home.php';
     </script>
  <?php
  header('location:Home.php');
}
else
{
echo "cannot update";
}
}
 ?>
