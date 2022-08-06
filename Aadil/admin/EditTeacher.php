<?php include('myhead.php');?>
<?php //include('Admin.php');?>

<?php
// $id='';
// $name='';
// $subject='';

?>
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
<center>
<button> <a class="edit" name="disable" href="viewTeacher.php">BACK
</a></button>
</center>
<div class="inline"  >
    <div class="green"> ~Edit Teacher~ </div><br>
<form action="UpdateTeacher.php"  method="POST"  name="1st_sem">
     
  <?php
  include('connect.php');

if(isset($_GET['edit'])){
  $id=$_GET['edit'];
 $query1="SELECT * FROM `users` WHERE `id` = $id";

 $result=$con->query($query1);
 //if(is_array($result) || is_object($result)){
 foreach($result as $row)

{
?>
<div style="text-align:center border-radius:1px size:3 width:3px" >
<label> Employee id:</label>
<input type="text" name="id" value="<?=$row['id'];?>" size="2" readonly></div>
<div style="display:inline-block;">
<div class="inline">
<input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="name" value="<?=$row['name'];?>"class="form-control" placeholder="Name" id="event" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div>

                                         

                                       


                                        



                                                        <div class="form-group">
                                            <div class="row">

                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="email" value="<?=$row['email'];?>" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input password="text" name="password" value="<?=$row['password'];?>" class="form-control" placeholder="Password" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>
                                       
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-9">
                                                   <select name="gender" value="<?=$row['gender'];?>" id="gender" class="form-control" required="">
                                                    <option value="">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Date Of Birth</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="dob" value="<?//=$row['dob'];?>" class="form-control" placeholder="Birth Date">
                                                </div>
                                            </div>
                                        </div>  -->

                                        <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Contact</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="tcontact" value="<?//=$row['tcontact'];?>" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div> -->

                                         <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="taddress" value="<?//=$row['taddress'];?>"  placeholder="Address" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                        </div> -->
                                                  </div>
                                                  <div>
                                                  <button type="submit" name="1st_sem" class="btn btn-primary btn-flat m-b-30 m-t-30"> update</a></button>
                                                  </div> 
   
 <?php                                        
 }
}
//}

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