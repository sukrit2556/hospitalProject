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
    <!--ปฎิทิน-->
    <link href="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/css/datepicker3.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/js/locales/bootstrap-datepicker.th.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="icon" href="img/tab_logo.png">
    <title>ข้อมูลยา</title>
</head>



<body>

<?php 
require("conn_db.php");
$sql = "select * from drug";
$result = mysqli_query($conn,$sql) or die("Error".$sql);
?>

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
                        <a href="drug_tb.php" class="nav-link">ข้อมูลยา</a>
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
                <h3 class="mb-4">คลังยา</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="container">
                <div class="div">
                    <form name="form" method="post">
                    <h6 class="mb-4 text-end">หมายเลขยา : <input type="text" name="search_id" id="#2" placeholder="ค้นหา"> <input type="submit" class="btn btn_plearn btn-light" name="btn" value="ค้นหา"></input></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="container">
                <div class="div">
                <form name="form" method="post">
                    <h6 class="mb-4 text-start">ชื่อยา : <input type="text" id="#" name = "drug_name" placeholder="ค้นหา"><input type="submit" class="btn btn_plearn btn-light" name="btn1" value="ค้นหา"></input> </h6>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['btn']))
    {
        $search_id = $_POST['search_id'];
        if(!empty($search_id)) {
            $query = "select * from drug where drug_id = $search_id";
            $search_result = filterTable($query);}
        else{
            $query = "select * from drug";
            $search_result = filterTable($query);}
    }

        
     else {
        $query = "select * from drug";
        $search_result = filterTable($query);}

        if(isset($_POST['btn1']))
        {
            $drug_name = $_POST['drug_name'];
           if(!empty($drug_name)){
                $query = "select * from drug where drug_name like '%$drug_name%'";
                $search_result = filterTable($query);
            }
            else{
                $query = "select * from drug";
                $search_result = filterTable($query);}
        }
    
            
         else {
            $query = "select * from drug";
            $search_result = filterTable($query);}
    
    // function to connect and execute the query
    function filterTable($query)
    {
        $connect = mysqli_connect("localhost", "root", "", "b3_hospital");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
    ?>
    <div class=" container text-center mt-2 px-5">
        <table class="table table-striped table-bordered">
            <thead>
              <tr class="tab">
                <th scope="col" style="width: 20%">หมายเลขยา</th>
                <th scope="col" style="width: 40%">ชื่อยา</th>
                <th scope="col" style="width: 15%">ชนิด</th>
                <th scope="col" style="width: 15%">จำนวน</th>
                <th scope="col" style="width: 10%">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
            <?php
                 $i =1;
                 while($objResult = mysqli_fetch_array($search_result))
                 {?> 
              <tr>
              <td scope="row"><?php echo $objResult["Drug_id"];?></td>
                <td><?php echo $objResult["Drug_name"];?></td>
                <td><?php echo $objResult["Drug_type"];?></td>
                <td><?php echo $objResult["Drug_stock"];?></td>
                <td><a href="update_drug.php?drug_id=<?php echo $objResult["Drug_id"]?>" class=" text-center">ดูรายละเอียด</a></td>
              </tr>
              <?php $i++;
        }
         ?>
            </tbody>
        </table>
        <?php
mysqli_close($conn);
?>
    </div>

</body>
</html>
<script type="text/javascript">    
    $(document).ready(function(){
        $.fn.datepicker.defaults.language = 'th';
        $('.datepicker').datepicker();
    });
</script>