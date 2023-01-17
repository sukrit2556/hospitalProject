<?php
session_start();
include("conn_db.php");
if(isset($_SESSION['username'])) {
    if($_SESSION['role'] == "doctor") {
        header("Location: TS3patient_tb.php");
    } else if($_SESSION['role'] == "Cashier") {
        header("Location: TS1bill_tb.php");
    } else if($_SESSION['role'] == "registrator") {
        header("Location: home_registrator.php");
    } else if($_SESSION['role'] == "bed registrator") {
        header("Location: TS2room_tb.php");
    } else if($_SESSION['role'] == "pharmacist") {
        header("Location: drug_tb.php");
    } else if($_SESSION['role'] == "admin") {
        header("Location: admin.php");
    } else if($_SESSION['role'] == "patient") {
        header("Location: 404.php");
    }
}
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
    <title>โรงพยาบาลโควิดกระจอก | Login</title>
</head>
<body>
    <nav class="navebar nave navbar-expand-lg navbar-dark">
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
                        <a href="index1.html" class="nav-link">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">บริการสำหรับผู้ป่วย</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navdarDropdownMenu" data-bs-toggle="dropdown">เกี่ยวกับเรา</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                            <li><a href="#" class="dropdown-item">Menu 1</a></li>
                            <li><a href="#" class="dropdown-item">Menu 2</a></li>
                            <li><a href="#" class="dropdown-item">Menu 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle" id="navdarDropdownMenu" data-bs-toggle="dropdown">สื่อสารการติดต่อ</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                            <li><a href="#" class="dropdown-item">Menu 1</a></li>
                            <li><a href="#" class="dropdown-item">Menu 2</a></li>
                            <li><a href="#" class="dropdown-item">Menu 3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-8 d-none d-lg-block">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1650840900664-740d459e1295?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>ผู้นำด้านการแพทย์ครบวงจร</h5>
                        <p class="d-none d-xl-block">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam harum consequuntur adipisci libero officiis provident enim eos, necessitatibus temporibus minima?</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1650880218823-90dd3c51b33b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1190&q=80" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>บริการทั่วประเทศและทั่วโลก</h5>
                        <p class="d-none d-xl-block">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam harum consequuntur adipisci libero officiis provident enim eos, necessitatibus temporibus minima?</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1648737966661-22e0c69d5aa5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>ทันสมัยที่สุดในเอเชีย</h5>
                        <p class="d-none d-xl-block">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam harum consequuntur adipisci libero officiis provident enim eos, necessitatibus temporibus minima?</p>
                    </div>  
                </div>
                </div>
              </div>
        </div>
        <div class="col-lg-4">
            <div class="container text-center mt-5">
                <div class="div px-lg-2 px-xl-5">
                    <h2 class="mb-4">ลงชื่อเข้าสู่ระบบ</h2>
                    <hr>
                </div>
                <div class="mb-3 px-lg-2 px-xl-5">
                    <form action="check_login.php" method="post" name="login_form_employee" id="login">
                        <input name="username" type="text" class="form-control login-form-field mt-4 mb-2" id="exampleFormControlInput1" placeholder="Username">
                        <input name="password" type="password" class="form-control login-form-field mb-3" id="exampleFormControlInput1" placeholder="Password">
                        <button name="login_button" type="submit" class="btn btn-outline-info btn-login_field">เข้าสู่ระบบ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer-absolute">
      <div class="container py-3">
        <p>ข้อกำหนดความเป็นส่วนตัว | นโยบาย Cookie
          Copyright © 2022 CovidKrajok Hospital. All right reserved</p>
      </div>
    </footer>
</body>
</html>