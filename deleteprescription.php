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

$id = $_GET['id'];
$sql = "DELETE FROM prescribedmedicines WHERE prescribedto = '$id'";
if (mysqli_query($conn, $sql)) {
    echo "Prescription Deleted Successfully";
    header('location:home.php');
    } 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>