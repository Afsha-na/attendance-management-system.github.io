<?php  //require_once 'db_con.php';
include('myhead.php');
                    $var=$_GET['selectvalue']; 
					
                                                            $sub = mysqli_query($con,"SELECT `Subject` FROM `my_semester` WHERE `Semester`='$var'");
                                                            $rslt = mysqli_num_rows($sub);
                                                               while ($row = mysqli_fetch_array($sub)){ 
                                                                $val=$row['Subject']; 
                                                       //   echo "<option >$val</option>"; 
                                                             ?>
                                                             <option value="<?php echo $val ;?>"><?php echo $val ;?></option>
                                                             <?php
                                                             }
															       





















 ?>