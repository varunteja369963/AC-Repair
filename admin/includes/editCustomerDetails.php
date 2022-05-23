<?php
date_default_timezone_set("Asia/Kolkata"); 
include_once('../conn.php');

$id = $_POST['id'];
$custUname = $_POST['custUname'];
$custMobile = $_POST['custMobile'];
$custArea = $_POST['custArea'];
$custBrand = $_POST['custBrand'];
$custAppliance = $_POST['custAppliance'];
$technician = $_POST['technician'];
$agt = $_POST['agt'];
$amount = $_POST['amount'];
$repairedDate = $_POST['repairedDate'];
$repaired = $_POST['repaired'];
$issue = $_POST['issue'];

$insert = $conn->prepare("UPDATE `customer` SET `customerName`=?, `mobile`=?, `area`=?, `brand`=?, `appliance`=?, `technician`=?, `agt`=?, `amount`=?, `repairedDate`=?, `repairedOrNot`=?, `issue` =? WHERE `id` = ?");
$insert->bind_param("ssssssssssss", $custUname, $custMobile, $custArea, $custBrand, $custAppliance, $technician, $agt, $amount, $repairedDate, $repaired, $issue, $id);
$insert->execute();
$insert->close();

$conn->close();
?>