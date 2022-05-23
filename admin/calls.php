<?php 
  include 'session.php';
  include 'format.php';
  $q=$_REQUEST['q'];
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
        Contacts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">AA Calls</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class = "about-contact">
  <div id = "table-body1">
    <table class = "customer-table">
      <thead>
        <th>Date</th>
        <th>Path</th>
      </thead>
      <tbody>
      <?php
      if ($q == 'calls') {
          $select = "SELECT * FROM `calls` ORDER BY `id` DESC";
      }
      else {
        $select = "SELECT * FROM `calls` `dateVisited` >= CURDATE() ORDER BY `id` DESC";
      }
      $count=0;
        $result = $conn->query($select);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $count++;
            echo '<tr>';
            echo '<td>'.$count.'</td>';
            echo '<td>'.$row['dateVisited'].'</td>';
            echo '<td>'.$row['path'].'</td>';            
            echo '</tr>';
          }
        }
    ?>
      </tbody>
    </table>
    </div>
  </div>
      </section>
      <!-- right col -->
    </div>
  	<!--<?/* include 'includes/footer.php'; */?>-->
</div>
<!-- ./wrapper -->

<?php include 'scripts.php'; ?>
<?php $conn->close(); ?>
</body>
</html>
