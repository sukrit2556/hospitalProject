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
require("conn_db.php");     
$bill_no = $_GET['bill_no'];
$sql_submit = "update bill set bill_status = 1 where bill_no = $bill_no;";
$sql_pre= "update prescription set pre_status = 1 where bill_no = $bill_no;";
$sql_update = "select d.Drug_id,d.Drug_name, d.Drug_price * p.Pre_dose as total, p.pre_dose from prescription p inner join drug d on bill_no = $bill_no and d.drug_id = p.drug_id;";
mysqli_query($conn,$sql_submit);
mysqli_query($conn,$sql_pre);
$stock = mysqli_query($conn,$sql_update) or die("Error".$sql_update);

while($stockUpdate = mysqli_fetch_array($stock))
{
    $qty = (int)$stockUpdate['pre_dose'];
    $id = (int)$stockUpdate['Drug_id'];
    $sql_stock = "update drug set drug_stock = drug_stock - $qty where drug_id = $id ";
    mysqli_query($conn,$sql_stock) or die("Error".$sql_stock);
}

?>
    <script>
                            alert("ยืนยันเรียบร้อย");
                            window.location = "TS1bill_tb.php";
    </script>