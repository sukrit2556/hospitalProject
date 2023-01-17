<?php
include("conn_db.php");
session_start();
if(!isset($_SESSION['username'])){
?>
	<script>alert("Please login");
	window.location="index.html"</script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">Coming soon</h1>
    <a style="text-align: center;" class="logout-btn" href="logout.php">Logout</a>
</body>
</html>