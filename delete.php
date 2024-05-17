<?php
include("db.php");
if(isset($_GET['deleteid']))
{ 
    $id=$_GET['deleteid'];
   $quary="DELETE FROM registration where Rollno='$id' ";
    $result= mysqli_query($conn,$quary);
    
    if($result)
    {
        echo header('location:SMS.php');
    }
    else{
        echo "try again";
    }
}


?>
<script>
    function comfirmation(id){
        comfirm("Sure you will delete the user");
    }
</script>