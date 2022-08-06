<?php include('myhead.php');
echo "hello";
$id=$_GET['id'];
echo $id;
$query="DELETE FROM `my_semester` WHERE id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    ?>
    <script>
        window.location.href="Home.php";
    </script>
    <script>
        $(document).ready(function(){
            $(my).onclick(function(event){
                alert("alert");
            })

            
        })
    </script>
    <?php
    //header('location:Home.php');

}
else
{
    echo "cannot delete";
    die(mysqli_error($con));
}
?>