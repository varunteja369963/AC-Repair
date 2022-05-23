<?php
  include '../session.php';

$inputData = $_POST['inputData'];
$select = "SELECT * FROM customer
    WHERE `customerId` LIKE '%".$inputData."%' OR `customerName` LIKE '%".$inputData."%' OR 
    `mobile` LIKE '%".$inputData."%' OR `area` LIKE '%".$inputData."%' OR `brand` LIKE '%".$inputData."%' OR 
    `appliance` LIKE '%".$inputData."%'";
if ($result = mysqli_query($conn, $select)) {
    if(mysqli_num_rows($result) > 0){
    echo '<table class = "customer-table">';
    echo '<thead>';
    echo '<th>Id</th>';
    echo '<th>Name</th>';
    echo '<th>Mobile</th>';
    echo '<th>Area</th>';
    echo '<th>Date</th>';
    echo '<th>Brand</th>';
    echo '<th>Appliance</th>';
    echo '<th>Full Details</th>';
    echo '</thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'.$row['customerId'].'</td>';
    echo '<td>'.$row['customerName'].'</td>';
    echo '<td>'.$row['mobile'].'</td>';
    echo '<td>'.$row['area'].'</td>';
    echo '<td>'.$row['complainedDate'].'</td>';
    echo '<td>'.$row['brand'].'</td>';
    echo '<td>'.$row['appliance'].'</td>';
    echo "<td><button type='button' class='btn btn-info btn-sm btn-flat transact' id ='viewFullDetails' data-cust-id=".$row['id']."><i class='fa fa-search'></i>View</button>";
    echo "<button type='button' class='btn btn-primary btn-sm btn-flat transact editCustomerDetails' id ='editCustomerDetails' data-cust-id=".$row['id']."><i class='fa fa-pencil-square-o' aria-hidden='true'></i>
    Edit</button></td>"; 
    echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
else {
    echo 'No results found....';
}
}
else {
    echo 'No results found...';
}
$conn->close();
?>