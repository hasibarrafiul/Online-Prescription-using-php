<html>
<head>
<title>Home</title>
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
    <table>
        <tr>
            <td class="p-3 mb-2 bg-primary bg-gradient text-white" height="929px">
                    <div class="leftside-menu menuitem-active">
                    <div class="h-100 show" id="leftside-menu-container" data-simplebar="init">
                        <?php
                        session_start();
                        $loggedin = $_SESSION['logedin'];
                        if($loggedin == 'true'){
                            echo "<h3>Welcome, </h3> <h3>".$_SESSION['username']. ' </h3><br><br>';
                        }
                        else{
                            header('location:login.php');
                        }
                        ?>
                    
                        <br>
                        <div class="d-grid gap-2">
                        <button class="btn btn-dark" onclick="window.location.href='createprofile.php'">User Profile</button>
                        <button class="btn btn-dark" onclick="window.location.href='insertmedicine.php'">Add Medicine</button>
                        <button class="btn btn-dark" onclick="window.location.href='insertpatient.php'">Add Patient</button>
                        <button class="btn btn-danger" onclick="window.location.href='login.php'">Logout</button>
                        </div>

                </div>
            </div>
            </td>

            <td>
            <div class="position-absolute top-50 start-50 translate-middle">
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
                        echo "<table border='1' width='100%' class='table table-dark table-hover'>";
                        echo "<tr>";
                        echo "<th>Number</th>";
                        echo "<th>Medicine Name</th>";
                        echo "<th>Medicine Indication</th>";
                        echo "<th>Medicine Usage</th>";
                        echo "<th>Medicine Instruction</th>";
                        echo "<th>Edit</th>";
                        echo "<th>Delete</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>";
                            echo "<td>".$num."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["indication"]."</td>";
                            echo "<td>".$row["usages"]."</td>";
                            echo "<td>".$row["instruction"]."</td>";
                            echo "<td> <span class='border border-light rounded'><a class='link-light' href='editmedicine.php?id=".$row["id"]."'>Edit</a></span></td>";
                            echo "<td><span class='border border-light rounded'><a class='link-light' href='deletemedicine.php?id=".$row["id"]."'>Delete</a> </span></td>";
                            echo "</tr>";
                            $num++;
                        }
                        echo "</table>";
                        
                    } else {
                        echo "0 results";
                    }

                    echo "<br><br>";

                    echo "<h1>Patient List</h1>";
                    $sql = "SELECT * from patientinfo";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        $num = 1;
                        echo "<table border='1' width='100%' class='table table-dark table-hover'>";
                        echo "<tr>";
                        echo "<th>Number</th>";
                        echo "<th>Patient Name</th>";
                        echo "<th>Patient Gender</th>";
                        echo "<th>Patient Age</th>";
                        echo "<th>Patient Address</th>";
                        echo "<th>Patient number</th>";
                        echo "<th>Edit</th>";
                        echo "<th>Delete</th>";
                        echo "<th>Prescribe Medicine</th>";
                        echo "<th>View Prescription</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>";
                            echo "<td>".$num."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["gender"]."</td>";
                            echo "<td>".$row["age"]."</td>";
                            echo "<td>".$row["address"]."</td>";
                            echo "<td>".$row["number"]."</td>";
                            echo "<td><span class='border border-light rounded'><a class='link-light' href='editpatient.php?id=".$row["id"]."'>Edit</a></span></td>";
                            echo "<td><span class='border border-light rounded'><a class='link-light' href='deletepatient.php?id=".$row["id"]."'>Delete</a></span></td>";
                            $patientid = $row["id"];
                            $sql2 = "SELECT * from prescribedmedicines where prescribedto = '$patientid'";
                            $res2 = mysqli_query($conn, $sql2);
                                if (mysqli_num_rows($res2) > 0) {
                                    echo "<td><span class='border border-light rounded'><a class='link-light' href='deleteprescription.php?id=".$row["id"]."'>Delete Prescription</a></span></td>";
                                    } else {
                                        echo "<td><span class='border border-light rounded'><a class='link-light' href='prescribemed.php?id=".$row["id"]."'>Prescribe Medicine</a></span></td>";
                                    }
                            echo "<td><span class='border border-light rounded'><a class='link-light' href='viewprescription.php?id=".$row["id"]."'>View Prescribtion</a></span></td>";
                            echo "</tr>";
                            $num++;
                        }
                        echo "</table>";
                        
                    } else {
                        echo "0 results";
                    }
                    mysqli_close($conn);
                    ?>
                </div>
            </td>
        </tr>
    </table>
    

    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    
</body>
</html>
