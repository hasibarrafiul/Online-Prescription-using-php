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
                echo "Prescribed by: $doctorname .<br>";

                $patientid = $row["prescribedto"];
                $sql = "SELECT name from patientinfo where id = '$patientid'";
                $res = mysqli_query($conn, $sql);
                $patientrow = mysqli_fetch_assoc($res);
                $patientname = $patientrow["name"];
                echo "Prescribed To: " . $patientname . "<br>";

                $med1id = $row["med1"];
                $sql = "SELECT name from medicines where id = '$med1id'";
                $res = mysqli_query($conn, $sql);
                $med1row = mysqli_fetch_assoc($res);
                $med1 = $med1row["name"];
                echo "Medicine 1: " . $med1 . "<br>";

                $med2id = $row["med2"];
                $sql = "SELECT name from medicines where id = '$med2id'";
                $res = mysqli_query($conn, $sql);
                $med2row = mysqli_fetch_assoc($res);
                $med2 = $med2row["name"];
                echo "Medicine 2: " . $med2 . "<br>";

                $med3id = $row["med3"];
                $sql = "SELECT name from medicines where id = '$med3id'";
                $res = mysqli_query($conn, $sql);
                $med3row = mysqli_fetch_assoc($res);
                $med3 = $med3row["name"];
                echo "Medicine 2: " . $med3 . "<br>";


                $med4id = $row["med4"];
                $sql = "SELECT name from medicines where id = '$med4id'";
                $res = mysqli_query($conn, $sql);
                $med4row = mysqli_fetch_assoc($res);
                $med4 = $med4row["name"];
                echo "Medicine 2: " . $med4 . "<br>";


                $med5id = $row["med5"];
                $sql = "SELECT name from medicines where id = '$med5id'";
                $res = mysqli_query($conn, $sql);
                $med5row = mysqli_fetch_assoc($res);
                $med5 = $med5row["name"];
                echo "Medicine 2: " . $med5 . "<br>";

            }
           
        }
     else {
        echo "No prescriptions found";
    }
    


mysqli_close($conn);
?>
