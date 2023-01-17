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
    <script src="https://kit.fontawesome.com/46fe0cb164.js" crossorigin="anonymous"></script>
    <!--ปฎิทิน-->
    <link href="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/css/datepicker3.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/js/locales/bootstrap-datepicker.th.js">
    </script>
    <link rel="icon" href="img/tab_logo.png">
    <title>สรุปข้อมูลประจำวัน</title>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- chart1 -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'count'],
          <?php
          $sql_chart = "SELECT patient_gender, COUNT(*) AS gender_count FROM `patient` GROUP BY patient_gender";
          $query = mysqli_query($conn,$sql_chart);
          foreach($query as $query_c){
          echo "['".$query_c['patient_gender']."',".$query_c['gender_count']."],";}
          ?>
        ]);
        var options = {
        legend: 'none',
        pieSliceText: 'label',
        title: 'M: ผู้ชาย , F: ผู้หญิง',
        pieStartAngle: 100,
      };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>

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
                        <a href="admin.php" class="nav-link">
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

    <!-- start -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-2 col-xl-2 px-0 bg-light">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <!-- search bar -->
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                    <!-- menu -->
                    <a href="#" class="navbar-brand m-0" style="color:rgb(110, 110, 110)">
                        <i class="fa-solid fa-bars"></i>
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <!-- home -->
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="Advanced_4.php" class="nav-link align-middle px-0" style="color:rgb(110, 110, 110)">
                                <i class="fa-solid fa-house"></i>
                                <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Advanced_4.php" class="nav-link align-middle px-0" style="color:rgb(110, 110, 110)">
                            <i class="fa-solid fa-chart-line"></i>
                                <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Advanced_4.php" class="nav-link align-middle px-0" style="color:rgb(110, 110, 110)">
                            <i class="fa-solid fa-user-doctor"></i>
                                <span class="ms-1 d-none d-sm-inline">Doctor</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Advanced_4.php" class="nav-link align-middle px-0" style="color:rgb(110, 110, 110)">
                            <i class="fa-solid fa-user-nurse"></i>
                                <span class="ms-1 d-none d-sm-inline">Employee</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle" style="color:rgb(110, 110, 110)">
                            <i class="fa-solid fa-user"></i></i> 
                            <span class="ms-1 d-none d-sm-inline">Patient</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0" style="color:rgb(110, 110, 110)"> 
                                    <span class="d-none d-sm-inline">ข้อมูลทั้งหมด</span>
                                        </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0" style="color:rgb(110, 110, 110)"> 
                                    <span class="d-none d-sm-inline">ข้อมูลผู้ป่วยนอก</span>
                                        </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0" style="color:rgb(110, 110, 110)"> 
                                    <span class="d-none d-sm-inline">ข้อมูลผู้ป่วยใน</span>
                                        </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" style="color:rgb(110, 110, 110)">
                            <i class="fa-solid fa-angle-right"></i> 
                            <span class="ms-1 d-none d-sm-inline">General Report</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0" style="color:rgb(110, 110, 110)"> 
                                    <span class="d-none d-sm-inline">10 อันดับโรคผู้ป่วยนอก</span>
                                        </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0" style="color:rgb(110, 110, 110)"> 
                                    <span class="d-none d-sm-inline">10 อันดับโรคผู้ป่วยใน</span>
                                        </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0" style="color:rgb(110, 110, 110)"> 
                                    <span class="d-none d-sm-inline">10 อันดับโรคระบาด</span>
                                        </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>


            <!------------------------------------------------------- start ------------------------------------------------------>
            
            
            <div class="col py-3">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <div class="container mt-4">
                            <div class="div">
                                <h3 class="mb-1">สรุปข้อมูลประจำวัน</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="container mt-4">
                            <div class="div">
                                <form method="post">
                                    <h6 class="mb-4 text-end">วัน เดือน ปี : <input name="datepicker" class="datepicker" />
                                    <input type="submit" name="datepick" value="ค้นหา" class="btn btn-light" /></h6>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    if(isset($_POST['datepick'])) {
                        $date = $_POST['datepicker'];
                        $newDate = date("Y-m-d", strtotime($date)); 
                        //echo $newDate;
                    }
                    else
                    {
                        $t=time();
                        $newDate = date("Y-m-d",$t);
                    }
                    $sql_all = "SELECT COUNT(*) AS patient_count FROM `patient`";
                    $query = mysqli_query($conn,$sql_all);
                    $objResult1 = mysqli_fetch_array($query);
                ?>
                
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3 bg-light">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">All Patient
                                                </p>
                                                <h5 class="font-weight-bolder mb-0"><?php echo $objResult1["patient_count"]?></h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="fa-solid fa-users"
                                                style="font-size:48px;color:rgb(0, 4, 123);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            $sql_new = "SELECT COUNT(*) AS opd_count FROM `opd` WHERE opd_date = '$newDate'";
                            $query = mysqli_query($conn,$sql_new);
                            $objResult2 = mysqli_fetch_array($query);
                        ?>

                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3 bg-light">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Patient</p>
                                                <h5 class="font-weight-bolder mb-0"><?php echo $objResult2["opd_count"]?></h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="fa-solid fa-user-plus"
                                                style="font-size:48px;color:rgb(0, 4, 123);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3 bg-light">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Outpatient</p>
                                                <h5 class="font-weight-bolder mb-0"><?php echo $objResult2["opd_count"]?></h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="fa-solid fa-hospital-user"
                                                style="font-size:48px;color:rgb(0, 4, 123);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            $sql_new = "SELECT COUNT(*) AS ipd_count FROM `ipd` WHERE ipd_date = '$newDate'";
                            $query = mysqli_query($conn,$sql_new);
                            $objResult3 = mysqli_fetch_array($query);
                        ?>

                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3 bg-light">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Inpatient</p>
                                                <h5 class="font-weight-bolder mb-0"><?php echo $objResult3["ipd_count"]?></h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="fa-solid fa-bed" style="font-size:48px;color:rgb(0, 4, 123);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                    $sql_chart = "SELECT SUM(CASE WHEN patient_gender = 'M' THEN 1 ELSE 0 END) as MaleCount, SUM(CASE WHEN patient_gender = 'F' THEN 1 ELSE 0 END) as FemaleCount FROM patient";
                    $query = mysqli_query($conn,$sql_chart);
                    $objResult = mysqli_fetch_array($query);
                    ?>

                    <!-- row2 -->
                    <div class="row">
                        <!-- col1 -->
                        <div class="col-auto col-xl-4 col-sm-4 mb-xl-0 mb-4 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    สัดส่วนเพศของผู้เข้ารับการรักษาทั้งหมด
                                </div>
                                <div class="card-body">
                                    <div id="piechart" style="width: 250px; height: 240px;"></div>
                                    <h6 class="card-title">จากผู้เข้ารับการรักษาปัจจุบัน</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">จำนวนผู้ชาย:    <?php echo $objResult["MaleCount"]?>   คน</li>
                                        <li class="list-group-item">จำนวนหญิง:    <?php echo $objResult["FemaleCount"]?>   คน</li>
                                    </ul>                                    
                                    <a href="#" class="btn bth-light mt-2">เพิ่มเติม</a>
                                </div>
                            </div>
                        </div>

                        <!-- col2 -->
                        <div class="col-auto col-xl-8 col-sm-8 mb-xl-0 mb-4 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    สรุปข้อมูลในแต่ละเดือนของปี 2022
                                </div>
                                <div class="card-body">
                                    <form name="form" method="post" action="">
                                        <select name="month" class="form-select w-30" aria-label="Default select example">
                                            <option value="">เดือน</option>
                                            <option value="1">มกราคม [1]</option>
                                            <option value="2">กุมภาพันธ์ [2]</option>
                                            <option value="3">มีนาคม [3]</option>
                                            <option value="4">เมษายน [4]</option>
                                            <option value="5">พฤษภาคม [5]</option>
                                            <option value="6">มิถุนายน [6]</option>
                                            <option value="7">กรกฎาคม [7]</option>
                                            <option value="8">สิงหาคม [8]</option>
                                            <option value="9">กันยายน [9]</option>
                                            <option value="10">ตุลาคม [10]</option>
                                            <option value="11">พฤศจิกายน [11]</option>
                                            <option value="12">ธันวาคม [12]</option>
                                        </select>
                                        <div class = "d-grid col-2 mx-auto mt-3">
                                            <input type="submit" name="submit" vlaue="Choose options" class="btn btn-light">
                                        </div>
                                    </form>
                                

                                    <?php
                                        if(isset($_POST['submit']))
                                        {
                                            if(!empty($_POST['month']))
                                            {
                                                $selected = $_POST['month'];

                                                //maleCount
                                                $sql_M = "SELECT COUNT(case when p.Patient_gender = 'M' then 1 else null end) AS maleCount 
                                                FROM opd_monthday o , patient p
                                                WHERE p.Patient_id = o.Patient_id 
                                                AND o.Month = $selected";
                                                $query = mysqli_query($conn,$sql_M);
                                                $Result_M = mysqli_fetch_array($query);

                                                //femaleCount
                                                $sql_F = "SELECT COUNT(case when p.Patient_gender = 'F' then 1 else null end) AS femaleCount 
                                                FROM opd_monthday o , patient p
                                                WHERE p.Patient_id = o.Patient_id 
                                                AND o.Month = $selected";
                                                $query = mysqli_query($conn,$sql_F);
                                                $Result_F = mysqli_fetch_array($query);

                                                //ageAverage
                                                $sql_A = "SELECT AVG(o.old) AS ageAvg
                                                FROM opd_monthday o, patient p
                                                WHERE o.Patient_id = p.Patient_id
                                                AND o.Month = $selected";
                                                $query = mysqli_query($conn,$sql_A);
                                                $Result_A = mysqli_fetch_array($query);

                                                //popularDepartment
                                                $sql_D = "SELECT d.dp_id,d.DP_name ,COUNT(*) AS dpFrequency
                                                FROM opd_monthday o, patient p, department d
                                                WHERE o.Patient_id = p.Patient_id
                                                AND o.dp_id = d.DP_id
                                                AND o.Month = $selected
                                                GROUP BY d.DP_id
                                                ORDER BY dpFrequency DESC LIMIT 3";
                                                $query = mysqli_query($conn,$sql_D);
                                                $Result_D = mysqli_fetch_array($query);
                                                
                                            }
                                            else
                                            {
                                                echo 'Please select the value.';
                                            }

                                        }

                                    ?>
                                    
                                    <table class="table table-striped table-bordered text-center mt-3">
                                        <thead>
                                            <tr class="tab">
                                                <th scope="col" style="width: 10%">เดือน</th>
                                                <th scope="col" style="width: 10%">ชาย</th>
                                                <th scope="col" style="width: 10%">หญิง</th>
                                                <th scope="col" style="width: 20%">ค่าเฉลี่ยอายุ</th>
                                                <th scope="col" style="width: 30%">แผนกที่มีผู้เข้ารับการรักษาสูงสุด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php 
                                                        if(!empty($_POST['month']))
                                                            { 
                                                                echo $selected;
                                                            }
                                                        else echo null
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(!empty($_POST['month']))
                                                            { 
                                                                echo $Result_M["maleCount"];
                                                            }
                                                        else echo null
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(!empty($_POST['month']))
                                                            { 
                                                                echo $Result_F["femaleCount"];
                                                            }
                                                        else echo null
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(!empty($_POST['month']))
                                                            { 
                                                                echo $Result_A["ageAvg"];
                                                            }
                                                        else echo null
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(!empty($_POST['month']))
                                                            { 
                                                                if(empty($Result_D["DP_name"])) {
                                                                    echo "no data";
                                                                } else {
                                                                    echo $Result_D["DP_name"];
                                                                }
                                                            }
                                                        else echo null
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
    $.fn.datepicker.defaults.language = 'th';
    $('.datepicker').datepicker();
});
</script>