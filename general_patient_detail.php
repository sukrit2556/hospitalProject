<?php
include("conn_db.php");
session_start();
if(!isset($_SESSION['username'])){
?>
	<script>alert("Please login");
	window.location="index.html"</script>
<?php
}
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
    <title>รายละเอียดผู้ป่วย</title>
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
                        <a href="general_patient.php" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                            ย้อนกลับ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    $patient_id = $_GET['patient_id'];
    $sql = "SELECT * FROM Patient WHERE Patient_id = '$patient_id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    ?>
    <div class="row">
        <div class="col-lg-3 leftbar">
            <h3 class="mb-4 mt-4 px-5 text-start">ประวัติผู้ป่วย</h3>
            <h6 class="mb-4 px-5 text-start">ชื่อ : <?=$data['Patient_name']?></h6>
            <h6 class="mb-4 px-5 text-start">นามสกุล : <?=$data['Patient_sname']?></h6>
            <h6 class="mb-4 px-5 text-start">เพศ : <?=$data['Patient_gender']?></h6>
            <h6 class="mb-4 px-5 text-start">วันเกิด : <?=$data['Patient_DOB']?></h6>
            <h6 class="mb-4 px-5 text-start">เบอร์ติดต่อ : <?=$data['Patient_TelNo']?></h6>
            <h6 class="mb-4 px-5 text-start">หมู่เลือด : -</h6>
            <h6 class="mb-4 px-5 text-start">ส่วนสูง (กก.) : -</h6>
            <h6 class="mb-4 px-5 text-start">น้ำหนัก (ซม.) : -</h6>
            <h6 class="mb-4 px-5 text-start">ความดัน : -</h6>
        </div>
        <div class="col-lg-9 table-wrapper-scroll-y3 my-custom-scrollbar3">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="mb-3 mt-4 px-4 text-start">โรคประจำตัว : -</h6>
                </div>
                <div class="col-lg-6">
                    <h6 class="mb-3 mt-4 px-4 text-start">แพ้ยา : -</h6>
                </div>
            </div>
            <div class="table-wrapper-scroll-y2 my-custom-scrollbar2 container text-center mb-3">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr class="tab">
                        <th scope="col" style="width: 30%">วันที่เข้ารับการรักษา</th>
                        <th scope="col" style="width: 20%">OPD/IPD</th>
                        <th scope="col" style="width: 30%">แพทย์ผู้รับผิดชอบ</th>
                        <th scope="col" style="width: 20%">อาการ</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM opd o, opd_treatment ot WHERE o.Patient_id = '$patient_id' AND ot.OPD_id = o.OPD_id";
                        $query = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($query) > 0) {
                            while($data = mysqli_fetch_assoc($query)) {
                                $doctor_id = $data['Doctor_id'];
                                $sql1 = "SELECT * FROM doctor WHERE Doctor_id = '$doctor_id'";
                                $query1 = mysqli_query($conn,$sql1);
                                $data1 = mysqli_fetch_assoc($query1);
                        ?>
                        <tr>
                            <th scope="row"><?=$data['OPD_Date']?></th>
                            <td><?=$data['OPD_id']?></td>
                            <td><?=$data1['Doctor_name']." ".$data1['Doctor_sname']?></td>
                            <td><?=$data['OPD_symptoms']?></td>
                        </tr>
                      <?php
                            }
                        } else {
                            ?>
                            <tr>
                            <td colspan="4">No data</td>
                            </tr>
                            <?php
                        }
                        ?>
                </table>
            </div>
            <h6 class="mb-3 px-4 text-start">กรอกข้อมูลเพิ่ม</h6>            
            <form action="add_opd.php?patient_id=<?=$patient_id?>&status=0" method="post">
                <div class="row">
                    <div class="col-lg-7 mb-4 ms-4 text-start">
                        <h6>อาการ : 
                            <textarea name="textarea_symptom" style="height:200px;" class="form-control " rows="1" id="comment" placeholder="อาการ"></textarea>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 px-4 mb-3 d-flex flex-row align-item-start">
                        <div class="align-self-end">
                            <?php
                            $sql_department = "SELECT * FROM department";
                            $query = mysqli_query($conn, $sql_department);
                            ?>
                        <label for="category" class="form-label">แผนกที่ต้องไปต่อ</label>
                        <select class="form-select form-select-md mb-3" name="category" id="category">
                            <option value="">-</option>
                            <?php
                            while($dp_data = mysqli_fetch_assoc($query)) { ?>\
                            <option value="<?=$dp_data['DP_id']?>"><?=$dp_data['DP_name']?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-row align-item-start">
                    <button type="submit" name="submit" class="btn btn-info" id="liveAlertBtn">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>