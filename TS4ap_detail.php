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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!--style-->
    <link rel="stylesheet" href="css/style.css">
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="icon" href="img/tab_logo.png">
    <title>รายละเอียดผู้ป่วย (นัดหมาย)</title>
</head>

<body>

    <!--connect-->
    <?php
    require('conn_db.php');
    ?>

    <!--navbar-->
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
                        <a href="TS4ap_tb.php" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                            ย้อนกลับ
                        </a>
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

    <!--left-->
    <div class="row">
        <!------------------------------php------------------------------>
        <?php 
            $patientID=$_GET['patient_id'];
            $appointmentID=$_GET['ap_id'];

            $sql = "SELECT * FROM patient WHERE patient_id = $patientID";
            $query = mysqli_query($conn,$sql);
            $objResult1 = mysqli_fetch_array($query);
            $patient_id = $objResult1['Patient_id'];
            //Age calculating
            $dateofbirth = $objResult1["Patient_DOB"];
            $today = date("Y-m-d");
            $age = date_diff(date_create($dateofbirth), date_create($today));
        ?>
        <!--------------------------------------------------------------->

        <div class="col-lg-3 leftbar">
            <h3 class="mb-4 mt-4 px-5 text-start">ประวัติผู้ป่วย</h3>
            <h6 class="mb-4 px-5 text-start">เลขประจำตัวผู้ป่วย : <?php echo $objResult1["Patient_id"]?></h6>
            <h6 class="mb-4 px-5 text-start">ชื่อ : <?php echo $objResult1["Patient_name"]?></h6>
            <h6 class="mb-4 px-5 text-start">นามสกุล : <?php echo $objResult1["Patient_sname"]?></h6>
            <h6 class="mb-4 px-5 text-start">เพศ : <?php echo $objResult1["Patient_gender"]?></h6>
            <h6 class="mb-4 px-5 text-start">อายุ : <?php echo $age->format("%y") ?></h6>
            <h6 class="mb-4 px-5 text-start">เบอร์ติดต่อ : <?php echo $objResult1["Patient_TelNo"]?></h6>
        </div>

        <!--right-->
        <!------------------------------php------------------------------>
        <?php
            $sql = "SELECT * FROM appointment WHERE ap_id = $appointmentID";
            $query = mysqli_query($conn,$sql);
            $objResult2 = mysqli_fetch_array($query);
        ?>
        <!--------------------------------------------------------------->

        <div class="col-lg-9 table-wrapper-scroll-y3 my-custom-scrollbar3">
            <h3 class="mb-3 mt-4 px-4 text-start">การนัดหมาย</h3>
            <div class="row">
                <div class="col-lg-6 text-start">
                    <h6 class="mb-3 px-4 text-start">หมายเลขนัด : <?php echo $objResult2["AP_id"]?></h6>
                </div>
                <div class="col-lg-6 text-start">
                </div>
            </div>
            <h6 class="mb-3 px-4 text-start">วันที่ทำนัดหมาย : <?php echo $objResult2["AP_create"]?></h6>
            <h6 class="mb-3 px-4 text-start">วันนัดหมาย : <?php echo $objResult2["AP_date"]?></h6>
            <!------------------------------php------------------------------>
            <?php
                $dpID = $objResult2["DP_id"];
                $sql = "SELECT * FROM department WHERE dp_id = $dpID";
                $query = mysqli_query($conn,$sql);
                $objResult3 = mysqli_fetch_array($query);
            ?>
            <!--------------------------------------------------------------->
            <h6 class="mb-3 px-4 text-start">แผนก : <?php echo $objResult3["DP_name"]?></h6>
            <!------------------------------php------------------------------>
            <?php
                $opdID = $objResult2["OPDold_id"];
                $sql = "SELECT * FROM opd WHERE opd_id = $opdID";
                $query = mysqli_query($conn,$sql);
                $objResult4 = mysqli_fetch_array($query);
            ?>
            <!--------------------------------------------------------------->
            <h6 class="mb-3 px-4 text-start">นัดหมายเนื่องด้วยอาการ : <?php echo $objResult4["OPD_symptoms"]?></h6>

            <h3 class="mb-3 mt-0 px-4 text-start">ความดันโลหิต</h3>
            <div class="row">
                <div class="col-lg-4">
                    <h6 class="mb-3 px-4 text-start">วันที่ : <?php echo $objResult2["AP_date"]?></h6>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3 px-4 text-start">Systolic : <input type="text" id="#" placeholder=""></h6>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3 px-4 text-start">Diastolic : <input type="text" id="#" placeholder=""></h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <h6 class="mb-3 ms-4 text-start">Mean arterial : <input type="text" id="#"
                            placeholder=""></textarea>
                    </h6>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3 ms-4 text-start">Pulse rate : <input type="text" id="#" placeholder=""></textarea>
                    </h6>
                </div>
            </div>
            <h3 class="mb-3 mt-4 px-4 text-start">น้ำหนักและส่วนสูง</h3>
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="mb-3 px-4 text-start">น้ำหนัก (กก.) : <input type="text" id="#" placeholder=""></h6>
                </div>
                <div class="col-lg-6">
                    <h6 class="mb-3 px-4 text-start">ส่วนสูง (ซม.) : <input type="text" id="#" placeholder=""></h6>
                </div>
            </div>
            <h6 class="col-lg-11 mb-3 ms-4 text-start">รายละเอียดการรักษา : <textarea class="form-control" rows="1"
                    id="comment"></textarea></h6>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-1">
                        <div class="col-lg-12 mb-4 text-center">
                            <form name="formma" method="post" action="TS4_update.php?ap_id=<?=$appointmentID?>&status=1&Patient_id=<?=$patient_id?>">
                                <input type="submit" name="submitma" value="มา" class="btn btn-light btn_plearn"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>