
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
            Tambah Tiket
          </small>
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>tiket/proses_tambah_tiket">
            <div class="col-xs-5">
              <div class="form-group">
                <label for="band-tiket">Band/Nama Tiket</label>
                <div>
                  <input type="text" id="band-tiket" placeholder="Band/Nama Tiket" name="band" class="col-xs-12" />
                </div>
              </div>
              <div class="form-group">
                <label for="jenis-tiket">Jenis Tiket</label>
                <div>
                  <select class="form-control" id="jenis-tiket" name="type" class="col-xs-12">
                    <?php foreach ($type as $jenis) :
                      $selected = '';
                      if ($jenis->id == $id) {
                        $selected = 'selected';
                      }
                      ?>
                      <option value="<?=$jenis->id;?>" <?=$selected;?>><?=$jenis->type;?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="gambar-tiket">Gambar</label>
                <div>
                  <input type="file" id="gambar-tiket" name="image" class="col-xs-12" />
                </div>
              </div>
            </div>

            <div class="col-xs-1">
            </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label for="harga-tiket">Harga Tiket</label>
                <div>
                  <input type="number" id="harga-tiket" placeholder="Harga Tiket" name="harga" class="col-xs-12" />
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal-tiket">Tanggal</label>
                <div class="input-group">
                  <input type="text" id="tanggal-tiket" placeholder="Tanggal acara" name="date" class="form-control col-xs-12" data-date-format="dd-mm-yyyy"/>
                  <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="jam-tiket">Jam</label>
                <div class="input-group">
                  <input type="text" id="jam-tiket" placeholder="Jam acara" name="time" class="form-control col-xs-12" />
                  <span class="input-group-addon">
                    <i class="fa fa-clock-o bigger-110"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="pull-right">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
