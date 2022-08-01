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

require('pdfgen/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Welcome to Online Prescription Generator');

$prpid = $_GET['id'];
$sql = "SELECT * from prescribedmedicines where id = '$prpid'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    
    while($row = mysqli_fetch_assoc($res)) {
            $doctorid = $row["prescribedby"];
            $doctornamesql = "SELECT username from users where id = '$doctorid'";
            $doctornameres = mysqli_query($conn, $doctornamesql);
            $doctornamerow = mysqli_fetch_assoc($doctornameres);
            $doctorname = $doctornamerow["username"];
            $pdf->Cell(40,20,"Prescribed by: $doctorname ");
            //echo "Prescribed by: $doctorname .<br>";

            $patientid = $row["prescribedto"];
            $sql = "SELECT name from patientinfo where id = '$patientid'";
            $res = mysqli_query($conn, $sql);
            $patientrow = mysqli_fetch_assoc($res);
            $patientname = $patientrow["name"];
            $pdf->Cell(40,30,"Prescribed to: $patientname ");
            //echo "Prescribed To: " . $patientname . "<br>";

            $med1id = $row["med1"];
            $sql = "SELECT name from medicines where id = '$med1id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med1row = mysqli_fetch_assoc($res);
                $med1 = $med1row["name"];
                $pdf->Cell(40,40,"Medicine 1: $med1 ");
                //echo "Medicine 1: " . $med1 . "<br>";
            }
            

            $med2id = $row["med2"];
            $sql = "SELECT name from medicines where id = '$med2id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med2row = mysqli_fetch_assoc($res);
                $med2 = $med2row["name"];
                $pdf->Cell(40,50,"Medicine 2: $med2 ");
                //echo "Medicine 2: " . $med2 . "<br>";
            }

            $med3id = $row["med3"];
            $sql = "SELECT name from medicines where id = '$med3id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med3row = mysqli_fetch_assoc($res);
                $med3 = $med3row["name"];
                $pdf->Cell(40,60,"Medicine 3: $med3 ");
                //echo "Medicine 3: " . $med3 . "<br>";
            }


            $med4id = $row["med4"];
            $sql = "SELECT name from medicines where id = '$med4id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med4row = mysqli_fetch_assoc($res);
                $med4 = $med4row["name"];
                $pdf->Cell(40,70,"Medicine 4: $med4 ");
                //echo "Medicine 4: " . $med4 . "<br>";
            }


            $med5id = $row["med5"];
            $sql = "SELECT name from medicines where id = '$med5id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med5row = mysqli_fetch_assoc($res);
                $med5 = $med5row["name"];
                $pdf->Cell(40,80,"Medicine 5: $med5 ");
                //echo "Medicine 5: " . $med5 . "<br>";
            }
        }
    }

$pdf->Output();
?>