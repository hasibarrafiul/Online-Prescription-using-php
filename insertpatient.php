<?php
session_start();
$loggedin = $_SESSION['logedin'];
if($loggedin == 'true'){
}
else{
    header('location:login.php');
}
?>
<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "onlineprescription";

// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['submit'])){
$name = $_POST['pname'];
$gender = $_POST['pgender'];
$age = $_POST['page'];
$address = $_POST['paddress'];
$number = $_POST['pnumber'];

$sql = "INSERT INTO patientinfo (name, gender, age, address, number) VALUES ('$name', '$gender', '$age', '$address', '$number')";
if (mysqli_query($conn, $sql)) {
    echo "Patient Added Successfully";
    header('location:home.php');
    } 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
   
}


mysqli_close($conn);
?>

<html>
<head>
<title>Patient</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
body {
  background-image: url('bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}

td 
{
    text-align: center; 
    vertical-align: middle;
}
</style>
</head>
<body>

    
<div class="position-absolute top-50 start-50 translate-middle">
<div class="p-3 mb-2 bg-dark text-white rounded">
<form method="post">
<h1>Insert Patient</h1>
    <table class="table table-dark table-hover">
        <tr>
            <td>
            <div class="form-floating">
            <input type="text" name="pname" size="20" maxlength="20" class="form-control" id="floatingInput" placeholder="Name"/>
            <label for="floatingInput" class="text-dark">Name</label>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-floating">
            <input type="text" name="pgender" size="20" maxlength="20" class="form-control" id="floatingInput" placeholder="Gender"/>
            <label for="floatingInput" class="text-dark">Gender</label>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-floating">
            <input type="number" name="page" size="20" maxlength="20" class="form-control" id="floatingInput" placeholder="Age"/>
            <label for="floatingInput" class="text-dark">Age</label>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-floating">
            <input type="text" name="paddress" size="40" maxlength="100" class="form-control" id="floatingInput" placeholder="Address"/>
            <label for="floatingInput" class="text-dark">Address</label>
            </div>    
        </td>
        </tr>
        <tr>
            <td>
            <div class="form-floating">
            <input type="number" name="pnumber" size="20" maxlength="20" class="form-control" id="floatingInput" placeholder="Phone Number"/>
            <label for="floatingInput" class="text-dark">Phone Number</label>
            </div>    
        </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Submit" class="btn btn-outline-light"/>
            </td>
        </tr>
    </table>
</form>
</div>
</div>


    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>