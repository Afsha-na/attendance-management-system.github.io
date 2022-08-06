<?php include('myhead.php');
echo "hello";
$id = $_GET['id'];
echo $id;
$query=" DELETE FROM `users` WHERE `id` = $id ";
$result=mysqli_query($con,$query);
if($result)
{
    header('location:viewteacher.php');
}
else
{
    echo "cannot delete";
    die(mysqli_error($con));
}
?>