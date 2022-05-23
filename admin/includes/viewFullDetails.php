<?php
  include '../session.php';
  $id = $_POST['id'];


      $select = "SELECT * FROM `customer` WHERE `id`=$id";
      $result = $conn->query($select);
      $row = $result->fetch_assoc();
      if ($result->num_rows > 0) {
        echo '<div class = "customer-info">
        <table class = "customer-info-table">
        <tr>
        <td class = "heading2">Cust Id<td>
      <td class = "table-body">'.$row['customerId'].'</td>
    </tr>
          <tr>
            <td class = "heading2">Name<td>
            <td class = "table-body">'.$row['customerName'].'</td>
        </tr>
        <tr>
            <td class = "heading2">Mobile<td>
            <td class = "table-body">'.$row['mobile'].'</td>
        </tr>
        <tr>
            <td class = "heading2">Area<td>
            <td class = "table-body">'.$row['area'].'</td>
        </tr>
        <tr>
        <td class = "heading2">Compained Date<td>
        <td class = "table-body">'.$row['complainedDate'].'</td>
    </tr>
        <tr>
            <td class = "heading2">Brand<td>
            <td class = "table-body">'.$row['brand'].'</td>
        </tr>
        <tr>
            <td class = "heading2">Appliance<td>
            <td class = "table-body">'.$row['appliance'].'</td>
        </tr>
        <tr>
            <td class = "heading2">Amount<td>
            <td class = "table-body">'.$row['amount'].'</td>
        </tr>
        <tr>
            <td class = "heading2">Repaired Date<td>
            <td class = "table-body">'.$row['repairedDate'].'</td>
        </tr>
        <tr>
        <td class = "heading2">Repaired<td>
        <td class = "table-body">'.$row['repairedOrNot'].'</td>
    </tr>';
    if ($row['repairedOrNot'] == 'no') {
    echo '<tr>
        <td class = "heading2">Issue<td>
        <td class = "table-body">'.$row['issue'].'</td>
    </tr>';
    }

    echo '</table>
      </div>';
      }
      else {
        echo 'No records found..';
      }
$conn->close();
?>