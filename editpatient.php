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
$id = $_GET['id'];

$sql = "Update patientinfo SET name ='$name', gender ='$gender', age ='$age', address ='$address', number ='$number' WHERE id ='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Patient Edited Successfully";
    } 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 
}


mysqli_close($conn);
?>

<html>
<head>
<title>Edit Patient</title>
</head>
<body>
<h1>Edit Patient</h1>
<form method="post">
<p>Name: <input type="text" name="pname" size="20" maxlength="20" /></p>
<p>Gender: <input type="text" name="pgender" size="20" maxlength="20" /></p>
<p>Age: <input type="number" name="page" size="20" maxlength="20" /></p>
<p>Address: <input type="text" name="paddress" size="100" maxlength="100" /></p>
<p>Phone Number: <input type="number" name="pnumber" size="20" maxlength="20" /></p>
<p><input type="submit" name="submit" value="Edit Patient" /></p>
</form>

</body>
</html>