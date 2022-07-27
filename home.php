<html>
<body>
    <h1>home</h1>

    <button onclick="window.location.href='login.php'">Logout</button> <br>
</body>
</html>

<?php
session_start();
$loggedin = $_SESSION['logedin'];
if($loggedin == 'true'){
    echo "Welcome ".$_SESSION['username'];
}
else{
    header('location:login.php');
}
?>

