
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
            Tambah Booking
          </small>
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <div>
            <?php if (!empty($tickets)) : ?>
            <ul class="ace-thumbnails clearfix">
              <?php foreach ($tickets as $tiket) :?>
                <li>
                  <?php if (!empty($tiket->image)) :?>
                    <a href="<?=base_url('uploads/'.$tiket->image);?>" title="<?=$tiket->band;?>" data-rel="colorbox">
                      <img width="150" height="150" alt="<?=$tiket->band;?>" src="<?=base_url('uploads/'.$tiket->image);?>" style="object-fit:cover;" />
                    </a>
                  <?php else:?>
                    <a href="<?=base_url('assets/images/placeholder/default-ticket.png');?>" title="<?=$tiket->band;?>" data-rel="colorbox">
                      <img width="150" height="150" alt="<?=$tiket->band;?>" src="<?=base_url('assets/images/placeholder/default-ticket.png');?>" style="object-fit:cover;" />
                    </a>
                  <?php endif;?>

                  <div class="tags">
                    <span class="label-holder">
                      <span class="label label-info"><?=$tiket->band;?></span>
                    </span>

                    <span class="label-holder">
                      <span class="label label-danger"><?=$tiket->type;?></span>
                    </span>

                    <span class="label-holder">
                      <span class="label label-success"><?=date('d/m/Y', strtotime($tiket->date));?></span>
                    </span>

                    <span class="label-holder">
                      <span class="label label-warning arrowed-in">Rp. <?=number_format($tiket->harga);?></span>
                    </span>
                  </div>

                  <div class="tools">
                    <a href="#" class="booking-ticket" data-ticket="<?=$tiket->band;?> - <?=$tiket->type;?>" data-id-tiket="<?=$tiket->id;?>">
                      <i class="ace-icon fa fa-ticket"></i>
                    </a>
                  </div>
                </li>
              <?php endforeach;?>
            </ul>
          <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
