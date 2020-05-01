
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
            Tambah Jenis Tiket
          </small>
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>tiket/proses_tambah_type">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="band-tiket">Jenis Tiket</label>
                <div>
                  <input type="text" id="band-tiket" placeholder="Jenis Tiket" name="type" class="col-xs-12" />
                </div>
              </div>
            </div>

            <div class="pull-left">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
