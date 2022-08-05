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

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = $_SESSION['username'];
$sql = "SELECT * from profile where username = '$username'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
        $url = 'uploads/'.$row["file_name"];
        echo "Name: " . $row["name"]. "<br>";
        echo "Email: " . $row["email"]. "<br>";
        echo "Phone: " . $row["phonenumber"]. "<br>";
        echo "Address: " . $row["address"]. "<br>";
        ?>
            <img src="<?php echo $url; ?>" alt="" />
        <?php
    }
}



mysqli_close($conn);
?>

<button onclick="window.location.href='editprofile.php'">Edit Profile</button> <br><br><br>