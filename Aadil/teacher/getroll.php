<?php  require_once 'db_con.php';
                    $var=$_GET['selectvalue']; 
					
                                                            $sub = mysqli_query($db_con,"SELECT `roll` FROM `student_info` WHERE `class`='$var'");
                                                            $rslt = mysqli_num_rows($sub);
                                                               while ($row = mysqli_fetch_array($sub)){ 
                                                                $val=$row['roll']; 
                                                       //   echo "<option >$val</option>"; 
                                                             ?>
                                                             <option value="<?php echo $val ;?>"><?php echo $val ;?></option>
                                                             <?php
                                                             }