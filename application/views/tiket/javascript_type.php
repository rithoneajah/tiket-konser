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
jQuery(function($) {
  // document.querySelector("#dynamic-table > tbody > tr.even > td:nth-child(6) > center > a.delete-data")
  // $('#dynamic-table tbody .delete-data').on( 'click', function() {
  //   console.log('washyu');
  // });
  $(document).ready(function() {

    show_data();

    $('#dynamic-table').DataTable({
      /*"ajax": {
        type   : "POST",
        url    : "<?php //echo site_url('tiket/daftar_type')?>",
        data   : function(d) {
            console.log(d);
        }
      },*/

      "columnDefs": [
        {
          "orderable": false,
          "targets": 1
        },
        {
          "visible": true,
          "targets": [1],
          "searchable": true
        }
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
                  /*console.log(link);
                  $( this ).dialog( "close" );
                  window.location.href = link;*/
                  $.ajax({
                    type : "GET",
                    /*url  : "<?php //echo site_url('tiket/delete_type')?>",*/
                    url  : link,
                    dataType : "JSON",
                    data : {id:id},
                    success: function(data){
                      console.log(data);
                      if (data == false) {
                        $('.ajax-res').removeClass('hide');
                      }
                      show_data();
                    }
                  });
                  $( this ).dialog( "close" );
                  return false;
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

    function show_data() {
      $.ajax({
        type  : 'get',
        url   : '<?php echo site_url('tiket/daftar_type')?>',
        // async : true,
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++) {
            html += '<tr>'+
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+data[i].type+'</td>'+
                    '<td><a href="<?php echo site_url('tiket/type/')?>' + data[i].id + '" class="tooltip-success" data-rel="tooltip" title="Daftar Tiket" ><span class="blue">Daftar Tiket <i class="ace-icon fa fa-book bigger-120"></i></span></a></td>'+
                    '<td><center>'+
                        '<a href="#" class="tooltip-success edit-data" data-rel="tooltip" title="Ubah"  data-type="'+data[i].type+'" data-id="'+data[i].id+'"><span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a>'+' '+
                        '<a href="#" class="tooltip-error hapus-data" data-id="'+data[i].id+'" data-rel="tooltip" title="Hapus"><span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span></a>'+
                    '</center></td>'+
                    '</tr>';
          }
          $('#show_data').html(html);
        }

      });
    }
    /** modal dialog tambah jenis tiket */
    $( "#id-btn-dialog1" ).on('click', function(e) {
            e.preventDefault();
      var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
        modal: true,
        title: "Tambah Jenis Tiket",
        title_html: true,
        buttons: [ 
          {
            text: "Cancel",
            "class" : "btn btn-minier",
            click: function() {
              $( this ).dialog( "close" ); 
            } 
          },
          {
            text: "OK",
            "class" : "btn btn-primary btn-minier",
            click: function() {
              var jenis = $('#jenis-tiket').val();
              $.ajax({
                type : "POST",
                url  : "<?php echo site_url('tiket/proses_tambah_type')?>",
                dataType : "JSON",
                data : {type:jenis},
                success: function(data){
                  $('[name="type"]').val("");
                  show_data();
                }
              });
              $( this ).dialog( "close" );
              return false;
            } 
          }
        ]
      });

      /**
      dialog.data( "uiDialog" )._title = function(title) {
        title.html( this.options.title );
      };
      **/
    });
  });

  $( document ).ajaxComplete(function() {

      /*var buttonCommon = {
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
      };*/

      $('#dynamic-tablez').DataTable({
        /*"ajax": {
          type   : "POST",
          url    : "<?php //echo site_url('tiket/daftar_type')?>",
          data   : function(d) {
              console.log(d);
          }
        },*/

        "columnDefs": [
          {
            "orderable": false,
            "targets": 1
          },
          {
            "visible": true,
            "targets": [1],
            "searchable": true
          }
        ],

        // dom: 'Bfrtip',

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
                    /*$( this ).dialog( "close" );
                    window.location.href = link;*/
                    $.ajax({
                      type : "GET",
                      /*url  : "<?php //echo site_url('tiket/delete_type')?>",*/
                      url  : link,
                      dataType : "JSON",
                      // data : {id:id},
                      success: function(data){
                        console.log(data);
                        if (data == false) {
                          $('.ajax-res').removeClass('hide');
                        }
                        show_data();
                      }
                    });
                    $( this ).dialog( "close" );
                    return false;
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
    

    function show_data() {
      $.ajax({
        type  : 'get',
        url   : '<?php echo site_url('tiket/daftar_type')?>',
        // async : true,
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++) {
            html += '<tr>'+
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+data[i].type+'</td>'+
                    '<td><a href="<?php echo site_url('tiket/type/')?>' + data[i].id + '" class="tooltip-success" data-rel="tooltip" title="Daftar Tiket" ><span class="blue">Daftar Tiket <i class="ace-icon fa fa-book bigger-120"></i></span></a></td>'+
                    '<td><center>'+
                        '<a href="#" class="tooltip-success edit-data" data-rel="tooltip" title="Ubah"  data-type="'+data[i].type+'" data-id="'+data[i].id+'"><span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a>'+' '+
                        '<a href="#" class="tooltip-error hapus-data" data-id="'+data[i].id+'" data-rel="tooltip" title="Hapus"><span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span></a>'+
                    '</center></td>'+
                    '</tr>';
          }
          $('#show_data').html(html);
        }

      });
    }

    $( ".hapus-data" ).on('click', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $( "#dialog-confirm" ).removeClass('hide').dialog({
          resizable: false,
          width: '320',
          modal: true,
          title: "Hapus Jenis Tiket dan Isinya",
          title_html: true,
          buttons: [
            {
              html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all items",
              "class" : "btn btn-danger btn-minier",
              click: function() {
                console.log(id);
                $.ajax({
                  type : "POST",
                  url  : "<?php echo site_url('tiket/delete_type')?>",
                  dataType : "JSON",
                  data : {id:id},
                  success: function(data){
                    console.log(data);
                    if (data == false) {
                      $('.ajax-res').removeClass('hide');
                    }
                    show_data();
                  }
                });
                $( this ).dialog( "close" );
                return false;
              }
            }
            ,
            {
              html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
              "class" : "btn btn-minier",
              click: function() {
                $( this ).dialog( "close" );
              }
            }
          ]
        });
    });

    $( ".edit-data" ).on('click', function(e) {
      e.preventDefault();
      var jenis = $(this).data('type');
      var id = $(this).data('id');
      $('#jenis-tiket').val(jenis);

      var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
        modal: true,
        title: "Tambah Jenis Tiket",
        title_html: true,
        buttons: [ 
          {
            text: "Cancel",
            "class" : "btn btn-minier",
            click: function() {
              $( this ).dialog( "close" ); 
            } 
          },
          {
            text: "OK",
            "class" : "btn btn-primary btn-minier",
            click: function() {
              var jenis = $('#jenis-tiket').val();
              $.ajax({
                type : "POST",
                url  : "<?php echo site_url('tiket/proses_edit_type/')?>" + id,
                dataType : "JSON",
                data : {type:jenis},
                success: function(data){
                  $('[name="type"]').val("");
                  show_data();
                }
              });
              $( this ).dialog( "close" );
              return false;
            } 
          }
        ]
      });

      /**
      dialog.data( "uiDialog" )._title = function(title) {
        title.html( this.options.title );
      };
      **/
    });
  });

});
</script>