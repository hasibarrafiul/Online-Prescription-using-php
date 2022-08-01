<?php
session_start();
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "onlineprescription";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<h1>Prescribe</h1>
<form method="POST">
    Medicine 1:
    <?php
    $sql = "SELECT id, name from medicines";
    $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<select name='medicine1'>";
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
            while($row = mysqli_fetch_assoc($res)) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
            echo "</select>";
        } else {
            echo "No user found";
        }

    echo "<br>";
    ?>

<button type="submit" name="submit">Submit</button>
</form>
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
        } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
       
    }
mysqli_close($conn);
?>

