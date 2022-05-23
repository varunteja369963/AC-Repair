<?php 
  include 'session.php';
  include 'format.php'; 
?>
<?php include 'header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'navbar.php'; ?>
  <?php include 'menubar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $select_total_visited = "SELECT `id` FROM `traffic`";
                $result_total_visited = $conn->query($select_total_visited);
                $num_total_visited = $result_total_visited->num_rows;
                echo "<h3> ".$num_total_visited."</h3>";
              ?>
              <p>Total Visited</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href = "moreinfo.php?q=totalVisited" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $date = date("Y-m-d");
                $select_today_visited = "SELECT `id`, `dateVisited` FROM `traffic`WHERE `dateVisited` >= CURDATE()";
                $result_today_visited = $conn->query($select_today_visited);
                $num_today_visited = $result_today_visited->num_rows;
                echo "<h3> ".$num_today_visited."</h3>";
              ?>
          
              <p>Today Visited</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href = "moreinfo.php?q=todayVisited" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

            <?php
                $select_total_visited = "SELECT `id` FROM `customer`";
                $result_total_visited = $conn->query($select_total_visited);
                $num_total_visited = $result_total_visited->num_rows;
                echo "<h3> ".$num_total_visited."</h3>";
              ?>

              <p>Total Customers</p>
            </div>
            <div class="icon">
              <i class="fa fa-usd"></i>
            </div>
            <a href = "moreinfo.php?q=totalCustomers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

              <?php
              $date = date("Y-m-d");
              $select_today_visited = "SELECT `id`, `complainedDate` FROM `customer` WHERE `complainedDate` >= CURDATE()";
              $result_today_visited = $conn->query($select_today_visited);
              $num_today_visited = $result_today_visited->num_rows;
              echo "<h3> ".$num_today_visited."</h3>";
            ?>

              <p>Today Customers</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href = "moreinfo.php?q=todayCustomers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      </section>
      <!-- right col -->

      <section class = "customer-record">
        <div class = "customer-record-header">
        <button class="btn btn-info reVisited-customer" id = "reVisited-customer">
            <span class = "existing-symbol"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
            Existing
          </button>

          <button class="btn btn-primary add-customer" id = "add-customer">
            <span class = "new-symbol">&#43;</span>
            New
          </button>
        </div>

      <div class = "search-box-with-dropdown">
      <div class="input-group mt-3 mb-3 input-group-lg search-box-group">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-option search-with-options" data-toggle="dropdown">
      Search <span class = "with-appended">with</span>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Customer Id</a>
      <a class="dropdown-item" href="#">Customer Name</a>
      <a class="dropdown-item" href="#">Mobile Number</a>
      <a class="dropdown-item" href="#">Area</a>
      <a class="dropdown-item" href="#">Appliance</a>
      <a class="dropdown-item" href="#">Brand</a>
    </div>
  </div>
  <input type="text" class="form-control form-data" id = "form-data" placeholder="Please type something...">
  <div class="input-group-append">
    <button class="btn" type="submit"><i class ="fa fa-search"></i></button>
  </div>
</div> 
    </div>

<div class="container mt-3">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
     
    <div class = "customer-form">
      <table class = "customer-form-table">
        <tr>
          <td class = "heading">Name<td>
          <td class = "table-body">
            <input type = "text" class = "cust-uname" id = "cust-uname">
            <div class = "add-customer-ack" id = "cust-uname-ack"></div>
          </td>
      </tr>
      <tr>
          <td class = "heading">Mobile<td>
          <td class = "table-body">
            <input type = "text" class = "cust-mobile" id = "cust-mobile">
            <div class = "add-customer-ack" id = "cust-mobile-ack"></div>          
          </td>
      </tr>
      <tr>
          <td class = "heading">Area<td>
          <td class = "table-body">
            <input type = "text" class = "cust-area" id = "cust-area">
            <div class = "add-customer-ack" id = "cust-area-ack"></div>        
        </td>
      </tr>
      <tr>
          <td class = "heading">Brand<td>
          <td class = "table-body">
          <select name="cust-brand" id = "cust-brand" class="custom-select mb-3">
                <option selected>Please Select</option>
                <option>SAMSUNG</option>
                <option>LG</option>
                <option>IFB</option>
                <option>WHIRLPOOL</option>
                <option>GODREJ</option>
                <option>VIDEOCON</option>
                <option>Others</option>
            </select>
            <div class = "add-customer-ack" id = "cust-brand-ack"></div>
          </td>
      </tr>
      <tr>
          <td class = "heading">Appliance<td>
          <td class = "table-body">
          <select name="cust-appliance" id = "cust-appliance" class="custom-select mb-3">
                <option selected>Please Select</option>
                <option>Washing Machine</option>
                <option>Refrigerator</option>
                <option>Microwave Oven</option>
                <option>Air Conditioner</option>
                <option>Others</option>
            </select>
            <div class = "add-customer-ack" id = "cust-appliance-ack"></div>
          </td>
      </tr>
      
      </table>
    </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id = "save-customer">Save</button>
        </div> 
      </div>
    </div>
  </div>
</div>


<div class="container mt-3">
  <!-- The Modal -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Existing User</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
      <div class="input-group mt-3 mb-3 input-group search-box-group2">
        <input type="text" class="form-control modal2-searchBox" id = "modal2-searchBox" placeholder="Customer Id">
  <div class="input-group-append">
    <button class="btn" type="submit" id = "search"><i class ="fa fa-search"></i></button>
  </div>
      </div>
  <div id = "modal2-searchBox-ack"></div>

          <div id = "modal-body-container"></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <div id = "modal2-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id = "save-customer2">Save</button>
      </div>
        </div>  
      </div>
    </div>
  </div>
</div>


<div class="container mt-3">
  <!-- The Modal -->
  <div class="modal fade" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">View Info</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div id = "modal-body-container2"></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger viewDetailsClose" data-dismiss="modal">Close</button>
        </div>  
      </div>
    </div>
  </div>
</div>

<div class="container mt-3">
  <!-- The Modal -->
  <div class="modal fade" id="myModal4">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Info</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div id = "modal-body-container4"></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <div id = "modal4-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id = "edit-customer">Edit</button>
      </div>
        </div>  
      </div>
    </div>
  </div>
</div>

<div class = "about-customer">
  <div id = "table-body1">
    <table class = "customer-table">
      <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Area</th>
        <th>Date</th>
        <th>Brand</th>
        <th>Appliance</th>
        <th>Full Details</th>
      </thead>
      <tbody>
      <?php
        $select = "SELECT * FROM `customer` ORDER BY `id` DESC";
        $result = $conn->query($select);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>';
            if ($row['repairedOrNot']==='no') {
               echo '<span class = "failed_status_mark"></span>';
            }
            else if ($row['repairedOrNot']==='yes') {
                echo '<span class = "success_status_mark"></span>'; 
            }
            else {
               echo '<span class = "pending_status_mark"></span>';  
            }
            echo $row['customerId'].'</td>';
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
        }
    ?>
      </tbody>
    </table>
    </div>
    <div id = "table-body2"></div>
  </div>
  </section>
    </div>
  	<!--<?/* include 'includes/footer.php'; */?>-->
</div>
<!-- ./wrapper -->

<?php include 'scripts.php'; ?>
<?php $conn->close(); ?>
</body>
</html>
