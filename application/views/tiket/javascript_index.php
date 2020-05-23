<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.bootstrap.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css');?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>

<script src="<?php echo base_url('assets/js/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTable/JSZip-2.5.0/jszip.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTable/pdfmake-0.1.36/pdfmake.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTable/pdfmake-0.1.36/vfs_fonts.js');?>"></script>
<script src="<?php echo base_url('assets/js/buttons.html5.min.js');?>"></script>
<div id="dialog-confirm" class="hide">

  <p class="bigger-110 bolder center grey">
    <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
    Apakah anda yakin ?
  </p>
</div><!-- #dialog-confirm -->
<script type="text/javascript">
$(document).ready(function() {
  var buttonCommon = {
    exportOptions: {
      format: {
        body: function ( data, row, column, node ) {
          // Strip $ from salary column to make it numeric
          return column === 5 ?
              data.replace( /[$,]/g, '' ) :
              data;
        }
      }
    }
  };
  var myTable =$('#dynamic-table').DataTable({
    "ajax": {
      type   : "POST",
      url    : "<?php echo base_url(); ?>tiket/tiket_type/<?=$data;?>",
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
    dom: 'Bfrtip',
    buttons: [
        $.extend( true, {}, buttonCommon, {
            extend: 'excelHtml5',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 4]
            },
            className: 'btn btn-info'
        }),
        $.extend( true, {}, buttonCommon, {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 4]
            },
            className: 'btn btn-primary'
        })
    ],

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