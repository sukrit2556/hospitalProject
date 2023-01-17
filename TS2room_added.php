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
    <title>เพิ่มข้อมูลเตียงผู้ป่วย</title>
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
                <a href="TS2room_tb.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                    กลับหน้าหลัก
                </a>
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
    <!--เลขห้อง-->
        <?php
        isset( $_GET['Room_id'] ) ? $Room_id = $_GET['Room_id'] : $Room_id = "";
        $sql1 = "SELECT * FROM room WHERE Room_id = '$Room_id'";
        $query1 = mysqli_query($conn, $sql1);
        $data1 = mysqli_fetch_assoc($query1);
        $Room_id = $data1['Room_id'];
        ?>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="container text-center mt-4">
                    <div class="div">
                        <h3 class="mb-4">ข้อมูลห้องหมายเลข <?=$data1['Room_id']?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3 mt-1">
                <div class="me-1" id="liveAlertPlaceholder"></div>
            </div>
        </div>
        <h6 class="container ms-5 mb-4 text-start">รายละเอียดผู้ป่วย</h6>
        <?php
            $room = $data1['Room_id'];
            $sql = "SELECT * from patient p inner join ipd i on(p.patient_id = i.patient_id and i.ipd_status = 0) inner join room r on i.room_id = $room ";
            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($query);
        ?>
            <div class="row">
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">ชื่อ : <?=$data['Patient_prefix']." ".$data['Patient_name']?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">นามสกุล : <?=$data['Patient_sname']?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">วัน เดือน ปีเกิด : <?=$data['Patient_DOB']?></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <?php if($data['Patient_gender']=='F') {?>
                            <h6 class="mb-4 text-start">เพศ : หญิง</h6>
                        <?php } else if($data['Patient_gender']=='M') {?>
                            <h6 class="mb-4 text-start">เพศ : ชาย</h6>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">เลขประจำตัวผู้ป่วย : <?=$data['Patient_id']?></h6>
                    </div>
                </div>
            </div>
        </div>
        
        <h6 class="container ms-5 mb-4 text-start">รายละเอียดการเข้าพักรักษา</h6>
        <div class="row">
            
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">อาคาร : <?=$data1['Room_building']?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">ชั้น : <?=$data1['Room_floor']?></h6>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="container ms-5">
                <div class="div">
                    <?php date_default_timezone_set("Asia/Bangkok") ?>
                    <h6 class="mb-4 text-start">วันที่ผู้ป่วยเข้า : <?=$data['IPD_date']?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="container ms-5">
                <div class="div">
                    <h6 class="mb-4 text-start">IPD ID : <?=$data['ipd_id']?></h6>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12 text-center">
            <form name="form" method="post">
            <input type="submit" name="delete" value="ลบผู้ป่วย" class="btn btn_plearn btn-light"></input>
            </form>
            <?php
                if(isset($_POST['delete'])) {
                    
                    $P_id = $data['Patient_id'];
                    $sql2 = "DELETE FROM ipd WHERE Patient_id = $P_id";
                    $sql4 = "UPDATE room SET Room_status = 1 WHERE Room_id = $room";
                    mysqli_query($conn, $sql4);
                    $query2 = mysqli_query($conn, $sql2);
                    if (mysqli_query($conn, $sql2)) {
                    ?> 
                    <script>
                        alert("ลบเรียบร้อย");
                        window.location = "TS2room_tb.php";
                    </script>
                    <?php
                    } 
                }
            ?>
            </div>
        </div>
</body>
</html>