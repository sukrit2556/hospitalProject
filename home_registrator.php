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
    <title>Registrator Home</title>
</head>
<body>

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
                        <!--<li class="nav-item">
                            <a href="#" class="nav-link">รายละเอียดผู้ป่วย</a>
                        </li>-->
                        <li class="nav-item">
                            <a href="TS1bill_tb.html" class="nav-link">ประเภทผู้ป่วย</a>
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
    </div>
    <h1 class="text-center my-5">ประเภทผู้ป่วย</h1>

    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-light btn_registor" onclick="window.location.href = 'general_patient.php';" type="button">สำหรับผู้ป่วยทั่วไป</button>
        <button class="btn btn-light btn_registor" onclick="window.location.href = 'TS4ap_tb.php';" type="button">สำหรับผู้ป่วยนัด</button>
        <button class="btn btn-light btn_registor" onclick="window.location.href = 'UpdateP_tb2.php';" type="button">จัดการข้อมูลผู้ป่วย</button>
    </div>

    

</body>
</html>