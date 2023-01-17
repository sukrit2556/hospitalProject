<?php 
    session_start();
    include('conn_db.php'); 
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
    <title>ข้อมูลส่วนตัวผู้ป่วย</title>
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
                        <a href="UpdateP_tb2.php" class="nav-link">ข้อมูลส่วนตัวผู้ป่วย</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle" id="navdarDropdownMenu" data-bs-toggle="dropdown">สื่อสารการติดต่อ</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                            <li><a href="#" class="dropdown-item">เกี่ยวกับเรา</a></li>
                            <li><a href="#" class="dropdown-item">ติดตามข่าวสาร</a></li>
                            <li><a href="#" class="dropdown-item">ติดต่อเรา</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="ms-auto">
                    <a href="logout.php" class="nav-link logout-btn">logout</a>
                </div>
            </div>
        </div>
    </nav>
        <div class="row">
            <div class="col-lg">
                <div class="container text-center mt-4">
                    <div class="div">
                        <h3 class="mb-4">รายละเอียดผู้ป่วย</h3>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="container ms-5 mb-4 text-start">กรอกรายละเอียด</h6>
            <form name="form" method="post" action="">
            <div class="row">
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">คำนำหน้า : <input type="text" name="Patient_prefix"></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">ชื่อ : <input type="text" name="Patient_name"></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">นามสกุล : <input type="text" name="Patient_sname"></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start"><select name="Patient_gender" class="form-select w-50" aria-label="Default select example">
                                <option value="">เพศ</option>
                                <option value="F">หญิง</option>
                                <option value="M">ชาย</option>
                            </select>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">วัน เดือน ปีเกิด : <input type="text" name="Patient_DOB"></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">Citizen ID : <input type="text" name="Patient_CID"></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">เบอร์โทรศัพท์ : <input type="text" name="Patient_TelNo"></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="container ms-5">
                    <div class="div">
                        <h6 class="mb-4 text-start">ที่อยู่: <input type="text" class="form-control" rows="20" name="Patient_address"></h6>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 text-center">
            <input type="submit" name="submit" value="บันทึก" class="btn btn_plearn btn-light"></input>
            </form>
            <?php
                if(isset($_POST['submit']) && !empty($_POST['Patient_name'])) {
                    
                    $Patient_CID = $_POST['Patient_CID'];
                    $Patient_pf = $_POST['Patient_prefix'];
                    $Patient_name = $_POST['Patient_name'];
                    $Patient_sname = $_POST['Patient_sname'];
                    $Patient_gd = $_POST['Patient_gender'];
                    $Patient_DOB = $_POST['Patient_DOB'];
                    $Patient_tel = $_POST['Patient_TelNo'];
                    $Patient_address = $_POST['Patient_address'];

                    $sql = "SELECT * FROM patient WHERE Patient_CID = '$Patient_CID'";
                    $query = mysqli_query($conn,$sql);
                    $data = mysqli_fetch_assoc($query);

                    if (mysqli_num_rows($query)==0) {
                        $sql4 = "INSERT INTO patient VALUES (NULL,'$Patient_CID','$Patient_pf','$Patient_name','$Patient_sname','$Patient_gd','$Patient_DOB','$Patient_tel','$Patient_address')";
                        mysqli_query($conn, $sql4);
                        ?> 
                        <script>
                            alert("เพิ่มข้อมูลเรียบร้อย");
                            window.location = "UpdateP_tb2.php";
                        </script>
                        <?php
                    }
                    else if (mysqli_num_rows($query)>0){
                        ?> 
                        <script>
                            alert("มีข้อมูลอยู่แล้ว");
                            window.location = "UpdateP_insert.php";
                        </script>
                        <?php
                    }
                } else if(isset($_POST['submit']) && empty($_POST['Patient_name'])) {
                    ?> 
                    <script>
                        alert("เกิดข้อผิดพลาด");
                        window.location = "UpdateP_insert.php";
                    </script>
                    <?php
                }
            ?>
            </div>
        </div>
</body>
</html>