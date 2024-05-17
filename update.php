<!DOCTYPE html>
<?php
session_start(); 
if(isset($_SESSION['Usertype'])){
$Usertype= $_SESSION['Usertype'];
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Upadate </title>
  <link rel="stylesheet" href="update.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
include("db.php");
if(isset($_GET['updateid'])){
$id= $_GET['updateid'];
$data= "SELECT * FROM registration where  Rollno='$id'";

$fetch= mysqli_query($conn,$data);

$row=mysqli_fetch_assoc($fetch);
echo "$Usertype";


  }

//}
?>
<body>

<div id="main">
    <form method="post" class="form ">
            <center>
            <h1 class ="head">Update Record</h1>
<?php
if ($Usertype  == "Admin")
{?>
  


            <label>Enter the Name:</label><br/>
            <input type="text" name="name" value= "<?php echo $row['name'];?>"> <br/>
            <label>Enter the Roll No:</label><br/>
            <input type="text" name="Rollno" value="<?php echo $row['Rollno'];?>"><br/>
            <label>Enter the Phone No:</label><br/>
            <input type="number" name="phone" value="<?php echo $row['phone'];?>"><br/>
            <label>Enter the Email:</label><br/>
            <input type="email" name="email" value= "<?php echo $row['email'];?>"><br/>
            <label>Enter the gender :</label><br/>
            <label class="gender">Male</label>
            <input type="radio" name="gender" value="Male" <?php if($row['gender'] ==='Male') echo 'checked';?>>
            <label class="gender">Female</label>
            <input type="radio" name="gender"  value="Female"<?php if($row['gender'] ==='Female') echo 'checked';?>><br/>
            <label>Enter the course :</label><br/>
            <input type="name" name="course"value=" <?php echo $row['course'];?>"><br/>
            <label>Enter the Password :</label><br/>
            <input type="password" name="password" value="<?php echo $row['password'];?>"/><br/>
            <label>Enter the Usertype :</label><br/>
            <input type="text" name="Usertype" value="<?php echo $row['Usertype'];?>"/></br>

<?php } if ($Usertype  == "user"){ ?>
           
      <label>Enter the Name:</label><br/>
            <input type="text" name="name" value= "<?php echo $row['name'];?>"> <br/>
            <label>Enter the Roll No:</label><br/>
            <input type="text" name="Rollno" readonly value="<?php echo $row['Rollno'];?>"><br/>
            <label>Enter the Phone No:</label><br/>
            <input type="number" name="phone" value="<?php echo $row['phone'];?>"><br/>
            <label>Enter the Email:</label><br/>
            <input type="email" name="email" readonly value= "<?php echo $row['email'];?>"><br/>
            <label>Enter the gender :</label><br/>
            <label class="gender">Male</label>
            <input type="radio" name="gender" readonly value="Male" <?php if($row['gender'] ==="Male") echo 'checked';?>>
            <label class="gender">Female</label>
            <input type="radio" name="gender" readonly value="Female"<?php if($row['gender'] ==="Female") echo 'checked';?>><br/>
            <label>Enter the course :</label><br/>
            <input type="name" name="course" readonly value=" <?php echo $row['course'];?>"><br/>
            <label>Enter the Password :</label><br/>
            <input type="password" name="password" readonly value="<?php echo $row['password'];?>"/><br/>
            <label>Enter the Usertype :</label><br/>
            <input type="text" name="Usertype" readonly value=" <?php echo $row['Usertype'];?>"><br/>
               
                <?php
              }  
 ?>
        



            <div class="btn">
            <input type="submit" name="update"value= "update"  class= "btn btn-success"/>
            <button  class= "btn btn-secondary"><a href="javascript:history.back()">Back</button></a>
            </div>      

            </center>
            


        </form>
  
    
    </div>
  
</body>
</html>
<?php



  if(isset( $_POST["update"])){

  $name = $_POST['name'];
  $Rollno = $_POST['Rollno'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $course = $_POST['course'];
  $password=$_POST['password'];
  $Usertype = $_POST['Usertype'];
 // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);



  $update= "UPDATE registration Set name='$name', Rollno='$Rollno', phone= '$phone', email='$email', gender='$gender', course='$course', password='$password', Usertype= '$Usertype' where Rollno='$id'";

  if(mysqli_query($conn, $update)){

    echo "update sucessfully";
  }
  else{
    echo "try again";
  }

}

?>