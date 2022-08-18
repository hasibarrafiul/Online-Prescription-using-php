<?php
session_start();
$loggedin = $_SESSION['logedin'];
if($loggedin == 'true'){
    //echo "Welcome ".$_SESSION['username']. '<br><br>';
}
else{
    header('location:login.php');
}
?>

<html>
<head>
<title>Profile</title>
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

<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "onlineprescription";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = $_SESSION['username'];
$sql = "SELECT * from profile where username = '$username'";
$res = mysqli_query($conn, $sql);
echo "<table class='table table-dark table-hover'>";
if (mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
        $url = 'uploads/'. $username .$row["file_name"];
        echo "<tr align='center'>"
        ?>
        <img src="<?php echo $url; ?>" alt="" height="300px" width="300px" class="rounded-circle "/>
    <?php
        echo "</tr>";
        echo "<tr>";
        echo "<td>Name:</td>";
        echo "<td>".$row["name"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Email:</td>";
        echo "<td>".$row["email"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Phone:</td>";
        echo "<td>".$row["phonenumber"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Specialist:</td>";
        echo "<td>".$row["specialist"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Address:</td>";
        echo "<td>".$row["address"]."</td>";
        echo "</tr>";
    }
}

echo "</table>";

mysqli_close($conn);
?>

<button class="btn btn-outline-light" onclick="window.location.href='editprofile.php'">Edit Profile</button> <br><br><br>

</div>
</div>
</body>
</html>