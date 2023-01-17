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
                        <a href="home_registrator.php" class="nav-link">
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
    <div class="col-xx1">
        <div class="container text-center mt-4">
            <div class="div">
                <h3 class="mb-4">ข้อมูลส่วนตัวผู้ป่วย</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm text-center">
            <div class="container">
                <div class="div">
                    <form name="form" method="post">
                    <h6 class="mb-4 text-center">เลขประจำตัวผู้ป่วย : <input type="text" class="w-25" name="Patient_id" id="#" placeholder="ค้นหา"> <input type="submit" class="btn_plearn btn btn-light" name="btn" value="ค้นหา"> <a href="UpdateP_insert.php" type="submit" class="btn_plearn btn btn-light" name="btn">เพิ่มคน</a></input></input></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="table-wrapper-scroll-y1 my-custom-scrollbar1 container text-center mt-2 px-5">

    <?php
    if(isset($_POST['btn']) && !empty($_POST['Patient_id']))
    {
        $Patient_id = $_POST["Patient_id"];
        $sql = "SELECT * FROM patient WHERE Patient_id = '$Patient_id'";
        $query = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($query);

        if(mysqli_num_rows($query)>0) {
            $query = "SELECT * FROM patient WHERE Patient_id = '$Patient_id'";
            $search_result = filterTable($query);
        }
        else {
            $query = "SELECT * FROM patient";
            $search_result = filterTable($query);
        }
         
    }
     else {
        $query = "SELECT * FROM patient";
        $search_result = filterTable($query);
    }
    
    // function to connect and execute the query
    function filterTable($query)
    {
        $connect = mysqli_connect("localhost", "root", "", "b3_hospital");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
    ?>
    
        <table class="table table-striped table-bordered">
            <thead>
              <tr class="tab">
                <th scope="col" style="width: 20%">เลขประจำตัว</th>
                <th scope="col" style="width: 25%">ชื่อ</th>
                <th scope="col" style="width: 25%">นามสกุล</th>
                <th scope="col" style="width: 10%">แก้ไข</th>
                <th scope="col" style="width: 10%">ลบ</th>
              </tr>
            </thead>
            <tbody>
                <?php
                //$query = "SELECT * FROM patient";
                //$search_result = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($search_result)){
                    $Patient_id = $data['Patient_id'];
                ?>
              <tr>
                <th scope="row"><?=$data['Patient_id']?></th>
                <td class="text-start"><?=$data['Patient_prefix']?> <?=$data['Patient_name']?></td>
                <td class="text-start"><?=$data['Patient_sname']?></td>
                <td><a href="UpdateP_edit.php?Patient_id=<?php echo $Patient_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a></td>
                <!--ปุ่มลบ-->
                <td><div class="col-lg-12 text-center">
                    <a href="UpdateP_delete.php?patient_id=<?php echo $Patient_id?>"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></a>
              </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>