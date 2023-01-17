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
                        <a href="home_registrator.php" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                            กลับหน้าหลัก
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
    <div class="col-xx1">
        <div class="container text-center mt-4">
            <div class="div">
                <h3 class="mb-4">ข้อมูลผู้ป่วย</h3>
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
                $sql = "SELECT * FROM patient WHERE 1 = 1";
                $query = mysqli_query($conn, $sql);
                while($data = mysqli_fetch_assoc($query)) {
                ?>
              <tr>
                <td><?=$data['Patient_id']?></td>
                <td><?=$data['Patient_name']?></td>
                <td><?=$data['Patient_sname']?></td>
                <td>-</td>
                <td>
                    <?php
                    $patient_id = $data['Patient_id'];
                    $now_date = date("Y-m-d");
                    $sql1 = "SELECT * FROM OPD WHERE Patient_id = $patient_id AND OPD_active_status = 1";
                    $query1 = mysqli_query($conn, $sql1);
                    if(mysqli_num_rows($query1) == 0) {
                        ?>
                        <a href="general_patient_detail.php?patient_id=<?=$data['Patient_id']?>">รับเข้ารักษา</a>
                        <?php
                    } else {
                        ?>
                        <p>อยู่ในการรักษา</p>
                        <?php
                    }
                    ?>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
        </table>
    </div>

</body>
</html>