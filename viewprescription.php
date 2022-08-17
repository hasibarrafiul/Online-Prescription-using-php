<?php
session_start();
$loggedin = $_SESSION['logedin'];
if($loggedin == 'true'){
}
else{
    header('location:login.php');
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

    $prescribedto = $_GET['id'];
    $sql = "SELECT * from prescribedmedicines where prescribedto = '$prescribedto'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($res)) {
                $doctorid = $row["prescribedby"];
                $doctornamesql = "SELECT username from users where id = '$doctorid'";
                $doctornameres = mysqli_query($conn, $doctornamesql);
                $doctornamerow = mysqli_fetch_assoc($doctornameres);
                $doctorname = $doctornamerow["username"];
                echo "Prescribed by: $doctorname <br>";

                $patientid = $row["prescribedto"];
                $sql = "SELECT name from patientinfo where id = '$patientid'";
                $res = mysqli_query($conn, $sql);
                $patientrow = mysqli_fetch_assoc($res);
                $patientname = $patientrow["name"];
                echo "Prescribed To: " . $patientname . "<br>";

                $med1id = $row["med1"];
                $sql = "SELECT name from medicines where id = '$med1id'";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $med1row = mysqli_fetch_assoc($res);
                    $med1 = $med1row["name"];
                    echo "Medicine 1: " . $med1 . "<br>";
                }
                

                $med2id = $row["med2"];
                $sql = "SELECT name from medicines where id = '$med2id'";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $med2row = mysqli_fetch_assoc($res);
                    $med2 = $med2row["name"];
                    echo "Medicine 2: " . $med2 . "<br>";
                }

                $med3id = $row["med3"];
                $sql = "SELECT name from medicines where id = '$med3id'";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $med3row = mysqli_fetch_assoc($res);
                    $med3 = $med3row["name"];
                    echo "Medicine 3: " . $med3 . "<br>";
                }


                $med4id = $row["med4"];
                $sql = "SELECT name from medicines where id = '$med4id'";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $med4row = mysqli_fetch_assoc($res);
                    $med4 = $med4row["name"];
                    echo "Medicine 4: " . $med4 . "<br>";
                }


                $med5id = $row["med5"];
                $sql = "SELECT name from medicines where id = '$med5id'";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $med5row = mysqli_fetch_assoc($res);
                    $med5 = $med5row["name"];
                    echo "Medicine 5: " . $med5 . "<br>";
                }

                echo "<br>";
                echo "<td><a href='prescriptionpdf.php?id=".$row["id"]."'>Download Prescription</a></td>";
            }

            
           
        }
     else {
        echo "No prescriptions found";
    }
mysqli_close($conn);
?>
</div>
</div>
<script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
