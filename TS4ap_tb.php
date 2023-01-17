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
    <!--ปฎิทิน-->
    <link href="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/css/datepicker3.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/js/locales/bootstrap-datepicker.th.js">
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="icon" href="img/tab_logo.png">
    <title>ข้อมูลการนัดหมาย</title>
</head>

<body>

    <?php
    require('conn_db.php');
    ?>

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
                <h3 class="mb-4">ข้อมูลการนัดหมาย</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="container">
                <div class="div">
                    <h6 class="mb-4 text-end">วัน เดือน ปีที่นัดหมาย : <input name="datepicker" class="datepicker" />
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="container">
                <div class="div">
                    <h6 class="mb-4 text-start">เลขประจำตัวผู้ป่วย : <input type="text" id="#" placeholder="้ค้นหา">
                        <button type="button" class="btn btn-light ms-5">ค้นหา</button>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="table-wrapper-scroll-y1 my-custom-scrollbar1 container text-center mt-2 px-5">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="tab">
                    <th scope="col" style="width: 15%">หมายเลขนัด</th>
                    <th scope="col" style="width: 15%">วันนัดหมาย</th>
                    <th scope="col" style="width: 25%">ชื่อ</th>
                    <th scope="col" style="width: 25%">นามสกุล</th>
                    <th scope="col" style="width: 20%">รายละเอียดผู้ป่วย</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="SELECT p.patient_name, p.patient_sname, a.ap_id, a.ap_date, p.patient_id FROM appointment a inner join opd o on o.opd_id = a.opdold_id and a.ap_status = 0 inner join patient p on p.patient_id = o.patient_id ORDER BY a.ap_date";
                $query = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query) > 0) {
                while($objResult = mysqli_fetch_array($query)){ 
                ?>
                <tr>
                    <td><?php echo $objResult["ap_id"]?></td>
                    <td><?php echo $objResult["ap_date"]?></td>
                    <td><?php echo $objResult["patient_name"]?></td>
                    <td><?php echo $objResult["patient_sname"]?></td>
                    <td><a href="TS4ap_detail.php?patient_id=<?php echo $objResult['patient_id']?>&amp;ap_id=<?php echo $objResult['ap_id']?>"
                            class="">ดูรายละเอียด</a></td>
                </tr>

                <?php
                    }
                } else {
                    ?>
                <?php
                }
                    ?>
            </tbody>
        </table>
        <?php
mysqli_close($conn);
?>
    </div>

</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    $.fn.datepicker.defaults.language = 'th';
    $('.datepicker').datepicker();
});
</script>