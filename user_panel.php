<?php
session_start();
if(isset($_SESSION['email'])){
    $email= $_SESSION['email'];
}
?>
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
      
           
              
        </div>

    </div>
    <tbody class="tbl">
    <?php
    include("db.php");
    echo '<table class="table">';
    echo '<tr scope="row">';
    echo'<th scope="col">name</th>';
    echo'<th scope="col">Rollno</th>';
    echo'<th scope="col">phone</th>';
    echo' <th scope="col">email</th>';
    echo' <th scope="col">gender</th>';
    echo'<th scope="col">course</th>';
    echo' <th scope="col">Actions</th>';
    echo '</tr>';
    "</table>";

     $quary= "Select * from registration WHERE email= '$email'";
     $result= mysqli_query($conn,$quary);
        if(mysqli_num_rows($result)>0){
      
        while($row = mysqli_fetch_assoc($result)){

           echo '<table class="table">';
       
     
            echo '<tr scope="row" >';
            echo '<td>'.$row["name"].'</td>';
            echo '<td  scope="col">'.$row["Rollno"]."</td>";
            echo '<td  scope="col">'.$row["phone"]."</td>";
            echo '<td  scope="col">'.$row["email"]."</td>";
            echo '<td  scope="col">'.$row["gender"]."</td>";
            echo '<td  scope="col">'.$row["course"].'</td>';
            echo '<td>';
            echo '<button class= "btn btn-success"><a href="update.php?updateid='.$row["Rollno"].'">Update</a></button>';
            
            echo"</td>";
              "</tr><br/>";
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