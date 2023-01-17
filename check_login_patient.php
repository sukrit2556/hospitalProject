<?php
session_start();
include("conn_db.php");
if (!isset($_POST['login_form_patient'])) {
    $CitizenID = mysqli_real_escape_string($conn, $_POST['CitizenID']);
    $telephone = mysqli_real_escape_string($conn, $_POST['Telephone']);
    echo $CitizenID.$telephone;
    if(empty($CitizenID) || empty($telephone)) {
        //header("location: login_patient.php");
    } else {
        $sql = "SELECT * FROM patient WHERE Patient_CID = '$CitizenID' AND Patient_TelNo = '$telephone'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) == 1) {
            $_SESSION['username'] = $CitizenID;
            $_SESSION['role'] = "patient";
            ?>
            <script>
                alert("Welcome <?php echo $data['Patient_name']." ".$data['Patient_sname']?>");
                window.location="404.php";
            </script>;
            <?php
        } else { //no match
            ?>
                <script>
                    alert("Wrong username or password");
                    history.back();
                </script>
            <?php
        }
    }
}