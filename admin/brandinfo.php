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
  $brand = $_REQUEST['brand'];

  if ($q == 'totalVisited') {
    $select = "SELECT * FROM `traffic` WHERE brand='".$brand."' ORDER BY `id` DESC";
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
        $select = "SELECT * FROM `traffic` WHERE brand='".$brand."' AND `dateVisited` >= CURDATE() ORDER BY `id` DESC";
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
    
$conn->close();
?>
</body>
</html>