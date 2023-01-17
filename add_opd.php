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
    if(empty($_POST['textarea_symptom']) || empty($_POST['category'])) {
        ?>
        <script>
            alert("Please fill all fields!");
	        history.back();
        </script>
        <?php
    } else {
        $patient_id = $_GET['patient_id'];
        $opd_status = $_GET['status'];
        $opd_symptoms = $_POST['textarea_symptom'];
        $category = $_POST['category'];
        $sql_insert = "INSERT INTO `opd` (`OPD_id`, `Patient_id`, `AP_id`, `OPD_Date`, `OPD_status`, `OPD_symptoms`, `DP_id`, `OPD_active_status`) VALUES (NULL, '$patient_id', NULL, CURRENT_DATE(), '$opd_status', '$opd_symptoms', '$category', '1')";
        $query = mysqli_query($conn, $sql_insert);
        $sql_select_latest = "SELECT * FROM opd WHERE Patient_id = $patient_id ORDER BY OPD_id DESC";
        $latest_data = mysqli_fetch_assoc(mysqli_query($conn, $sql_select_latest));
        $latest_opd = $latest_data['OPD_id'];
        $sql_add_treatment = "INSERT INTO `opd_treatment` (`TM_id`, `opd_id`, `Doctor_id`, `List_id`, `TM_text`, `DP_now`, `TM_datetime`, `TM_status`) VALUES (NULL, '$latest_opd', NULL, NULL, '', '$category', '', '0')";
        mysqli_query($conn, $sql_add_treatment);
        ?>
        <script>
            alert("OPD added successfully!");
            window.location="general_patient.php";
        </script>
        <?php
    }
}
?>