<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        
        
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SPPD </b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SPPD</b> Aplikasi</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
             
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
              
                <ul class="dropdown-menu">
            
                  
                  
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
              
                <ul class="dropdown-menu">
                
               
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li> 
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   
            <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                   <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image">
                   <p> 
                      <?php echo $this->session->userdata('nama'); ?> / <?php echo $this->session->userdata('role'); ?>
                                           
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <div class="pull-right">
                                            <a href="<?php echo site_url('dashboard/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $this->session->userdata('nama'); ?> / <?php echo $this->session->userdata('role'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               
                   <li><a href="<?php echo base_url('index.php/dashboard');?>"><i class="fa fa-circle-o"></i>Dashboard</a></li>
              </ul>
            </li>
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Master Data Kegiatan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                     <?php if($this->session->userdata('role')=='Administrator'){
                ?>
                <li><a href="<?php echo base_url('index.php/program');?>"><i class="fa fa-circle-o"></i>Data Program</a></li>
                <li><a href="<?php echo base_url('index.php/kegiatans');?>"><i class="fa fa-circle-o"></i>Data Kegiatan</a></li>
                     <?php }?>
                <li><a href="<?php echo base_url('index.php/subkegiatans');?>"><i class="fa fa-circle-o"></i>Data Sub Kegiatan</a></li>
              
           
               
              </ul>
                 <?php if($this->session->userdata('role')=='Administrator'){
                ?>
            
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i> <span>Master Biaya</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                <li><a href="<?php echo base_url('index.php/biayaharian');?>"><i class="fa fa-circle-o"></i>Data Biaya Harian</a></li>
                <li><a href="<?php echo base_url('index.php/biaya');?>"><i class="fa fa-circle-o"></i>Data Biaya Penginapan</a></li>
             <!--   <li><a href="<?php echo base_url('index.php/biayarill');?>"><i class="fa fa-circle-o"></i>Data Biaya Rill</a></li>
                --><li><a href="<?php echo base_url('index.php/biayarep');?>"><i class="fa fa-circle-o"></i>Data Biaya Representative</a></li>
           
               
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Master Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                <li><a href="<?php echo base_url('index.php/pegawai');?>"><i class="fa fa-circle-o"></i>Data Pegawai</a></li>
                <li><a href="<?php echo base_url('index.php/satker');?>"><i class="fa fa-circle-o"></i>Data Satker</a></li>
                <li><a href="<?php echo base_url('index.php/kota');?>"><i class="fa fa-circle-o"></i>Data Kota</a></li>
                <li><a href="<?php echo base_url('index.php/golongan');?>"><i class="fa fa-circle-o"></i>Data Golongan</a></li>
           <!--     <li><a href="<?php echo base_url('index.php/taksi');?>"><i class="fa fa-circle-o"></i>Data Taksi</a></li>
               -->
              </ul>
            </li>
                 <?php  }?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text-o"></i> <span>Surat Tugas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                <li><a href="<?php echo base_url('index.php/cetaksurattugas');?>"><i class="fa fa-circle-o"></i>Surat Tugas</a></li>
                
              </ul>
            </li>
           
             <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Rincian Biaya</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                <li><a href="<?php echo base_url('index.php/rencanabiaya');?>"><i class="fa fa-circle-o"></i>Rincian Biaya</a></li>
                
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Input Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                <li><a href="<?php echo base_url('index.php/laporan');?>"><i class="fa fa-circle-o"></i>Nota Dinas</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                <li><a href="<?php echo base_url('index.php/laporankegiatan');?>"><i class="fa fa-circle-o"></i>Laporan Kegiatan Pegawai</a></li>
                <li><a href="<?php echo base_url('index.php/laporankegiatan/periodekegiatan');?>"><i class="fa fa-circle-o"></i>Laporan periode kegiatan</a></li>
                <li><a href="<?php echo base_url('index.php/laporankegiatan/periodefilter');?>"><i class="fa fa-circle-o"></i>Laporan kegiatan</a></li>
                <li><a href="<?php echo base_url('index.php/laporankegiatan/sisaanggaran');?>"><i class="fa fa-circle-o"></i>Laporan Anggaran Kegiatan</a></li>
              
           
               
              </ul>
            </li>
            <?php if($this->session->userdata('role')=='Administrator'){ ?>
           <li class='treeview'>
              <a href='#'>
                <i class='fa fa-table'></i> <span>User Role</span>
                <i class='fa fa-angle-left pull-right'></i>
              </a>
              <ul class='treeview-menu'>
                  
                 <li><a href="<?php echo base_url('index.php/Userrole');?>"><i class="fa fa-circle-o"></i>Data User</a></li>
           
           
               
              </ul>
            </li>
     
		
            <?php }?>
            
           <li class='treeview'>
              <a href='#'>
                <i class='fa fa-table'></i> <span>Setting Akun</span>
                <i class='fa fa-angle-left pull-right'></i>
              </a>
              <ul class='treeview-menu'>
                  
                 <li><a href="<?php echo base_url('index.php/Settingakun');?>"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
           
               
              </ul>
            </li>
     
		
          
            <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <a href="<?php echo site_url('dashboard/logout'); ?>" class="btn btn-danger"> <span> Sign out </span></a>
        
        </section>
        <!-- /.sidebar -->
      </aside>