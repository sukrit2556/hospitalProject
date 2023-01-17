<?php
session_start();
include("conn_db.php");

if(!isset($_POST['login_form_employee'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(empty($username) || empty($password)) {
        header("location: login_employee.php");
    }
    else{
        $sql = "SELECT * FROM doctor WHERE Doctor_id = '$username' AND Doctor_pwd = '$password'";
        $query = mysqli_query($conn, $sql);
        $sql1 = "SELECT * FROM employee WHERE Employee_id = '$username' AND Employee_pwd = '$password'";
        $query1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($query) == 1) { //is doctor
            $data = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "doctor";
            $_SESSION['id'] = $data['Doctor_id'];
            echo $_SESSION['id'];
            ?>
                <script>
                alert("Welcome <?php echo $data['Doctor_name']." ".$data['Doctor_sname']?>");
                window.location="TS3patient_tb.php";
                </script>
            <?php
        }else if(mysqli_num_rows($query1) == 1) {//is employee
            $data = mysqli_fetch_assoc($query1);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $data['Employee_role'];
            $_SESSION['id'] = $data['Employee_id'];
            echo $_SESSION['username'].$_SESSION['role'];
            if($data['Employee_role'] == "Cashier") { //employee -> cashier
                ?>
                <script>
                alert("Welcome <?php echo $data['Employee_name']." ".$data['Employee_sname']?>");
                window.location="TS1bill_tb.php";
                </script>;
                <?php
            } else if ($data['Employee_role'] == "registrator") { //employee -> registrator
                ?>
                <script>
                alert("Welcome <?php echo $data['Employee_name']." ".$data['Employee_sname']?>");
                window.location="home_registrator.php";
                </script>
                <?php
            } else if ($data['Employee_role'] == "bed registrator") { //employee -> registrator bed
                ?>
                <script>
                alert("Welcome <?php echo $data['Employee_name']." ".$data['Employee_sname']?>");
                window.location="TS2room_tb.php";
                </script>
                <?php
            } else if ($data['Employee_role'] == "pharmacist") { //employee -> pharmacist
                ?>
                <script>
                alert("Welcome <?php echo $data['Employee_name']." ".$data['Employee_sname']?>");
                window.location="drug_tb.php";
                </script>
                <?php
            } else if ($data['Employee_role'] == "admin") { //employee -> admin
                ?>
                <script>
                alert("Welcome <?php echo $data['Employee_name']." ".$data['Employee_sname']?>");
                window.location="admin.php";
                </script>
                <?php
            }
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

?>