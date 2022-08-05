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
?>

<?php
$username = $_SESSION['username'];
$sql2 = "SELECT * from profile where username = '$username'";
$res2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($res2) > 0) {
        header('location:userprofile.php');
        } 
?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="name" id="name">
    <input type="text" name="email" id="email">
    <input type="number" name="phonenumber" id="phonenumber">
    <input type="text" name="address" id="address">
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>


<?php

$dir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$path = $dir . $fileName;
$type = pathinfo($path,PATHINFO_EXTENSION);
$username = $_SESSION['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $allowed = array('jpg','png','jpeg','gif','pdf');
    if(in_array($type, $allowed)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $path)){
            $insert = "INSERT into profile (username, name, email, phonenumber, address, file_name, uploaded_on) VALUES ('$username', '$name', '$email', '$phonenumber', '$address','$fileName', NOW())";
            $res = mysqli_query($conn, $insert);
            if($insert){
                echo "Profile Added";
                header('location:userprofile.php');
            }else{
                echo "Error";
            } 
        }else{
            echo "Error";
        }
    }else{
        echo "Unsupported file type";
    }
}else{
    echo "Select an Profile picture";
}

?>


<php
mysqli_close($conn);
?>