<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
    <link rel="stylesheet" href="SMS.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="main">
        <div class="header">Student Management System</div>
      
        <div class="btn">
            <a href="reg.php"><button>Add</button></a>
    <strong><button><a href="Login.php">Logout</a> </button></strong>
        </div>

    </div>

    <tbody class="table">
    <?php
    include("db.php");
    
    echo '<table class="table">';
    echo "<tr>";
    echo'<th scope="col">name</th>';
    echo'<th scope="col">Rollno</th>';
    echo'<th scope="col">phone</th>';
    echo'<th scope="col">email</th>';
    echo'<th scope="col">gender</th>';
    echo'<th scope="col">Course</th>';
    echo'<th scope="col">Usertype</th>';
    echo'<th scope="col">Actions</th>';
  
    echo "</tr>";
    echo "</table>";
 
   
     $quary= "Select * from registration";

     $result= mysqli_query($conn,$quary);
     if(mysqli_num_rows($result)>0){
      
        while($row = mysqli_fetch_assoc($result)){
                  
            

    

            echo '<table class="table">';
       
            echo '<th scope="row" >';
            echo '<td>'.$row["name"]."</td>";
            echo '<td>'.$row["Rollno"]."</td>";
            echo '<td>'.$row["phone"]."</td>";
            echo '<td>'.$row["email"]."</td>";
            echo '<td>'.$row["gender"]."</td>";
            echo '<td>'.$row["course"].'</td>';
            echo '<td>'.$row["password"].'</td>';
            echo '<td>'.$row["Usertype"].'</td>';
            
            echo '<td>';
            echo '<button class= "btn btn-success"><a href="update.php?updateid='.$row["Rollno"].'">Update</a></button>';
            echo'<button class= "btn btn-danger text-white"><a href="delete.php?deleteid='.$row["Rollno"].'">Delete</a></button>';
            echo"</td>";
              "</th><br/>";
              "</tr>";
              "</table>";
        }
 

    

          
    }

        else{
            echo "No Record found";
        }
        mysqli_close($conn);


    ?>
    
    </tbody>
   
</body>

</html>