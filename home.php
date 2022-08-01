
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

<html>
<body>
    <button onclick="window.location.href='login.php'">Logout</button> <br><br><br>
    <button onclick="window.location.href='profile.php'">User Profile</button> <br>
    <button onclick="window.location.href='insertmedicine.php'">Select Medicine</button> <br>
</body>
</html>
