<?php include('myhead.php');
//SESSION_start();
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage!=='admin_index.php') {
  if ($corepage==$corepage) {
    $corepage = explode('.', $corepage);
   header('Location: admin_index.php?page='.$corepage[0]);
 }
}
?>
<style>
    .inline{
        display:inline-block;
        background: #c9e97f none repeat scroll 0 0;
  margin: 4px 77px;
  padding: 23px;
  border: 0 solid #e7e7e7;
  border-radius: 80px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
  max-width: 105%;
  right:1px;

    }

</style>


<center>
  <h1>Assign Subjects</h1>
<!-- <div id="sem"> -->
    <form action="" method="POST">
        <div class="inline"  >
            <p>Choose Semester</p>
                </td>
                <td>
                   <select class="form-control" name="choose" required="" id="value"  >
                     <option value=""  >
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

                     </td>
                </div>
                
                <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger"  id="sem" type="submit" name="showinfo" disabled value="search">
                </td>
              </tr>
                </form>
                 </div>



                   
                 <div id="select">
<?php

                if (isset($_POST['showinfo'])) {
    $choose= $_POST['choose'];

               // }
                // else
                // {
                //   $choose='1st Semester'; 
                 
?>






    
    



</select>
               
                </center>


<div id="choose">


                <form action="" method="POST" name="1st_sem">
                  <div class="inline"  >
  <?php
//   echo $choose;
 if(empty($choose))
 {
?>
<div style="text-align:center" class="green">Please select semester above for assigning subjects </div><br>
<?php
 }
 else{
  ?>
    <div style="text-align:center" class="green">Please assign subjects for ~ <?php echo $choose?>~ </div><br>
    <?php
    $_SESSION['choose']=$choose;
}              
?>


     <div style="display:inline-block;">

<div class="inline">
<?php //include('Admin.php') ;
//include('admin_index.php');

?>
<!-- <div class="row">
            <div class="col-md-4 offset-md-4">
              <form  method="post">
                </th>
              </tr>
              <tr> -->
 
                <!-- <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo" value="search">
                </td>
              </tr> -->
<!-- <center>
    <br>
    <div>
<div class="sem">
    <b> <a href="1stSem.php">1st Semister</a></b>
</div>

<br>
<div class="sem">
    <b> <a href="2ndSem.php" >2nd Semister</a></b>
</div>

<br>
<div class="sem">
    <b> <a href="3rdSem.php">3rd Semister</a></b>
</div>

<br>
<div class="sem">
    <b> <a href="4thSem.php">4th Semister</a></b>
</div>

<br>
<div class="sem">
    <b> <a href="5thSem.php">5th Semister</a></b>
</div>

<br>
<div class="sem">
    <b> <a href="6thSem.php">6th Semister</a></b>
</div>
</div>
</center> -->
<?php 
          //if($choose="1st semester"){?>
          
                
                <div class="inline">
            <label>Teacher Name</label>
            <select type="text" name="Name" class="form-control" placeholder="Name"  id="event" onkeydown="return alphaOnly(event);" required="">
            <option value="">--Select Teacher--</option>
           
                      <?php  
          

                      $c1 = "SELECT * FROM `users`";
                      $result = $con->query($c1);

                      if ($result->num_rows > 0) {
                          while ($row = mysqli_fetch_array($result)) {?>
                              <option value="<?php echo $row["name"];?>">
                                  <?php echo $row['name'];?>
                              </option>
                              <?php
                          }
                      } else {
                      echo "0 results";
                          }
                        // }
                        // else
                        // {
                        //     echo "error";
                        // }
                      ?>
              </select>
                        <!-- </div> -->
            <!-- </div> -->
            <!-- <div class="inline"> -->
          <label class="col-sm-3 control-label">Subject Name</label>
            <input type="text" name="Subject" class="form-control" placeholder="Subject" id="event" onkeydown="return alphaOnly(event);" required="">
            </div>
            <center>
                   <button type="submit" name="1st_sem" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button> 
</div >  
</div>          
</div>                                           
</form>
</center>
</div>
</div>                                

         














<?php

                        }
                        ?>
<div id="table">

<?php //include('myhead.php') ?>
<?php
//$name='';
//$subject='';
$update=false;

if(isset($_POST['1st_sem'])){
  
//if(isset($_POST['choose']))
//$choose=$_POST['choose'];
if(isset($_POST['Name']))
$name=$_POST['Name'];
if(isset($_POST['Subject']))
$subject=$_POST['Subject'];
//echo $name;
$choose=$_SESSION['choose'];
$Q="SELECT * from users WHERE name='$name'";
  $Q1=mysqli_query($con,$Q);
  while($run=mysqli_fetch_array($Q1)){
$email=$run['email'];
  }
  $Q22="Select * from my_semester where Name='$name' && Subject='$subject' && Semester='$choose' && email='$email'";
  $Q33=mysqli_query($con,$Q22);
  if(mysqli_num_rows($Q33)){
    ?>
    <script>
      alert("already assigned");
    </script>
    <?php
  }
  else
  {
$query="INSERT into my_semester(Name,Subject,Semester,email) values('$name','$subject','$choose','$email')";
//echo "nice";
$run=mysqli_query($con,$query) or die(mysqli_error($con));
if($run)
{
  //echo "form submitted";
  //header('location:1stSem.php');
}
}
}
if(isset($_POST['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * from my_semester where id=$id") or die($mysqli->error());
    if(count($result)==1)
    {
        $row=$result->fetch_array();
        extract($row);
        $name=$row['Name'];
        $subject=$row['Subject'];
    }
}
?>
<?php
    //$q1="UPDATE `1st_sem` SET 'Name'=$name,`Subject`='$subject' WHERE `id`='".$_GET['id']."'";
   // $q1="UPDATE `1st_sem` SET 'Name'=$name,`Subject`='$subject' WHERE id=$id";
    // $query1="update '1st_sem' set Name='".$name."',Subject='".$subject."'";
    // $result1=mysqli_query($con,$q1);
    // if($result1)
    // {
    //   header('1stSem.php');
    // }
    // else
    // {
    //   die(mysqli_error($con));
    //   echo "cannot update";
    // }
    ?>
    <?php 
$name='';
$subject='';
if(empty($choose))
{
  $choose="1st semester";
}
else{
$query1="select * from my_semester where Semester='$choose'";
$result=mysqli_query($con,$query1);
?>
<center>
<table style="width:75%">
<tr class="even">
<th>Name</th>
<th>Subject</th>
<th>Semester</th>
<th>Action???</th>
</tr>
<?php
while($rows=mysqli_fetch_assoc($result)) {?>

<tr class="odd">
<td><?php echo $rows['Name']; ?></td>
<td><?php echo $rows['Subject']; ?></td>
<td><?php echo $rows['Semester']; ?></td>
<td><button style="padding:0";><a href="EditSem1.php?edit=<?php echo $rows['id']; ?>"class="edit" > Edit</a></button>
<button style="padding:0";><a data-id=<?php echo $rows['id'];?> onclick='return checkdelete()' class="delete">delete</a></button>
</td>
</tr>
<?php
}
}
?>
</table>
<script>
function checkdelete()
{
return confirm('Are you sure you want to delete this record');
}
</script>
</center>
</div>
<script>
  //$(document).ready(function(){
    $('.delete').click(function(e){
    e.preventDefault();
      const id=$(this).data('id');
      $.get('DeleteSem1.php?id=' +id);
       if($(this).hasClass('delete')){
       console.log($(this).parents('tr').remove());
       }
    // if(function checkdelete()=='OK'){
    //   id.parents('tr').remove();
    // }
      // $(#sem).hide();
      // $(#choose).show();
      // $(#table).hide();
      // else
      // $(#sem).show();
      // $(#choose).hide();
      // $(#table).hide();

    });
  //});
  </script>
  
<script>
  $(document).ready(function(){
    //alert($);
    //$(function(){
      //$("#sem").attr('disabled',true);
     //$('#value').val('Select');
       $("#value").change(function(){
        s=$('#value').val();
        //alert($);
      if (s == 'Select'){
      //   if($('#value').val()!=''){
         $('#sem').prop('disabled',true);
       }
       else{
         $('#sem').prop('disabled',false);
       }
    
    // if($("#sem").click(function()){
    //   //alert($);
    //   $("#sem").hide();
      
  })
  });
//});
</script>






