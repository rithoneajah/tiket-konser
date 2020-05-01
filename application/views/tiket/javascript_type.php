<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.bootstrap.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css');?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
<div id="dialog-confirm" class="hide">

  <p class="bigger-110 bolder center grey">
    <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
    Apakah anda yakin ?
  </p>
</div><!-- #dialog-confirm -->
<script type="text/javascript">
$(document).ready(function() {
  var myTable =$('#dynamic-table').DataTable({
    "ajax": {
      type   : "POST",
      url    : "<?php echo base_url(); ?>tiket/daftar_type/",
      data   : function(d) {
          
      }
    },
    "columnDefs": [
      { "orderable": false, "targets": 2 },
      { "visible": true, "targets": [3], "searchable": false }
    ],
    select: {
        style: 'multi'
    },
    "initComplete" : function(setting, json) {
      $('.delete-data').on('click', function(e) {
        var link = $(this).attr('href');
        e.preventDefault();
        $( "#dialog-confirm" ).removeClass('hide').dialog({
          resizable: false,
          width: '320',
          modal: true,
          title: "Konfirmasi",
          title_html: true,
          buttons: [
            {
              html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Hapus",
              "class" : "btn btn-danger btn-minier",
              click: function() {
                console.log(link);
                $( this ).dialog( "close" );
                window.location.href = link;
              }
            }
            ,
            {
              html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Jangan",
              "class" : "btn btn-minier",
              click: function() {
                $( this ).dialog( "close" );
              }
            }
          ]
        });
      });
    }
  });

});
  jQuery(function($) {
    
    // document.querySelector("#dynamic-table > tbody > tr.even > td:nth-child(6) > center > a.delete-data")
    $('#dynamic-table tbody .delete-data').on( 'click', function() {
      console.log('washyu');
    });
  })
</script>