<html>
<body>
    <table>
        <tr>
            <td>
                    
                    <div class="leftside-menu menuitem-active">
                <div class="h-100 show" id="leftside-menu-container" data-simplebar="init">
                    <ul class="side-nav">
                    <li class="side-nav-title side-nav-item">
                    <?php
                        session_start();
                        $loggedin = $_SESSION['logedin'];
                        if($loggedin == 'true'){
                            echo "Welcome <br>".$_SESSION['username']. '<br><br>';
                        }
                        else{
                            header('location:login.php');
                        }
                        ?>
                        </li>
                        <li class="side-nav-title side-nav-item">
                            <a href="createprofile.php">
                                <span class="menu-title">User Profile</span> </a>
                        </li>
                        <li class="side-nav-title side-nav-item">
                            <a href="insertmedicine.php">
                                <span class="menu-title">Add Medicine</span> </a>
                        </li>
                        <li class="side-nav-title side-nav-item">
                            <a href="insertpatient.php">
                                <span class="menu-title">Add Patient</span> </a>
                        </li>
                        <li class="side-nav-title side-nav-item">
                            <a href="login.php">
                                <span class="menu-title">Logout</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
            </td>

            <td>
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
                        echo "<th>Delete</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>";
                            echo "<td>".$num."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["indication"]."</td>";
                            echo "<td>".$row["usages"]."</td>";
                            echo "<td>".$row["instruction"]."</td>";
                            echo "<td><a href='editmedicine.php?id=".$row["id"]."'>Edit</a></td>";
                            echo "<td><a href='deletemedicine.php?id=".$row["id"]."'>Delete</a></td>";
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
                        echo "<table border='1'>";
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
                            echo "<td><a href='editpatient.php?id=".$row["id"]."'>Edit</a></td>";
                            echo "<td><a href='deletepatient.php?id=".$row["id"]."'>Delete</a></td>";
                            $patientid = $row["id"];
                            $sql2 = "SELECT * from prescribedmedicines where prescribedto = '$patientid'";
                            $res2 = mysqli_query($conn, $sql2);
                                if (mysqli_num_rows($res2) > 0) {
                                    echo "<td><a href='deleteprescription.php?id=".$row["id"]."'>Delete Prescription</a></td>";
                                    } else {
                                        echo "<td><a href='prescribemed.php?id=".$row["id"]."'>Prescribe Medicine</a></td>";
                                    }
                            echo "<td><a href='viewprescription.php?id=".$row["id"]."'>View Prescribtion</a></td>";
                            echo "</tr>";
                            $num++;
                        }
                        echo "</table>";
                        
                    } else {
                        echo "0 results";
                    }
                    mysqli_close($conn);
                    ?>

            </td>
        </tr>
    </table>
    

    
</body>
</html>
