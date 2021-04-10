<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-virus"></i>
        </div>
        <div class="sidebar-brand-text mx-5">CTIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Test Centre Manager
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tc_manager/'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tc_manager/tcm_testcentre'); ?>">
            <i class="far fa-fw fa-hospital"></i>
            <!-- REGISTER TEST CENTRE --><span>Register Test Centre</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tc_manager/tcm_recordtester'); ?>">
            <i class="fas fa-fw fa-user-nurse"></i>
            <!-- RECORD TESTER --><span>Add New Tester</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-first-aid"></i>
            <!-- Manage Kit Stock --><span>Manage Test Kit Stock</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->