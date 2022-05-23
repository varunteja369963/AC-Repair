<html>
<body>
    <?php
  include '../session.php';
  $id = $_POST['id'];

 
      $select = "SELECT * FROM `customer` WHERE `id`=$id";
      $result = $conn->query($select);
      $row = $result->fetch_assoc();
      $brand=$row['brand'];
      $appliance = $row['appliance'];
      $selected = $row['repairedOrNot'];

      if ($result->num_rows > 0) {
        echo '<div class = "customer-form">
        <table class = "customer-form-table">
          <tr>
            <td class = "heading3">Name<td>
            <td class = "table-body">';
             echo "<input type = 'text' class = 'cust-uname' id = 'cust-uname4' value = '".$row['customerName']."' />";
              echo '<div class = "add-customer-ack" id = "cust-uname-ack4"></div>
            </td>
        </tr>
        <tr>
            <td class = "heading3">Mobile<td>
            <td class = "table-body">
              <input type = "text" class = "cust-mobile" id = "cust-mobile4" value = '.$row['mobile'].'>
              <div class = "add-customer-ack" id = "cust-mobile-ack4"></div>          
            </td>
        </tr>
        <tr>
            <td class = "heading3">Area<td>
            <td class = "table-body">';
            
        echo "<input type = 'text' class = 'cust-area' id = 'cust-area4' value = '".$row['area']."' />";
              echo '<div class = "add-customer-ack" id = "cust-area-ack4"></div>        
          </td>
        </tr>
        <tr>
            <td class = "heading3">Brand<td>
            <td class = "table-body">
            <div class = "select-product-options" id = "cust-brand4">
            <label class="container">SAMSUNG
                <input type = "radio" id = "SAMSUNG" name = "brand" value = "SAMSUNG">
                <span class="checkmark"></span>
              </label>
              <label class="container">LG
                <input type = "radio" name = "brand" id = "LG" value = "LG">
                <span class="checkmark"></span>
              </label>
              <label class="container">IFB
                <input type = "radio" name = "brand" id = "IFB" value = "IFB">
                <span class="checkmark"></span>
              </label>
              <label class="container">WHIRLPOOL
              <input type = "radio" name = "brand" id = "WHIRLPOOL" value = "WHIRLPOOL">
              <span class="checkmark"></span>
            </label>
              <label class="container">GODREJ
                <input type = "radio" name = "brand" id = "GODREJ" value = "GODREJ">
                <span class="checkmark"></span>
              </label>
              <label class="container">VIDEOCON
              <input type = "radio" name = "brand" id = "VIDEOCON" value = "VIDEOCON">
              <span class="checkmark"></span>
            </label>
            <label class="container">Others
            <input type = "radio" name = "brand" id = "Others" value = "Others">
            <span class="checkmark"></span>
          </label>
        </div>
        <div class = "add-customer-ack" id = "cust-brand-ack4"></div>
            </td>
        </tr>
        <tr>
            <td class = "heading3">Appliance<td>
            <td class = "table-body">
            <div class = "select-product-options" id = "cust-appliance4">
            <label class="container">Washing Machine
                <input type = "radio" id = "wm" name = "prdouct" value = "Washing Machine">
                <span class="checkmark"></span>
              </label>
              <label class="container">Refrigerator
                <input type = "radio" id = "ref" name = "prdouct" value = "Refrigerator">
                <span class="checkmark"></span>
              </label>
              <label class="container">MicroWave Oven
                <input type = "radio" id = "mo" name = "prdouct" value = "Microwave Oven">
                <span class="checkmark"></span>
              </label>
              <label class="container">Air Conditioner(AC)
                <input type = "radio" id = "ac" name = "prdouct" value = "Air Conditioner">
                <span class="checkmark"></span>
              </label>
              <label class="container">Others
              <input type = "radio" id = "others" name = "prdouct" value = "Others">
              <span class="checkmark"></span>
            </label>
        </div>
        <div class = "add-customer-ack" id = "cust-appliance-ack4"></div>
            </td>
        </tr>
        <tr>
        <td class = "heading3">Technician<td>
            <td class = "table-body">
             <input type = "text" class = "technician" id = "technician" value = '.$row['technician'].'>
          <div class = "add-customer-ack" id = "cust-technician-ack4"></div>
          </td>
        </tr>
         <tr>
        <td class = "heading3">AGT<td>
        <td class = "table-body">
          <input type = "text" class = "agt" id = "agt" value = '.$row['agt'].'>
          <div class = "add-customer-ack" id = "cust-agt-ack4"></div>
        </td>
    </tr>
        <tr>
        <td class = "heading3">Amount<td>
        <td class = "table-body">
          <input type = "text" class = "cust-amount" id = "cust-amount4" value = '.$row['amount'].'>
          <div class = "add-customer-ack" id = "cust-mobile-ack4"></div>
        </td>
    </tr>
    <tr>
    <td class = "heading3">Repaired Date<td>
    <td class = "table-body">
      <input type = "date" class = "cust-repairedDate" id = "cust-repairedDate4">
    </td>
</tr>
<tr>
    <td class = "heading3">Repaired<td>
    <td class = "table-body">
    <div class = "select-product-options" id = "cust-repaired4">
        <label class="container">Yes
        <input type = "radio" id = "yes" name = "repaired" value = "yes">
        <span class="checkmark"></span>
        </label>
        <label class="container">No
        <input type = "radio" id = "no" name = "repaired" value = "no">
        <span class="checkmark"></span>
    </div>
    </label>
</td>
</tr>
<tr id = "cust-issue-row">
<td class = "heading3">Issue<td>
<td class = "table-body">
  <textarea class = "cust-issue" id = "cust-issue4"></textarea>
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
<script>
function checkSelected() {
    var brandSelected = "<?php Print($brand); ?>";
    $("#"+brandSelected).prop('checked', true);
    
    var applianceSelected_bef = "<?php Print($appliance); ?>";
    var applianceSelected = "others";
    if (applianceSelected_bef == "Washing Machine") {
       applianceSelected = "wm";
    }
    else if (applianceSelected_bef == "Refrigerator") {
       applianceSelected = "ref";
    }
    else if (applianceSelected_bef == "Microwave Oven") {
       applianceSelected = "mo";
    }
    else if (applianceSelected_bef == "Air Conditioner") {
       applianceSelected = "ac";
    }
    else {
        applianceSelected = "others";
    }
    $("#"+applianceSelected).prop('checked', true);

    var selected = "<?php Print($selected); ?>";
    if (selected=='yes'||selected=='no') {
      $("#"+selected).prop('checked', true);      
    }
}
checkSelected();
</script>
</body>
</html>
