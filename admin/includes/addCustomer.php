<?php
date_default_timezone_set("Asia/Kolkata"); 
include_once('../conn.php');

$custUname = $_POST['custUname'];
$custMobile = $_POST['custMobile'];
$custArea = $_POST['custArea'];
$complainedDate = date("Y-m-d H:i:s");
$custBrand = $_POST['custBrand'];
$custAppliance = $_POST['custAppliance'];
$custId = "";
$tokenExists = true;

do {
    $key = '';
    $length = 6;
    $keys = array_merge(range(0, 9));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    $custId = $key;
  
    $select = "SELECT `customerId` FROM `customer` WHERE `customerId` = $custId";
    $result = $conn->query($select);
    if ($result->num_rows<= 0) {
        $tokenExists = false;
    }
} while($tokenExists);


$insert = $conn->prepare("INSERT INTO `customer` (`customerId`, `customerName`, `mobile`, `area`, `complainedDate`, `brand`, `appliance`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$insert->bind_param("sssssss", $custId, $custUname, $custMobile, $custArea, $complainedDate, $custBrand, $custAppliance);
$insert->execute();
$insert->close();

$conn->close();
?>