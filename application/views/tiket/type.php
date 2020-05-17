<?php 
  $in = $this->session->flashdata('gagal');

?>
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
            Daftar Jenis Tiket
          </small>
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <a class="btn btn-success" id="id-btn-dialog1">Tambah Jenis Tiket</a>

          <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
          </div>
          <?php if ($in) : ?>
            <div class="table-header" style="background-color: #f91504">
              Data gagal dihapus, karena data sedang digunakan.
            </div>
          <?php endif;?>
          <div class="table-header hide ajax-res" style="background-color: #f91504;">
              Data gagal dihapus, karena data sedang digunakan.
            </div>
          <!-- div.table-responsive -->

          <!-- div.dataTables_borderWrap -->
          <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis Tiket</th>
                  <th>Tiket</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="show_data">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="dialog-message" class="hide">
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="#">
  <div class="col-xs-12">
    <div class="form-group">
      <label for="jenis-tiket">Jenis Tiket</label>
      <div>
        <input type="text" id="jenis-tiket" placeholder="Jenis Tiket" name="type" class="col-xs-12" />
      </div>
    </div>
  </div>
</form>
</div><!-- #dialog-message -->

<div id="dialog-confirm" class="hide">
  <div class="alert alert-info bigger-110">
    Semua Data dibawah Jenis Tiket tersebut juga akan terhapus.
  </div>

  <div class="space-6"></div>

  <p class="bigger-110 bolder center grey">
    <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
    Apakah Anda Yakin?
  </p>
</div><!-- #dialog-confirm -->

