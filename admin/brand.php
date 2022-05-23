<?php 
  include 'session.php';
  include 'format.php';
  $brand = mysqli_real_escape_string($conn, $_REQUEST['brand']); 
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
      <?php echo strtoupper($brand); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $brand; ?></li>
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
             //echo $brand;
                $select_total_visited = "SELECT `id` FROM `traffic` WHERE brand='".$brand."'";
                $result_total_visited = $conn->query($select_total_visited);
                $num_total_visited = $result_total_visited->num_rows;
                echo "<h3> ".$num_total_visited."</h3>";
              ?>
              <p>Total Visited</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href = "brandinfo.php?q=totalVisited&brand=<?php echo $brand; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $date = date("Y-m-d");
                $select_today_visited = "SELECT `id`, `dateVisited` FROM `traffic` WHERE `brand`='".$brand."' AND `dateVisited` >= CURDATE()";
                $result_today_visited = $conn->query($select_today_visited);
                $num_today_visited = $result_today_visited->num_rows;
                echo "<h3> ".$num_today_visited."</h3>";
              ?>
          
              <p>Today Visited</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href = "brandinfo.php?q=todayVisited&brand=<?php echo $brand; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

            <?php
                $select_total_visited = "SELECT `id` FROM `contact` WHERE `brand`='".$brand."'";
                $result_total_visited = $conn->query($select_total_visited);
                $num_total_visited = $result_total_visited->num_rows;
                echo "<h3> ".$num_total_visited."</h3>";
              ?>

              <p>Total Contacts</p>
            </div>
            <div class="icon">
              <i class="fa fa-usd"></i>
            </div>
            <a href = "contactInfo.php?q=totalContact&brand=<?php echo $brand; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

              <?php
              $date = date("Y-m-d");
              $select_today_visited = "SELECT `id`, `dateVisited` FROM `contact` WHERE `brand`='".$brand."' AND `dateVisited` >= CURDATE()";
              $result_today_visited = $conn->query($select_today_visited);
              $num_today_visited = $result_today_visited->num_rows;
              echo "<h3> ".$num_today_visited."</h3>";
            ?>

              <p>Today Contacts</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href = "contactInfo.php?q=todayContact&brand=<?php echo $brand; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      </section>
      <!-- right col -->

      <section class = "customer-record">
      <div class = "about-contact">
  <div id = "table-body1">
    <table class = "customer-table">
      <thead>
        <th>Path</th>
        <th>Date</th>
        <th>Brand</th>
        <th>Mobile</th>
      </thead>
      <tbody>
      <?php
        $select = "SELECT * FROM `connect` WHERE `brand`='".$brand."' ORDER BY `id` DESC";
        $result = $conn->query($select);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row['path'].'</td>';
            echo '<td>'.$row['dateVisited'].'</td>';
            echo '<td>'.$row['brand'].'</td>';
            echo '<td>'.$row['mobile'].'</td>';           
            echo '</tr>';
          }
        }
    ?>
      </tbody>
    </table>
    </div>
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
