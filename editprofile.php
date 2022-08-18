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
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

        $username = $_SESSION['username'];
        $sql2 = "SELECT * from profile where username = '$username'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $name = $row2["name"];
        $email = $row2["email"];
        $phonenumber = $row2["phonenumber"];
        $specialist = $row2["specialist"];
        $address = $row2["address"];
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
<form method="post" enctype="multipart/form-data">
<h1 align="center">Edit Profile</h1>
    <table class="table table-dark table-hover">
        <tr>
            <td>
            <div class="form-floating">
            <input type="text" name="name" size="20" maxlength="40" class="form-control" id="floatingInput" placeholder="Name" value="<?php echo $name?>"/>
            <label for="floatingInput" class="text-dark">Name</label>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-floating">
            <input type="text" name="email" size="20" maxlength="40" class="form-control" id="floatingInput" placeholder="Email" value="<?php echo $email?>"/>
            <label for="floatingInput" class="text-dark">Email</label>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-floating">
            <input type="number" name="phonenumber" size="20" maxlength="40" class="form-control" id="floatingInput" placeholder="Phonenumber" value="<?php echo $phonenumber?>"/>
            <label for="floatingInput" class="text-dark">Phonenumber</label>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-floating">
            <input type="text" name="specialist" size="20" maxlength="40" class="form-control" id="floatingInput" placeholder="Specialist" value="<?php echo $specialist?>"/>
            <label for="floatingInput" class="text-dark">Specialist</label>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-floating">
            <input type="text" name="address" size="40" maxlength="100" class="form-control" id="floatingInput" placeholder="Address" value="<?php echo $address?>"/>
            <label for="floatingInput" class="text-dark">Address</label>
            </div>    
        </td>
        </tr>
        <tr>
            <td>
            <input type="file" name="file" size="20" maxlength="20" class="form-control" id="floatingInput"/>
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


<?php
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    echo "hello";
    $username = $_SESSION['username'];
    $dir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $path = $dir . $username . $fileName;
    $type = pathinfo($path,PATHINFO_EXTENSION);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $specialist = $_POST['specialist'];
    $address = $_POST['address'];
    $allowed = array('jpg','png','jpeg','gif','pdf');
    if(in_array($type, $allowed)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $path)){
            $insert = "UPDATE profile SET name='$name', email='$email', phonenumber='$phonenumber', specialist='$specialist', address='$address', file_name='$fileName' WHERE username='$username'";
            $res = mysqli_query($conn, $insert);
            if($insert){
                echo "Profile Updated";
                header('location:userprofile.php');
            }else{
                echo "";
            } 
        }else{
            echo "";
        }
    }else{
        echo "Unsupported file type";
    }
}else{
    echo "";
}


if(isset($_POST["submit"]) && empty($_FILES["file"]["name"])){
    $username = $_SESSION['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $specialist = $_POST['specialist'];
    $address = $_POST['address'];
            $insert = "UPDATE profile SET name='$name', email='$email', phonenumber='$phonenumber', specialist='$specialist', address='$address' WHERE username='$username'";
            $res = mysqli_query($conn, $insert);
            if($insert){
                echo "Profile Updated";
                header('location:userprofile.php');
            }else{
                echo "";
            } 
        }
        else{
            echo "";
        }

?>


<php
mysqli_close($conn);
?>