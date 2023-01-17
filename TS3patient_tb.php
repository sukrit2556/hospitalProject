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
    <title>ข้อมูลผู้ป่วย</title>
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
                        <a href="TS3patient_tb.html" class="nav-link">ข้อมูลผู้ป่วย</a>
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
                    $sql_doctor = "SELECT * FROM doctor WHERE Doctor_id = '$id'";
                    $data = mysqli_fetch_assoc(mysqli_query($conn, $sql_doctor));
                    ?>
                    <ul class="navbar-nav ms-right">
                        <li class="nav-item">
                            <a href="TS3patient_tb.html" class="nav-link"><?=$data['Doctor_name']." ".$data['Doctor_sname']?></a>
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
                <h3 class="mb-4">ข้อมูลผู้ป่วยที่รอรับการตรวจ</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="div">
                    <h6 class="mb-4 text-center">เลขประจำตัวผู้ป่วย : <input type="text" id="#" placeholder="ค้นหา"> <button type="button" class="btn btn-light">ค้นหา</button></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="table-wrapper-scroll-y1 my-custom-scrollbar1 container text-center mt-2 px-5">
        <table class="table table-striped table-bordered">
            <thead>
              <tr class="tab">
                <th scope="col" style="width: 20%">เลขประจำตัวผู้ป่วย</th>
                <th scope="col" style="width: 25%">ชื่อ</th>
                <th scope="col" style="width: 25%">นามสกุล</th>
                <th scope="col" style="width: 10%">สถานะ</th>
                <th scope="col" style="width: 20%">รายละเอียดผู้ป่วย</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $sql_select_all_treatment = "SELECT * FROM opd_treatment WHERE TM_status = 0 AND DP_now = (SELECT Doctor_DP FROM doctor WHERE Doctor_id = '".$_SESSION['id']."')";
                $select_all_treatment_query = mysqli_query($conn, $sql_select_all_treatment);
                if(mysqli_num_rows($select_all_treatment_query) > 0) {
                    while($data_from_opdtreatment = mysqli_fetch_assoc($select_all_treatment_query)) {
                        $opd_id = $data_from_opdtreatment['opd_id'];
                        $sql_select_patient_data = "SELECT * FROM patient WHERE Patient_id = (SELECT Patient_id FROM opd WHERE OPD_id = '$opd_id' AND OPD_active_status)";
                        $patient_info = mysqli_fetch_assoc(mysqli_query($conn, $sql_select_patient_data));
                        ?>
                        <tr>
                            <th scope="row"><?=$patient_info['Patient_id']?></th>
                            <td><?=$patient_info['Patient_name']?></td>
                            <td><?=$patient_info['Patient_sname']?></td>
                            <td>รอรับการรักษา</td>
                            <td><a href="TS3patient_4doc.php?opd_id=<?=$opd_id?>&tm=<?=$data_from_opdtreatment['TM_id']?>">ดูรายละเอียด</a></td>
                        </tr>
                        <?php
                    }
                }
                else {
                    ?>
                    <tr>
                        <td colspan="5">No data</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>