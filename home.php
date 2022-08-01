
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
    <button onclick="window.location.href='insertmedicine.php'">Select Medicine</button> <br><br><br>

    <h1>Medicine List</h1>

    <?php
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "onlineprescription";
    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * from medicines";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $num = 1;
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Number</th>";
        echo "<th>Medicine Name</th>";
        echo "<th>Medicine Indication</th>";
        echo "<th>Medicine Usage</th>";
        echo "<th>Medicine Instruction</th>";
        echo "<th>Edit</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>".$num."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["indication"]."</td>";
            echo "<td>".$row["usages"]."</td>";
            echo "<td>".$row["instruction"]."</td>";
            echo "<td><a href='editmedicine.php?id=".$row["id"]."'>Edit</a></td>";
            echo "</tr>";
            $num++;
        }
        echo "</table>";
        
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    ?>

</body>
</html>
