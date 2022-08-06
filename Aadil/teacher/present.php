<?php require_once 'db_con.php';
session_start();
$output['status'] = false;
if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);
	$subject = base64_decode($_GET['subject']);
	if (isset($id)) {
            $query ="SELECT  `roll`, `class`,`name` FROM `student_info` WHERE `id`=$id;";
				$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
				
		          $stroll= $row['roll'];
		          $stclass= $row['class'];
				  $sname= $row['name'];
				
				$date= date('Y-m-d');
				$stats="Present";
				$rslt=mysqli_query($db_con,"SELECT * FROM `attendence` where `roll`='$stroll' AND `class`='$stclass' AND `date`='$date' AND `subject`='$subject'");
				$count=mysqli_num_rows($rslt);
				if(empty($count)){
					$output['status'] = true;
				$query=mysqli_query($db_con,"INSERT INTO `attendence`(`id`, `roll`,`name`, `class`,`subject`, `date`, `status`) VALUES ('$id', '$stroll','$sname', '$stclass','$subject', '$date', '$stats')");
		        // header('Location: index.php');
	
				}
				else{
					$output['error'] = 'ATTENDANCE ALREADY DONE';
				// echo '<h3 style="color:red;" align="center">ATTENDANCE ALREADY DONE</h3>';
			         }
				
	}else{
		$output['error'] = 'Id missing';
		//header('Location: index.php');
		}
}else{
	$output['error'] = 'Login Required';
	// header('Location: login.php');
 }
 echo json_encode($output);