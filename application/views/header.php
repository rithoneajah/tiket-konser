<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Pemrograman Web 2</title>
        
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fonts.googleapis.com.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ace.min.css');?>" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ace-skins.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ace-rtl.min.css');?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/ace-extra.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.4.min.js');?>"></script>
</head>
    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="<?php echo base_url(); ?>layout" class="navbar-brand">
                        <small>
                            <i class="fa fa-ticket"></i>
                            Tiket Konser
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo base_url('assets/images/avatars/Monkey.jfif'); ?>" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Selamat datang,</small>
                                    <?=$user;?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Ubah Password
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>