<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variable
    $server = "localhost";
    $username = "root";
    $passwaord = "";
// create a database connection
    $con = mysqli_connect ($server, $username, $passwaord);
// check for connection success
    if (!$con){
        die("connection to this database failed due to" . mysqli_connect_error());

    }
    //echo "Succes connecting to db";
    // collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip` . `trip` (`name`, `age`, `gender`, `phone`, `email`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$phone', '$email', '$desc', current_timestamp());";
//echo $sql;
// Execute the query

if ($con-> query($sql) == true){
    //echo "Successfully inserted";
    // flag for succesful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
// close the database connection
$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="Style.css"> 
</head>
<body>
    <img class= "bg" src= "bg.jpg" alt="USICT, GGSIPU">
    <div class="container">
        <h1> Welcome to USICT, GGSIPU Trip form </h3>  
         
        <p> Enter Your details and submit this form to comfirm your Participation in the trip </p>
        
        <?php
        if ($insert == true)
        echo "<p class= 'submitmsg'> Thank you for submitting trip form</p>";
        ?>
        <form action="index.php" method="post">
        <input type="text" name ="name" id="name" placeholder="Enter your Name">
        <input type="text" name ="age" id="age" placeholder="Enter your Age">
        <input type="text" name ="gender" id="gender" placeholder="Enter your Gender">
        <input type="email" name="email" id="email" placeholder="Enter your eamil">
        <input type="phone" name= "phone" id= "phone" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any Other information here"></textarea>
        <button class="btn">Submit</button>
       
        
    </form>   
    </div>
<script src="index.js"></script>
</body>
</html>

