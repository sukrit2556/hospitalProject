<?php
include("conn_db.php");
session_start();
if(!isset($_SESSION['username'])){
?>
	<script>alert("Please login");
	window.location="index.html"</script>
<?php
}
if(isset($_POST['submit'])) {
    print_r($_POST);
    $tm = $_GET['tm'];
    $opd_id = $_GET['opd_id'];
    $doctor_id = $_SESSION['id'];

    $detail = $_POST['detail'];

    $drug_num = $_POST['amount'];
    $drug = $_POST['drug'];

    $original_calendar = $_POST['date'];

    //update into opd_treatment
    function update_opd_treatment($conn, $doctor_id, $detail, $status, $tm) {
        echo "<br>doctorid= $doctor_id";
        $sql_update_tm = "UPDATE `opd_treatment` SET `Doctor_id` = '$doctor_id', `List_id` = '1012', `TM_text` = '$detail', `TM_datetime` = NOW(), `TM_status` = '$status' WHERE `opd_treatment`.`TM_id` = '$tm'";
        mysqli_query($conn, $sql_update_tm);
    }

    //insert appointment
    function insert_into_appointment($conn, $doctor_id, $original_calendar, $opd_id) {
        //find out department the doctor is in
        $sql_doctor = "SELECT * FROM doctor WHERE Doctor_id = '$doctor_id'";
        $data = mysqli_fetch_assoc(mysqli_query($conn, $sql_doctor));
        $department = $data['Doctor_DP'];
        //convert calendar format
        $newdate = date("Y-m-d",strtotime($original_calendar));
        //insert into appointment
        $sql_insert_ap = "INSERT INTO `appointment` (`AP_id`, `OPDOld_id`, `AP_status`, `AP_date`, `AP_create`, `DP_id`) VALUES (NULL, '$opd_id', '0', '$newdate', CURRENT_DATE(), '$department')";
        mysqli_query($conn, $sql_insert_ap);
    }


    //insert bill
    function insert_bill($conn, $opd_id) {
        $sql_insert_bill = "INSERT INTO `bill` (`Bill_no`, `OPD_id`, `Bill_charge`, `Bill_status`) VALUES (NULL,'$opd_id' , '', '0')";
        mysqli_query($conn, $sql_insert_bill);
        $sql_latest_bill = "SELECT * FROM bill WHERE OPD_id = $opd_id ORDER BY Bill_no DESC";
        $data_latest = mysqli_fetch_assoc(mysqli_query($conn, $sql_latest_bill));
        $latest = $data_latest['Bill_no'];
    }
    

    //insert into prescription
    function insert_prescription($conn, $opd_id, $drug, $drug_num, $tm) {
        $i = 0;
        $nowdatetime = date('Y-m-d H:i:s');
        $sql_latest_bill = "SELECT * FROM bill WHERE OPD_id = $opd_id ORDER BY Bill_no DESC";
        $data_latest = mysqli_fetch_assoc(mysqli_query($conn, $sql_latest_bill));
        $latest = $data_latest['Bill_no'];
        foreach($drug as $drugs) {
            echo "<br> $drugs, $drug_num[$i], i = $i";
            if(!empty($drugs)) {
                echo "surkt";
                $sql_insert_prescript = "INSERT INTO `prescription` (`Pre_id`, `TM_id`, `Drug_id`, `Pre_dose`, `Pre_datetime`, `Patient_status`, `Pre_status`, `Bill_no`) VALUES (NULL, '$tm', '$drugs', '$drug_num[$i]', '$nowdatetime', '0', '0', '$latest')";
                mysqli_query($conn, $sql_insert_prescript);
            }
            $i++;
        }
    }


    if(empty($drug[0]) && empty($drug[1]) && empty($drug[2]) && empty($original_calendar)) { //end with noting to do next 
        echo "noting";
        update_opd_treatment($conn, $doctor_id, $detail, 6, $tm);
        insert_bill($conn, $opd_id);
    } else if (empty($drug[0]) && empty($drug[1]) && empty($drug[2]) && !empty($original_calendar)) { //appointment only 3
        echo "test2";
        update_opd_treatment($conn, $doctor_id, $detail, 3, $tm);
        insert_into_appointment($conn, $doctor_id, $original_calendar, $opd_id);
        insert_bill($conn, $opd_id);
    } else if ((!empty($drug[0]) || !empty($drug[1]) || !empty($drug[2])) && !empty($original_calendar)) { // appointment and drug 4
        echo "test";
        update_opd_treatment($conn, $doctor_id, $detail, 4, $tm);
        insert_into_appointment($conn, $doctor_id, $original_calendar, $opd_id);
        insert_bill($conn, $opd_id);
        insert_prescription($conn, $opd_id, $drug, $drug_num, $tm);
    } else if ((!empty($drug[0]) || !empty($drug[1]) || !empty($drug[2])) && empty($original_calendar)) { // drug only 5
        echo "test1";
        update_opd_treatment($conn, $doctor_id, $detail, 5, $tm);
        insert_bill($conn, $opd_id);
        insert_prescription($conn, $opd_id, $drug, $drug_num, $tm);
    }

    $sql_inactivate = "UPDATE `opd` SET `OPD_active_status` = '0' WHERE `opd`.`OPD_id` = '$opd_id'";
    mysqli_query($conn, $sql_inactivate);
    ?>
    <script>
        alert("บันทึกเรียบร้อย");
        window.location = "TS3patient_tb.php";
    </script>
    <?php
}
?>