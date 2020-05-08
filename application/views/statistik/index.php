
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="<?php echo base_url(); ?>layout">Home</a>
        </li>
        <li class="active">Statistik</li>
      </ul><!-- /.breadcrumb -->

    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>
          Statistik
          <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Penjualan Tiket
          </small>
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
          </div>
          <?= $chart->render();?>
          <div align="center" id="chart-container">Chart will render here!</div>
        </div>
      </div>
    </div>
  </div>
</div>
