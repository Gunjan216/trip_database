<?php
$insert = false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server , $username , $password);
if(!$con){
    die("connection to this data failed due to" . mysqli_connect_error());
}
    //echo " success connecting to the db";
    $name = $_POST['name']; 
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql ="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;

if($con->query($sql) == true)
{
    //echo " successfully inserted";
    $insert = true;

}
else {
    echo "ERROR : $sql <br> $con->error";

}

$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@300&family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <img class="bg" src="bg1.jpg" alt="GEC Bhavnagar">
    <div class="container">
        <h1>Welcom to GEC Bhavnagar US Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
       <?php 
       if($insert == true)
{      
      echo "<p class='submitMsg'> Thanks for submitting your form . We are happy to see you joining us for the  US trip.</p>";
 } ?>
<form action="index.php" method="post">
<input type="text" name=" name" id="name" placeholder="Enter your Name">
<input type="text" name="age" id="age" placeholder="Enter your Age">
<input type="text" name="gender" id="gender" placeholder="Enter your gender">
<input type="email" name="email" id="email" placeholder="Enter your Email">
<input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
<button class="btn">Submit</button>

</form>
<!---INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'gunjan', '20', '', 'xyz@gmail.com', '1234567891', 'this is value', current_timestamp());-->

    </div>
    <script src="index.js"></script>
</body>
</html>