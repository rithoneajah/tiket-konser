
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="ace-icon fa fa-signal"></i>
                        </button>

                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil"></i>
                        </button>

                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users"></i>
                        </button>

                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">
                    <li class="active">
                        <a href="<?php echo base_url('layout'); ?>">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('statistik'); ?>">
                            <i class="menu-icon glyphicon glyphicon-signal"></i>
                            <span class="menu-text"> Statistik </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                Tiket
                            </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu" style="display: block;">
                            <li class="">
                                <a href="<?php echo base_url('tiket'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Tiket Konser
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url('tiket/detail'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Detail
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('tiket/booking_list'); ?>">
                            <i class="menu-icon fa fa-ticket"></i>
                            <span class="menu-text"> Pemesanan </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>kontak">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text"> Kontak </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                    
                    <li class="">
                        <a href="<?php echo base_url('kontak/tentang'); ?>">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text"> Tentang Kami </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <!-- <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Menu 2 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sub Menu 2.1
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sub Menu 2.2
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li> -->

                    <!-- <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Menu 3 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sub Menu 3.1
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sub Menu 3.2
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li> -->
                </ul><!-- /.nav-list -->
            </div>