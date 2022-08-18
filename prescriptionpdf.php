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
$pdf->Image('pres.png',50,0, 'C');
$pdf->Cell(0,50,'',0,1,'C');
$pdf->Cell(0,0,'Welcome to Online Prescription Generator',0,1, 'C');

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
            $pdf->Cell(0,20,"Prescribed by: $doctorname ",0,0, 'C');
            $pdf->Ln();
            //echo "Prescribed by: $doctorname .<br>";

            $patientid = $row["prescribedto"];
            $sql = "SELECT name from patientinfo where id = '$patientid'";
            $res = mysqli_query($conn, $sql);
            $patientrow = mysqli_fetch_assoc($res);
            $patientname = $patientrow["name"];
            $pdf->Cell(0,5,"Prescribed to: $patientname " ,0,0, 'C');
            $pdf->Ln();
            //echo "Prescribed To: " . $patientname . "<br>";

            $med1id = $row["med1"];
            $sql = "SELECT name, instruction from medicines where id = '$med1id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med1row = mysqli_fetch_assoc($res);
                $med1 = $med1row["name"];
                $med1Ins = $med1row["instruction"];
                $pdf->Cell(80,20,"Medicine 1: $med1 ",0,0);
                $pdf->Cell(40,20,"Instruction: $med1Ins ",0,0);
                $pdf->Ln();
                //echo "Medicine 1: " . $med1 . "<br>";
            }
            

            $med2id = $row["med2"];
            $sql = "SELECT name, instruction from medicines where id = '$med2id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med2row = mysqli_fetch_assoc($res);
                $med2 = $med2row["name"];
                $med2Ins = $med2row["instruction"];
                $pdf->Cell(80,20,"Medicine 2: $med2 ");
                $pdf->Cell(40,20,"Instruction: $med2Ins ");
                $pdf->Ln();
                //echo "Medicine 2: " . $med2 . "<br>";
            }

            $med3id = $row["med3"];
            $sql = "SELECT name, instruction from medicines where id = '$med3id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med3row = mysqli_fetch_assoc($res);
                $med3 = $med3row["name"];
                $med3Ins = $med3row["instruction"];
                $pdf->Cell(80,20,"Medicine 3: $med3 ");
                $pdf->Cell(40,20,"Instruction: $med3Ins ");
                $pdf->Ln();
                //echo "Medicine 3: " . $med3 . "<br>";
            }


            $med4id = $row["med4"];
            $sql = "SELECT name, instruction from medicines where id = '$med4id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med4row = mysqli_fetch_assoc($res);
                $med4 = $med4row["name"];
                $med4Ins = $med4row["instruction"];
                $pdf->Cell(80,20,"Medicine 4: $med4 ");
                $pdf->Cell(40,20,"Instruction: $med4Ins ");
                $pdf->Ln();
                //echo "Medicine 4: " . $med4 . "<br>";
            }


            $med5id = $row["med5"];
            $sql = "SELECT name, instruction from medicines where id = '$med5id'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $med5row = mysqli_fetch_assoc($res);
                $med5 = $med5row["name"];
                $med5Ins = $med5row["instruction"];
                $pdf->Cell(80,20,"Medicine 5: $med5 ");
                $pdf->Cell(40,20,"Instruction: $med5Ins ");
                $pdf->Ln();
                //echo "Medicine 5: " . $med5 . "<br>";
            }
        }
    }

$pdf->Output();
?>