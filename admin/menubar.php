<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="https://ac-customer-care.in/admin/dist/img/hific_logo.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['username']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
      <li class="header">MANAGE</li>
      <li><a href="brand.php?brand=acrepair"><i class="fa fa-line-chart"></i> <span>AC Repair</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>