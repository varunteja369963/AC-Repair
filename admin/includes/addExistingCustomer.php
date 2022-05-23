<?php
date_default_timezone_set("Asia/Kolkata"); 
include_once('../conn.php');

$custId = $_POST['custId'];
$custUname = $_POST['custUname'];
$custMobile = $_POST['custMobile'];
$custArea = $_POST['custArea'];
$complainedDate = date("Y-m-d H:i:s");
$custBrand = $_POST['custBrand'];
$custAppliance = $_POST['custAppliance'];

$insert = $conn->prepare("INSERT INTO `customer` (`customerId`, `customerName`, `mobile`, `area`, `complainedDate`, `brand`, `appliance`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$insert->bind_param("sssssss", $custId, $custUname, $custMobile, $custArea, $complainedDate, $custBrand, $custAppliance);
$insert->execute();
$insert->close();

$conn->close();
?>