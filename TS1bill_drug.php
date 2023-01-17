
<?php
include("conn_db.php");
session_start();
if(!isset($_SESSION['username'])){
?>
	<script>alert("Please login");
	window.location="index.html"</script>
<?php
}
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--style-->
    <link rel="stylesheet" href="css/style.css">
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="icon" href="img/tab_logo.png">
    <title>รายละเอียดการชำระค่ายา</title>
</head>
<body>
<?php 
require("conn_db.php");
$bill_no=$_GET['bill_no'];
$patient_id = $_GET['patient_id'];
$opd_id = $_GET['opd_id'];
$sql1 = "select * from prescription p inner join drug d on bill_no = $bill_no and d.drug_id = p.drug_id;";
$sql2 = "select * from patient where patient_id = $patient_id";
$drug_detail = mysqli_query($conn,$sql1) or die("Error".$sql1);
$patient = mysqli_query($conn,$sql2) or die("Error".$sql2);
$patientResult = mysqli_fetch_array($patient);
$sql3 = "select sum(d.Drug_price * p.Pre_dose) as total from drug d inner join prescription p on d.Drug_id = p.Drug_id and p.bill_no = $bill_no;";
$total = mysqli_query($conn,$sql3) or die("Error".$sql3);
$price = mysqli_fetch_array($total);
?>
<div>
    <div>
        <nav class="nave navbar-expand-lg navbar-dark">
            <div class="container">
                <i class="fa fa-heartbeat" style="font-size:24px;color:white"></i>
                <a href="index.html" class="navbar-brand">โรงพยาบาลโควิดกระจอก<br>CovidKraJokHealthCare.cpe.ac.th</a>
            </div>
        </nav>
        <nav class="navebar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarDropdownMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarDropdownMenu" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-right">
                        <li class="nav-item">
                            <a href="TS1bill_tb.php" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                </svg>
                                กลับหน้าหลัก
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle" id="navdarDropdownMenu" data-bs-toggle="dropdown">สื่อสารการติดต่อ</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                                <li><a href="#" class="dropdown-item">เกี่ยวกับเรา</a></li>
                                <li><a href="#" class="dropdown-item">ติดตามข่าวสาร</a></li>
                                <li><a href="#" class="dropdown-item">ติดต่อเรา</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ms-auto d-flex flex-row justify-content-center">
                        <?php
                        $sql_doctor = "SELECT * FROM employee WHERE Employee_id = '$id'";
                        $data = mysqli_fetch_assoc(mysqli_query($conn, $sql_doctor));
                        ?>
                        <ul class="navbar-nav ms-right">
                            <li class="nav-item">
                                <a href="TS3patient_tb.html" class="nav-link"><?=$data['Employee_name']." ".$data['Employee_sname']?></a>
                            </li>
                        </ul>
                        <a href="logout.php" class="nav-link logout-btn">logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="col-xx1">
            <div class="container text-center mt-4">
                <div class="div">
                    <h3 class="mb-4">รายละเอียดการชำระค่ายา</h3>
                </div>
            </div>
        </div>
        <h6 class="container ms-5 mb-4 text-start">เลขที่ใบเสร็จ : <?php echo $bill_no?> </h6>
        <h6 class="container ms-5 mb-4 text-start">รายละเอียดผู้ป่วย</h6>
        <div class="row">
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">ชื่อ : <?php echo $patientResult['Patient_name']?> </h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">นามสกุล : <?php echo $patientResult['Patient_sname']?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">เลขประจำตัวผู้ป่วย: <?php echo $patient_id ?>  </h6>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="container ms-5 mb-4 text-start">ยาที่ได้รับ</h6>
        <div class="container text-center px-5">
            <table class="table-wrapper-scroll-y4 my-custom-scrollbar4  table table-borderless ">
                <thead>
                    <tr>
                    <th scope="col" style="width: 30%">เลขประจำยา</th>
                    <th scope="col" style="width: 30%">ชื่อยา</th>
                    <th scope="col" style="width: 20%">จำนวน</th>
                    <th scope="col" style="width: 20%">ราคา</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 $i =1;
                 while($objResult = mysqli_fetch_array($drug_detail))
                 {?> 
                    <tr>
                    <td scope="row"><?php echo $objResult["Drug_id"];?></td>
                    <td><?php echo $objResult["Drug_name"];?></td>
                    <td><?php echo $objResult["Pre_dose"];?></td>
                    <td><?php echo $objResult["Pre_dose"] * $objResult["Drug_price"];?></td>
                    <td></td>
                    <td></td>
                    </tr>
                    <?php $i++;
        }
         ?>
                </tbody>
            </table>
        </div>
        <h6 class="container ms-5 mb-4 text-center">ราคารวมค่ายา :  <?php echo $price['total']?> บาท </h6>
        <div class="text-center mb-4">
            <a href="TS1bill_all.php?bill_no=<?php echo $bill_no?>&amp;patient_id=<?php echo $patient_id ?>&amp;opd_id=<?php echo $opd_id ?>" class= nav-link><button type="button" class="btn btn_plearn btn-light">ต่อไป</button></a>
        </div>
    </div>


</body>
</html>