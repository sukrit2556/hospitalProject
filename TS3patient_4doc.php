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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
  </script>
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
        <div class="container-fluid">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarDropdownMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarDropdownMenu" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-right">
                    <li class="nav-item">
                        <a href="TS3patient_tb.php" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                            กลับหน้าหลัก
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <?php
        $opd_id = $_GET['opd_id'];
        $treatment = $_GET['tm'];
        $sql = "SELECT * FROM patient WHERE Patient_id = (SELECT Patient_id FROM opd WHERE opd_id = $opd_id)";
        $data_patient = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $patient_id = $data_patient['Patient_id'];
        ?>
        <div class="col-lg-3 leftbar">
            <h3 class="mb-4 mt-4 px-5 text-start">ประวัติผู้ป่วย</h3>
            <h6 class="mb-4 px-5 text-start">ชื่อ : <?=$data_patient['Patient_prefix']." ".$data_patient['Patient_name']?></h6>
            <h6 class="mb-4 px-5 text-start">นามสกุล :<?=$data_patient['Patient_sname']?></h6>
            <h6 class="mb-4 px-5 text-start">เพศ :<?=$data_patient['Patient_gender']?></h6>
            <h6 class="mb-4 px-5 text-start">วันเกิด :<?=$data_patient['Patient_DOB']?></h6>
            <h6 class="mb-4 px-5 text-start">เบอร์ติดต่อ : <?=$data_patient['Patient_TelNo']?></h6>
            <h6 class="mb-4 px-5 text-start">หมู่เลือด :</h6>
            <h6 class="mb-4 px-5 text-start">ส่วนสูง (กก.) :</h6>
            <h6 class="mb-4 px-5 text-start">น้ำหนัก (ซม.) :</h6>
            <h6 class="mb-4 px-5 text-start">ความดัน :</h6>
        </div>
        <div class="col-lg-9 table-wrapper-scroll-y3 my-custom-scrollbar3">
        <form action="TS3_treatment_action.php?opd_id=<?=$opd_id?>&tm=<?=$treatment?>" method="post">
            <div class="table-wrapper-scroll-y2 my-custom-scrollbar2 container text-center mb-3">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr class="tab">
                        <th scope="col" style="width: 30%">วันที่เข้ารับการรักษา</th>
                        <th scope="col" style="width: 20%">OPD/IPD</th>
                        <th scope="col" style="width: 30%">รายละเอียดการรักษา</th>
                        <th scope="col" style="width: 20%">แผนกที่รักษา</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    echo $patient_id;
                    $sql = "SELECT * from opd_treatment WHERE opd_id in (SELECT opd_id FROM opd WHERE Patient_id = '$patient_id') AND TM_status != 0 ORDER BY TM_id DESC";
                    $query = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($query) > 0) {
                        while($data_tm = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <th scope="row"><?=$data_tm['TM_datetime']?></th>
                                    <td><?=$data_tm['opd_id']?></td>
                                    <td><?=$data_tm['TM_text']?></td>
                                    <td><?=$data_tm['DP_now']?></td>
                                </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tbody>
                            <tr>
                                <td colspan="4">NO data</td>
                            </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <h6 class="mb-3 px-4 text-start">กรอกข้อมูลเพิ่ม</h6>
            <div class="row">
                <div class="col-lg-4">
                    <h6 class="mb-3 px-4 text-start">เลขที่รับการรักษา : <?php echo $_GET['tm']?></h6>
                </div>
                <div class="col-lg-4">
                    <?php
                    $doctor_id = $_SESSION['id'];
                    $sql_doctor = "SELECT * FROM doctor WHERE Doctor_id = '$doctor_id'";
                    $data = mysqli_fetch_assoc(mysqli_query($conn, $sql_doctor));
                    ?>
                    <h6 class="mb-3 px-4 text-start">แพทย์ผู้รับผิดชอบ : <?php echo $data['Doctor_name']." ".$data['Doctor_sname']?></h6>
                </div>
            </div>
            <?php
            $sql = "SELECT * FROM opd WHERE OPD_id = $opd_id AND OPD_active_status = 1";
            $data = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            ?>
            <h6 class="mb-3 px-4 text-start">อาการ : 
                <textarea style="height:100px;" class="form-control mt-2" rows="1" id="comment" disabled><?=$data['OPD_symptoms']?></textarea>
            </h6> 
            <h6 class="mb-4 px-4 text-start">รายละเอียดการรักษา : 
                <textarea name="detail" style="height:100px;" class="form-control" rows="1" id="comment"></textarea>
            </h6>
            <div class="ms-4 mb-2">
                <button type="button" onclick="myFunction()" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                เพิ่มข้อมูลยา
                </button>
            </div>
            <script>
            function myFunction() {
                var x = document.getElementById("drug_add");
                if (x.style.display === "none") {
                    x.style.display = "block";
                    window.location.hash = "drug_add";

                } else {
                    x.style.display = "none";
                }
            }
            </script>
            <?php
            $sql_prescript = "SELECT * FROM opd_treatment ot, prescription p WHERE p.TM_id = ot.TM_id AND ot.OPD_id IN (SELECT opd_id FROM opd WHERE Patient_id = $patient_id)";
            $query = mysqli_query($conn, $sql_prescript);
            ?>
            <!--add drug-->
            <div style="display:none;" class="drug_add" id="drug_add">
                <div class="table-wrapper-scroll-y2 my-custom-scrollbar2 container text-center mb-3">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr class="tab">
                            <th scope="col" style="width: 15%">วันที่ใบสั่งยา</th>
                            <th scope="col" style="width: 20%">เลขที่ใบสั่งยา</th>
                            <th scope="col" style="width: 20%">เลขประจำยา</th>
                            <th scope="col" style="width: 20%">ชื่อยา</th>
                            <th scope="col" style="width: 15%">จำนวน</th>
                            <th scope="col" style="width: 10%">สถานะ</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(mysqli_num_rows($query) > 0) {
                                while($data = mysqli_fetch_assoc($query)) {
                                    $drug_id = $data['Drug_id'];
                                    $sql_drug_detail = "SELECT * FROM drug WHERE Drug_id = $drug_id";
                                    $data_drug = mysqli_fetch_assoc(mysqli_query($conn, $sql_drug_detail))
                                    ?>
                                    <tr>
                                        <td><?=$data['Pre_datetime']?></td>
                                        <td><?=$data['Pre_id']?></td>
                                        <td><?=$data['Drug_id']?></td>
                                        <td><?=$data_drug['Drug_name']?></td>
                                        <td><?=$data['Pre_dose']?></td>
                                        <td><?=$data['Pre_status']?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No data</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                $sql_all_drug = "SELECT * FROM drug WHERE 1 = 1";
                $query = mysqli_query($conn, $sql_all_drug);
                $query1 = mysqli_query($conn, $sql_all_drug);
                $query2 = mysqli_query($conn, $sql_all_drug);
                ?>
                <div class="px-4">
                    <h6>ยาชนิดที่ 1</h6>
                    <div class="row">
                        <div class="col col-lg-8">
                            <select name="drug[]" class="form-select mb-3">
                                <option selected value="">เลือกยา</option>
                                <?php
                                while($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?=$data['Drug_id']?>"><?=$data['Drug_name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col col-lg-4">
                            <input type="text" name="amount[]" class="form-control" placeholder="ระบุจำนวน">
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <h6>ยาชนิดที่ 2</h6>
                    <div class="row">
                        <div class="col col-lg-8">
                            <select name="drug[]" class="form-select mb-3">
                                <option selected value="">เลือกยา</option>
                                <?php
                                while($data1 = mysqli_fetch_assoc($query1)) {
                                    ?>
                                    <option value="<?=$data1['Drug_id']?>"><?=$data1['Drug_name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col col-lg-4">
                            <input type="text" name="amount[]" class="form-control" placeholder="ระบุจำนวน">
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <h6>ยาชนิดที่ 3</h6>
                    <div class="row">
                        <div class="col col-lg-8">
                            <select name="drug[]" class="form-select mb-3">
                                <option selected value="">เลือกยา</option>
                                <?php
                                while($data2 = mysqli_fetch_assoc($query2)) {
                                    ?>
                                    <option value="<?=$data2['Drug_id']?>"><?=$data2['Drug_name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col col-lg-4">
                            <input type="text" name="amount[]" class="form-control" placeholder="ระบุจำนวน">
                        </div>
                    </div>
                </div>
            </div>
            <!--add Appointment-->
            
            <div class="ms-4 my-2">
                <button type="button" onclick="myFunction1()" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                เพิ่มการนัดหมาย
                </button>
            </div>
            <script>
                function myFunction1() {
                    var x = document.getElementById("appointment_add");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                        window.location.hash = "appointment_add";

                    } else {
                        x.style.display = "none";
                    }
                }
            </script>
            <div style="display:none;" class="appointment_add" id="appointment_add">
                <h3 class="mb-3 px-4 text-start">การนัดหมายครั้งถัดไป</h3>
                <div class="row">
                    <div class="col-lg-4">
                        <h6 class="mb-3 px-4 text-start">วันที่นัดหมาย : 
                            <input name="date" class="form-control mt-3" type="text" id="datepicker">
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4 ms-4 text-center">
                    <button type="submit" name="submit" class="btn btn-light btn_plearn" id="liveAlertBtn">บันทึก</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</body>
</html>