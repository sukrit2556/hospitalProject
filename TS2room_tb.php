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
    <title>ข้อมูลเตียงผู้ป่วย</title>
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
                        <a href="TS2room_tb.php" class="nav-link">ข้อมูลเตียงผู้ป่วย</a>
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
                <h3 class="mb-4">ข้อมูลเตียงผู้ป่วย</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="container">
                <div class="div">
                    <form name="form" method="post">
                    <h6 class="mb-4 text-end">สถานะ : <input type="text" name="search_id" id="#" placeholder="ค้นหา"> <input type="submit" class="btn btn_plearn btn-light" name="btn" value="ค้นหา"></input></input></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="container">
                <div class="div">
                    <h6 class="mb-4 text-start">แผนก : <input type="text" id="#" placeholder="ค้นหา"> </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="table-wrapper-scroll-y1 my-custom-scrollbar1 container text-center mt-2 px-5">

    <?php
    if(isset($_POST['btn']))
    {
        $search_id = $_POST['search_id'];
        // search in all table columns
        if($search_id == 'ไม่ว่าง') {
            $query = "SELECT * FROM room WHERE Room_status = 0";
            $search_result = filterTable($query);
        }
        else if ($search_id == 'ว่าง') {
            $query = "SELECT * FROM room WHERE Room_status = 1";
            $search_result = filterTable($query);
        }
        else {
            $query = "SELECT * FROM room";
            $search_result = filterTable($query);
        }
        
    }
     else {
        $query = "SELECT * FROM room";
        $search_result = filterTable($query);
    }
    
    //function to connect and execute the query
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
                <th scope="col" style="width: 10%">เลขห้อง</th>
                <th scope="col" style="width: 10%">ชนิด</th>
                <th scope="col" style="width: 10%">สถานะห้อง</th>
                <th scope="col" style="width: 25%">อาคาร</th>
                <th scope="col" style="width: 10%">ชั้น</th>
                <th scope="col" style="width: 25%">แผนก</th>
                <th scope="col" style="width: 10%">เพิ่มคนไข้</th>
              </tr>
            </thead>
            <tbody>
                <?php
                //$query = "SELECT * FROM room";
                //$search_result = mysqli_query($conn, $query);
                while($data = mysqli_fetch_array($search_result)){
                    $search_id = $data['Room_id'];
                    $Room_id = $data['Room_id'];
                ?>
              <tr>
                <th scope="row"><?=$data['Room_id']?></th>
                <td><?=$data['Room_type']?></td>
                <?php if($data['Room_status'] == 1){ ?>
                    <td>ว่าง</td>
                <?php } else { ?>
                    <td>ไม่ว่าง</td>
                <?php } ?>
                <td><?=$data['Room_building']?></td>
                <td><?=$data['Room_floor']?></td>
                <td>###</td>
                <!-------------------------------------------------------------------------->
                <?php
                if($data['Room_status']==0) { ?>
                    <td><a href="TS2room_added.php?Room_id=<?php echo $Room_id ?>">ดูรายละเอียด</a></td>
                <?php
                } else if ($data['Room_status']==1) { ?>
                    <td><a href="TS2room_add.php?Room_id=<?php echo $Room_id ?>">เพิ่ม</a></td>
                <?php
                }
                ?>
                <!--------------------------------------------------------------------------->
              </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>