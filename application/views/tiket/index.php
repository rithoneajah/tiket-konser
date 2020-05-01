
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="<?php echo base_url(); ?>layout">Home</a>
        </li>
        <li class="active">Dashboard</li>
      </ul><!-- /.breadcrumb -->

    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>
          Tiket
          <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Daftar Tiket
          </small>
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <a class="btn btn-success" href="<?php echo base_url(); ?>tiket/tambah_tiket/<?=$id?>">Tambah Tiket</a>

          <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
          </div>
          <div class="table-header">
            Hasil untuk "Tiket"
          </div>

          <!-- div.table-responsive -->

          <!-- div.dataTables_borderWrap -->
          <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Band/Event</th>
                  <th>Tipe</th>
                  <th class="hidden-480">Harga</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
