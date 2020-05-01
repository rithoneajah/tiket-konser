<div id="dialog-message" class="hide">
  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>tiket/proses_tambah_booking">

    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="nama-pemesan">Nama Pemesan</label>
      <div class="col-sm-9">
        <input type="text" id="nama-pemesan" placeholder="Nama Pemesan" name="nama" class="col-xs-12" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="email-pemesan">Email</label>
      <div class="col-sm-9">
        <input type="text" id="email-pemesan" placeholder="Email" name="email" class="col-xs-12" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="nomor-pemesan">Nomor Telpon</label>
      <div class="col-sm-9">
        <input type="text" id="nomor-pemesan" placeholder="Nomor Telpon" name="no_telp" class="col-xs-12" />
      </div>
    </div>
    <input type="hidden" name="id_tiket" id="field-id-tiket">
  </form>
</div><!-- #dialog-message -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/colorbox.min.css');?>" />
<script src="<?php echo base_url('assets/js/jquery.colorbox.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css');?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
<script type="text/javascript">
jQuery(function($) {
  var $overflow = '';
  var colorbox_params = {
    rel: 'colorbox',
    reposition:true,
    scalePhotos:true,
    scrolling:false,
    previous:'<i class="ace-icon fa fa-arrow-left"></i>',
    next:'<i class="ace-icon fa fa-arrow-right"></i>',
    close:'&times;',
    current:'{current} of {total}',
    maxWidth:'100%',
    maxHeight:'100%',
    onOpen:function(){
      $overflow = document.body.style.overflow;
      document.body.style.overflow = 'hidden';
    },
    onClosed:function(){
      document.body.style.overflow = $overflow;
    },
    onComplete:function(){
      $.colorbox.resize();
    }
  };

  $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
  $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon

  $(document).one('ajaxloadstart.page', function(e) {
    $('#colorbox, #cboxOverlay').remove();
  });

  /*booking modal*/
  $( ".booking-ticket" ).on('click', function(e) {
    var id_tiket = $(this).data('id-tiket');
    $('#field-id-tiket').val(id_tiket);
    e.preventDefault();
    var tiket = $(this).data('ticket');
    var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
      modal: true,
      title: "Booking Tiket " + tiket,
      title_html: true,
      buttons: [
        {
          text: "Batal",
          "class" : "btn btn-minier",
          click: function() {
            $( this ).dialog( "close" ); 
          } 
        },
        {
          text: "Pesan",
          "class" : "btn btn-primary btn-minier",
          click: function() {
            $( this ).dialog( "close" );
            $('.form-horizontal').submit();
          } 
        }
      ],
      width: "50%"
    });

    /**
    dialog.data( "uiDialog" )._title = function(title) {
      title.html( this.options.title );
    };
    **/
  });

});
</script>