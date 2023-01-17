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

    require('conn_db.php');
    if(isset($_POST['submitma']))
        {
            $ap_id = $_GET['ap_id'];
            $sql_submit = "UPDATE appointment SET ap_status = 1 WHERE ap_id = $ap_id";
            mysqli_query($conn,$sql_submit);

            $sql_sukrit = "SELECT * FROM appointment a , opd o WHERE a.OPDold_id = o.OPD_id AND a.AP_id = $ap_id";
            $data = mysqli_fetch_array(mysqli_query($conn,$sql_sukrit));
            $symptoms = $data['OPD_symptoms'];
            $patient = $data['Patient_id'];
            echo $patient;
            $department = $data['DP_id'];
            $sql_insert = "INSERT INTO `opd` (`OPD_id`, `Patient_id`, `AP_id`, `OPD_Date`, `OPD_status`, `OPD_symptoms`, `DP_id`, `OPD_active_status`) VALUES (NULL, '$patient', '$ap_id', current_timestamp(), '1', '$symptoms', '$department', '1')";
            mysqli_query($conn,$sql_insert);
            $sql_select_latest = "SELECT * FROM opd WHERE Patient_id = $patient ORDER BY OPD_id DESC";
            $latest_data = mysqli_fetch_assoc(mysqli_query($conn, $sql_select_latest));
            $latest_opd = $latest_data['OPD_id'];
            echo "latest $latest_opd";
            $department = $data['DP_id'];
            echo "dep = $department";
            $sql_add_treatment = "INSERT INTO `opd_treatment` (`TM_id`, `opd_id`, `Doctor_id`, `List_id`, `TM_text`, `DP_now`, `TM_datetime`, `TM_status`) VALUES (NULL, '$latest_opd', NULL, NULL, '', '$department', '', '0')";
            mysqli_query($conn, $sql_add_treatment);
            ?>

            <script>
                alert("บันทึกเรียบร้อย");
                window.location = "TS4ap_tb.php";
            </script>
            <?php
        }
?>