



			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
									<div class="alert alert-block alert-info">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
										<i class="ace-icon fa fa-check green"></i>
										Selamat datang
										<strong class="green">
											<b><?=$user;?></b>
										</strong>,<br><br>
										Berusaha dan berdoa
									</div>
									<div style="padding-bottom:10px">
										<center>
											<img src="<?php echo base_url('assets/images/dashboard.jpg'); ?>" style="width:50%">
										</center>
									</div>
									<div class="widget-header widget-header-flat widget-header-small">
										<h5 class="widget-title">
											<i class="ace-icon fa fa-signal"></i>
											Kelola Halaman Web
										</h5>
									</div>
									<br>
									<div class="widget-body">
										<center>
										<div class="infobox infobox-green ">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-ticket"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?=$typeCount;?></span>
												<div class="infobox-content">Jenis Tiket
												</div>
											</div>
										</div>
										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-ticket"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?=$tiketCount;?></span>
												<div class="infobox-content">Tiket
												</div>
											</div>
										</div>
										<div class="infobox infobox-orange2">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?=$bookingCount;?></span>
												<div class="infobox-content">Pemesan Tiket</div>
											</div>
										</div>
										</center>
									</div><!-- /.widget-body -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

