<?php
session_start();
$loggedin = $_SESSION['logedin'];
if($loggedin == 'true'){
    echo "Welcome ".$_SESSION['username']. '<br><br>';
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
$name = $_POST['medname'];
$indication = $_POST['medindication'];
$usage = $_POST['medusage'];
$indtruction = $_POST['medinstruction'];
$id = $_GET['id'];

$sql = "Update medicines SET name ='$name', indication ='$indication', usages ='$usage', instruction ='$indtruction' WHERE id ='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Medicine Edited Successfully";
    } 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
   
}


mysqli_close($conn);
?>

<html>
<head>
<title>Edit Medicine</title>
</head>
<body>
<h1>Edit Medicine</h1>
<form method="post">
<p>Name: <input type="text" name="medname" size="20" maxlength="20" /></p>
<p>Indication: <input type="text" name="medindication" size="20" maxlength="20" /></p>
<p>Usage: <input type="text" name="medusage" size="20" maxlength="20" /></p>
<p>Instruction: <input type="text" name="medinstruction" size="20" maxlength="20" /></p>
<p><input type="submit" name="submit" value="Edit medicine" /></p>
</form>

</body>
</html>