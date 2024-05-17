<?php {
    include"db.php";
    session_start();
   function generateAutoNumber(){
$random_id= rand(1,200);
$string= "SMS2024";
return $string."".$random_id;
   }
   



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet"href="reg.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   
    <div id="main" class="bg-success">
        <form method="post" class="form">
            <center>
            <h1 class="head"> Sudent Registration</h1>
            <label>Enter the Name:</label><br/>
            <input type="text" name="name" id="update_id"/><br/>
            <label>Enter the Roll No:</label><br/>
            <input type="text" name="Rollno" value="<?php echo generateAutoNumber(); ?>"/><br/>
            <label>Enter the Phone No:</label><br/>
            <input type="number" name="phone" id="update_id"/><br/>
            <label>Enter the Email:</label><br/>
            <input type="email" name="email" id="update_id"/><br/>
            <label>Enter the gender :</label><br/>
            <label class="gender">Male</label>
            <input type="radio" name="gender" value="Male"/>
            <label class="gender">Female</label>
            <input type="radio" name="gender" value="Female"/><br/>
            <label>Enter the course :</label><br/>
            <input type="name" name="course" id="update_id"/><br/>
            <label>Enter the password :</label><br/>
            <input type="password" name="password" id="update_id" placeholder="Only 8 Char Password"/><br/>
        
            <label>Enter the Usertype :</label><br/>
            <input type="text" name="Usertype" id="update_id"/><br/>
            <div class="btn">
            <input type="submit" name="submit" value="submit"  />
            <button  ><a href="javascript:history.back()">Back</button></a>
            </div>      

            </center>
            
        </form>
    </div>
    <?php
    include("db.php");
    //print_r($_POST);
   // error_reporting(-1);
    

    if(isset($_POST["submit"])){
        if(isset($_POST["name"]) && (isset($_POST["Rollno"]) && 
    (isset($_POST["phone"])&& (isset($_POST["email"])
     && (isset($_POST["gender"]) && (isset($_POST["course"])&&(isset($_POST["password"])&&(isset($_POST["Usertype"]))))))))){
        
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $Rollno = $_POST["Rollno"];
        $course = $_POST["course"];
        $password = $_POST["password"];
        $Usertype = $_POST["Usertype"];
     
     
     }
    
        $quary= "INSERT INTO registration(name,Rollno,phone,email,gender,course,password,Usertype) Values('$name','$Rollno','$phone','$email','$gender','$course','$password', '$Usertype')";
        $data= mysqli_query($conn, $quary);
       
        if($data>0){
           
            echo "Done";
        }
        else{
            echo "error";
        }
        mysqli_close($conn);
    }
 ?> 
</body>
</html>