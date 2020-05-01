
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-timepicker.min.css');?>" />

<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-timepicker.min.js');?>"></script>

<script type="text/javascript">
  jQuery(function($) {

    $('#gambar-tiket').ace_file_input({
      no_file:'Tidak ada file ...',
      btn_choose:'Pilih',
      btn_change:'Ubah',
      droppable:false,
      onchange:null,
      thumbnail:'small', //| true | large
      whitelist:'gif|png|jpg|jpeg'
      //blacklist:'exe|php'
      //onchange:''
      //
    });

    $('#jam-tiket').timepicker({
      minuteStep: 1,
      showSeconds: false,
      showMeridian: false,
      disableFocus: true,
      icons: {
        up: 'fa fa-chevron-up',
        down: 'fa fa-chevron-down'
      }
    }).on('focus', function() {
      $('#jam-tiket').timepicker('showWidget');
    }).next().on(ace.click_event, function(){
      $(this).prev().focus();
    });

    $('#tanggal-tiket').datepicker({
      autoclose: true,
      todayHighlight: true
    }).next().on(ace.click_event, function(){
      $(this).prev().focus();
    });
  });
</script>