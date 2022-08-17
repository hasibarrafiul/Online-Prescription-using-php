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
?>
<html>
<head>
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
</style>
</head>
<body>

<div class="position-absolute top-50 start-50 translate-middle">
<div class="p-3 mb-2 bg-dark text-white rounded">
<h1>Prescribe</h1>
<form method="POST">
    Medicine 1:
    <?php
    $sql = "SELECT id, name from medicines";
    $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<select name='medicine1'>";
            echo "<option value=''>Select Medicine</option>";
            while($row = mysqli_fetch_assoc($res)) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
            echo "</select>";
        } else {
            echo "No user found";
        }

    echo "<br>";
    ?>
    Medicine 2:
    <?php
    $sql = "SELECT id, name from medicines";
    $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<select name='medicine2'>";
            echo "<option value=''>Select Medicine</option>";
            while($row = mysqli_fetch_assoc($res)) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
            echo "</select>";
        } else {
            echo "No user found";
        }

    echo "<br>";
    ?>
    Medicine 3:
    <?php
    $sql = "SELECT id, name from medicines";
    $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<select name='medicine3'>";
            echo "<option value=''>Select Medicine</option>";
            while($row = mysqli_fetch_assoc($res)) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
            echo "</select>";
        } else {
            echo "No user found";
        }

    echo "<br>";
    ?>
    Medicine 4:
    <?php
    $sql = "SELECT id, name from medicines";
    $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<select name='medicine4'>";
            echo "<option value=''>Select Medicine</option>";
            while($row = mysqli_fetch_assoc($res)) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
            echo "</select>";
        } else {
            echo "No user found";
        }

    echo "<br>";
    ?>
    Medicine 5:
    <?php
    $sql = "SELECT id, name from medicines";
    $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<select name='medicine5'>";
            echo "<option value=''>Select Medicine</option>";
            while($row = mysqli_fetch_assoc($res)) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
            echo "</select>";
        } else {
            echo "No user found";
        }

    echo "<br>";
    ?>

<button type="submit" name="submit" class="btn btn-outline-light">Submit</button>
</form>
</div>
</div>
<script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php

if(isset($_POST['submit'])){
    $doctorid = $_SESSION["doctorid"];
    $patientid = $_GET['id'];
    $med1 = $_POST['medicine1'];
    $med2 = $_POST['medicine2'];
    $med3 = $_POST['medicine3'];
    $med4 = $_POST['medicine4'];
    $med5 = $_POST['medicine5'];

    $sql = "INSERT INTO prescribedmedicines (prescribedby, prescribedto, med1, med2, med3, med4, med5) VALUES ('$doctorid', '$patientid', '$med1', '$med2', '$med3', '$med4', '$med5')";
    if (mysqli_query($conn, $sql)) {
        echo "Precription Added Successfully";
        header('location:home.php');
        } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
       
    }
mysqli_close($conn);
?>

