<?php
    require('conn_db.php');
    if(isset($_POST['delete']))
    {
        $patient_id = $_GET['patient_id'];
        $sql_delete = "DELETE FROM patient WHERE Patient_id = $patient_id";
        mysqli_query($conn,$sql_delete);

        ?>
            <script>
                alert("ลบข้อมูลผู้ป่วยเรียบร้อย");
                window.location = "UpdateP_tb.php";
            </script>
            <?php
    }

?>