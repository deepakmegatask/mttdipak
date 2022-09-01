<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from html-templates.multipurposethemes.com/bootstrap-4/admin/unique/02/unique-admin/support-system/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jul 2022 04:32:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    
    <link rel="icon" href="http://html-templates.multipurposethemes.com/bootstrap-4/admin/unique/02/unique-admin/images/favicon.ico">

    <title>Admin Blog - Dashboard</title>
    
    <!-- Bootstrap 4.0-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
      integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/vendor_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
   <!--  <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    /> -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
 
 
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">



    <!-- Bootstrap-extend -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-extend.css">
    
    <!-- theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/master_style.css">
    
    <!-- Unique_Admin skins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/_all-skins.css">
    
    
 
  </head>


<body class="hold-transition skin-blue sidebar-mini">
     <div class="wrapper">
        <header class="main-header">
    <!-- Logo -->
                <a href="index.html" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                 <!--  <b class="logo-mini">
                      <span class="light-logo"><img src="<?php echo base_url();?>assets/images/logo-light.png" alt="logo"></span>
                      <span class="dark-logo"><img src="<?php echo base_url(); ?>assets/images/logo-dark.png" alt="logo"></span>
                  </b> -->
                  <!-- logo for regular state and mobile devices -->
                 <!--  <span class="logo-lg">
                      <img src="<?php echo base_url(); ?>assets/images/logo-light-text.png" alt="logo" class="light-logo">
                      <img src="<?php echo base_url(); ?>assets/images/logo-dark-text.png" alt="logo" class="dark-logo">
                  </span> -->
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                  <!-- Sidebar toggle button-->
                  <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                  </a>

                  <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                      
                      <li class="search-box">
                        <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
                        <form class="app-search" style="display: none;">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                        </form>
                      </li>         
                      <!-- User Account -->
                      <li class="dropdown user user-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                          <img src="<?php echo base_url(); ?>assets/images/deepak.jpg" class="user-image rounded-circle" alt="User Image">
                        </a>
                        <ul class="dropdown-menu scale-up">
                          <!-- User image -->
                          <li class="user-header">
                            <img src="<?php echo base_url(); ?>assets/images/deepak.jpg" class="float-left rounded-circle" alt="User Image">

                            <p>
                              Deepak Maurya
                              <small class="mb-5">deepak@gmail.com</small>
                              <a href="<?php echo base_url();?>login/userProfile" class="btn btn-danger btn-sm btn-rounded">View Profile</a>
                            </p>
                          </li>
                          <!-- Menu Body -->
                          <li class="user-body">
                            <div class="row no-gutters">
                               
                            <div role="separator" class="divider col-12"></div>
                              <div class="col-12 text-left">
                                <a href="<?php echo base_url();?>login/changep"><i class="fa fa-unlock-alt"></i> Change Password</a>
                              </div>
                               
                            <div role="separator" class="divider col-12"></div>
                              <div class="col-12 text-left">
                                <a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i> Logout</a>
                              </div>                
                            </div>
                            <!-- /.row -->
                          </li>
                        </ul>
                      </li>
                      <!-- Control Sidebar Toggle Button -->
                      <li>
                        <a href="" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
                      </li>
                    </ul>
                  </div>
                </nav>
             </header>
<aside class="main-sidebar">

    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="ulogo">
             <a href="<?php echo base_url(); ?>dashboard">
              <!-- logo for regular state and mobile devices -->
              <span><b>Blog Post </b>Admin</span>
            </a>
        </div>
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/images/deepak.jpg" class="rounded-circle" alt="User Image">
        </div>
        <div class="info">
          <p>Blog Post</p>
            <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog"></i></a>
            <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
            <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
        </div>
      </div>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="nav-devider"></li>
        <li class="header nav-small-cap">PERSONAL</li>
        <li class="active">
          <a href="<?php echo base_url();?>home">
            <i class="mdi mdi-view-dashboard" aria-hidden="true" style="font-size: 20px; padding-right: 10px;"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-right pull-right"></i> -->
            </span>
          </a>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>App</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/app/app-chat.html">Chat app</a></li>
            <li><a href="pages/app/project-table.html">Project</a></li>
            <li><a href="pages/app/app-contact.html">Contact / Employee</a></li>
            <li><a href="pages/app/app-ticket.html">Support Ticket</a></li>
            <li><a href="pages/app/calendar.html">Calendar</a></li>
            <li><a href="pages/app/profile.html">Profile</a></li>
            <li><a href="pages/app/userlist-grid.html">Userlist Grid</a></li>
            <li><a href="pages/app/userlist.html">Userlist</a></li>
          </ul>
        </li>  --> 
        
      </ul>

    </section>

  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>


 




 