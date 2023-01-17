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
    <title>ข้อมูลส่วนตัวผู้ป่วย</title>
</head>
<body>
    
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
                        <a href="UpdateP_tb2.php" class="nav-link">
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
    <!--เลขห้อง-->
        <?php
        isset( $_GET['Patient_id'] ) ? $Patient_id = $_GET['Patient_id'] : $Patient_id = "";
        $sql1 = "SELECT * FROM patient WHERE Patient_id = '$Patient_id'";
        $query1 = mysqli_query($conn, $sql1);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="container text-center mt-4">
                        <div class="div">
                            <h3 class="mb-4">รายละเอียดผู้ป่วยเลขประจำตัว <?=$Patient_id?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="mb-4 text-start">รายละเอียดผู้ป่วย</h6>
        </div>
        <?php
            $sql = "SELECT * FROM patient WHERE Patient_id = $Patient_id";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);
        ?>
        <div class="container">
            <form name="form" method="post">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="div">
                            <h6 class="mb-4 text-start">ชื่อ : <input type="text" class="form-control form-control-sm" name="Patient_name" value="<?=$data['Patient_name']?>"></h6>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="div">
                            <h6 class="mb-4 text-start">นามสกุล : <input type="text" class="form-control form-control-sm" name="Patient_sname" value="<?=$data['Patient_sname']?>"></h6>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="div">
                            <h6 class="mb-4 text-start">วัน เดือน ปีเกิด : <input type="text" class="form-control form-control-sm" name="Patient_DOB" value="<?=$data['Patient_DOB']?>"></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="div">
                            <?php if($data['Patient_gender']=='F') {?>
                                <h6 class="mb-4 text-start">เพศ : หญิง</h6>
                            <?php } else if($data['Patient_gender']=='M') {?>
                                <h6 class="mb-4 text-start">เพศ : ชาย</h6>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="div">
                            <h6 class="mb-4 text-start">เบอร์โทรศัพท์ : <input type="text" class="form-control form-control-sm" name="Patient_TelNo" value="<?=$data['Patient_TelNo']?>"></h6>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="div">
                            <h6 class="mb-4 text-start">เลขประจำตัวผู้ป่วย : <?=$data['Patient_id']?></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="div">
                            <h6 class="mb-4 text-start">ที่อยู่: <input type="text" class="form-control form-control-sm" rows="20" name="Patient_address" value="<?=$data['Patient_address']?>"></h6>
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="col text-center">
                        <input type="submit" name="submit" value="บันทึก" class="btn btn_plearn btn-light"></input>
                    </div>
                </div>
            </form>
        </div>
</body>
<?php
                if(isset($_POST['submit'])) {
                    $Patient_tel = $_POST['Patient_TelNo'];
                    $Patient_address = $_POST['Patient_address'];
                    $Patient_DOB = $_POST['Patient_DOB'];
                    $Patient_name = $_POST['Patient_name'];
                    $Patient_sname = $_POST['Patient_sname'];
                    $Patient_id = $_GET['Patient_id'];
                    $sql4 = "UPDATE patient SET Patient_name='$Patient_name', Patient_sname='$Patient_sname', Patient_DOB='$Patient_DOB', Patient_TelNo='$Patient_tel', Patient_address='$Patient_address' WHERE Patient_id = '$Patient_id'";
                    mysqli_query($conn, $sql4);
                    if (mysqli_query($conn, $sql4)) {
                    ?> 
                    <script>
                        alert("แก้ไขข้อมูลเรียบร้อย");
                        window.location = "UpdateP_tb2.php";
                    </script>
                    <?php
                    } 
                    
                }
            ?>
</html>