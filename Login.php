<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="login"
           <div><center>
        <form method="post" class="form">
            <h1 class="mt-5">LOGIN</h1>
            <input type="email" name="email" placeholder="Enter your email" class="form-control mb-3  w-25 p-3" /> <br/>
            <input type="password" name="password" placeholder="Enter your Password(8 char password)" class="form-control mb-3  w-25 p-3""  /> <br/>
            <input type="submit" name="Submit" placeholder="Enter your email" class="btn btn-success "/>

</form></div>
</center>
    <?php
    include("db.php");
  
       //print_r($_POST);
    //if(isset($_SESSION["Usertype"])){
       
       
    if(isset($_POST["Submit"])){
       
     $email= $_POST["email"];
     $password= $_POST["password"];
      $sql= "SELECT * From registration where email= '$email' AND password='$password'";
       $data=mysqli_query($conn,$sql);
       
    
       if(mysqli_num_rows($data)){
       
    $row=mysqli_fetch_assoc($data);
       
     
       
      
   
            $_SESSION["email"]=$email;
            $_SESSION["password"]=$password;
            $_SESSION["Usertype"]= $row['Usertype']; echo $_SESSION["Usertype"];

            if($_SESSION['Usertype'] === 'Admin')
            {
                echo header('location:SMS.php');
                //echo "<script>comfirm('successfully')</script>";
                exit;
            }
            if($_SESSION['Usertype'] == 'user'){
            echo header('location:user_panel.php');
            exit;
        }
        else {
            echo "try again!!!!!!";
    }
    }
}
   // }

    ?>
    </div>
</body>
</html>