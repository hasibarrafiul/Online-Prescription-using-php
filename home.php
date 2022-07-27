<html>
<body>
    <h1>home</h1>

    <button onclick="window.location.href='login.php'">Logout</button>
</body>
</html>

<?php
session_start();
$loggedin = $_SESSION['logedin'];
if($loggedin == 'true'){
    //home code
}
else{
    header('location:login.php');
}
?>

