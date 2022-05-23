<?php
  include '../session.php';
  $inputData = $_POST['inputData'];


      $select = "SELECT * FROM `customer` WHERE `customerId`=$inputData";
      $result = $conn->query($select);
      $row = $result->fetch_assoc();
      if ($result->num_rows > 0) {
        echo '<div class = "customer-form">
        <div><b>Complained Date:&nbsp;&nbsp;</b>'.$row['complainedDate'].'</div>

        <table class = "customer-form-table">
          <tr>
            <td class = "heading">Name<td>
            <td class = "table-body">
              <input type = "text" class = "cust-uname" id = "cust-uname2" value = '.$row['customerName'].'>
              <div class = "add-customer-ack" id = "cust-uname-ack2"></div>
            </td>
        </tr>
        <tr>
            <td class = "heading">Mobile<td>
            <td class = "table-body">
              <input type = "text" class = "cust-mobile" id = "cust-mobile2" value = '.$row['mobile'].'>
              <div class = "add-customer-ack" id = "cust-mobile-ack2"></div>          
            </td>
        </tr>
        <tr>
            <td class = "heading">Area<td>
            <td class = "table-body">
              <input type = "text" class = "cust-area" id = "cust-area2" value = '.$row['area'].'>
              <div class = "add-customer-ack" id = "cust-area-ack2"></div>        
          </td>
        </tr>
        <tr>
            <td class = "heading">Brand<td>
            <td class = "table-body">
            <select name="cust-brand" id = "cust-brand2" class="custom-select mb-3">
                  <option selected>Please Select</option>
                  <option>SAMSUNG</option>
                  <option>LG</option>
                  <option>IFB</option>
                  <option>WHIRLPOOL</option>
                  <option>GODREJ</option>
                  <option>VIDEOCON</option>
                  <option>Others</option>
              </select>
              <div class = "add-customer-ack" id = "cust-brand-ack2"></div>
            </td>
        </tr>
        <tr>
            <td class = "heading">Appliance<td>
            <td class = "table-body">
            <select name="cust-appliance" id = "cust-appliance2" class="custom-select mb-3">
                  <option selected>Please Select</option>
                  <option>Washing Machine</option>
                  <option>Refrigerator</option>
                  <option>Microwave Oven</option>
                  <option>Air Conditioner</option>
                  <option>Others</option>
              </select>
              <div class = "add-customer-ack" id = "cust-appliance-ack2"></div>
            </td>
        </tr>
        
        </table>
      </div>';
      }
      else {
        echo 'No records found..';
      }
$conn->close();
?>