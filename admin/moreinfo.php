<html>
    <head>
        <title>More Info-AA</title>
        <style>
            table {
               width: 90%;
               border-collapse: collapse;
                margin-left: auto;
                margin-right: auto;
                margin-top: 20px;
            }

            thead th {
               padding-top: 12px;
               padding-bottom: 12px;
               text-align: center;
               background-color: #0084b4;
               color: white;

            }

            tr:nth-child(2n) {
                background-color: #f2f2f2;
            }

             tbody td{
                border: 1px solid #ddd;
                 padding: 10px;
            }
        </style>
    </head>
<body>
<?php
  include 'session.php';

  $q = $_REQUEST['q'];

  if ($q == 'totalVisited') {
    $select = "SELECT * FROM `traffic` ORDER BY `id` DESC";
    if ($result = mysqli_query($conn, $select)) {
        if(mysqli_num_rows($result) > 0){
            echo '<table class = "customer-table">';
            echo '<thead>';
            echo '<th>Brand</th>';
            echo '<th>Date Visited</th>';
            echo '<th>Path</th>';
            echo '</thead>';
            echo '<tbody>';
            while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$row['brand'].'</td>';
            echo '<td>'.$row['dateVisited'].'</td>';
            echo '<td>'.$row['path'].'</td>';
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
            echo 'No results found....';
        }
    }
    else if ($q == 'todayVisited') {
        $select = "SELECT * FROM `traffic` WHERE `dateVisited` >= CURDATE() ORDER BY `id` DESC";
        if ($result = mysqli_query($conn, $select)) {
            if(mysqli_num_rows($result) > 0){
                echo '<table class = "customer-table">';
                echo '<thead>';
                echo '<th>Brand</th>';
                echo '<th>Date Visited</th>';
                echo '<th>Path</th>';
                echo '</thead>';
                echo '<tbody>';
                while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'.$row['brand'].'</td>';
                echo '<td>'.$row['dateVisited'].'</td>';
                echo '<td>'.$row['path'].'</td>';
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
                echo 'No results found....';
            }
        }
    else if ($q == 'totalCustomers') {
    $select = "SELECT * FROM `customer` ORDER BY `id` DESC";
    if ($result = mysqli_query($conn, $select)) {
        if(mysqli_num_rows($result) > 0){
            echo '<table class = "customer-table">';
            echo '<thead>';
            echo '<th>Id</th>';
            echo '<th>Name</th>';
            echo '<th>Mobile</th>';
            echo '<th>Area</th>';
            echo '<th>Complained Date</th>';
            echo '<th>Brand</th>';
            echo '<th>Appliance</th>';
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
            echo 'No results found....';
        }
    }
else if ($q == 'todayCustomers') {
$select = "SELECT * FROM `customer` WHERE `complainedDate` >= CURDATE() ORDER BY `id` DESC";
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
        echo 'No results found....';
    }
}
    
$conn->close();
?>
</body>
</html>