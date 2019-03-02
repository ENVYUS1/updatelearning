  function modal_grupkelas(){
   $("input[name=aksi]").val(1)
   reset('#form-grupkelas')

   $('#status').show();
   $('#title_grupkelas').text('Tambah Data')
   $("#modal-grupkelas").modal({ backdrop : 'static', keyboard : false})
 }
//  data table
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var table_grupkelas = $('#tabel-grupkelas').DataTable({

  processing: true,
  serverSide: true,
  ajax: {
    url:'data-grupkelas'
  },
  columns: [
  {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: true, searchable: false},
  {data: 'nama',     name: 'nama'},
  {data: 'matkul',     name: 'matkul'},
  {data: 'matkul',     name: 'matkul'},
  {data: 'action',     name: 'action'}
  ],
});

  //proses insert update

  $(document).on("submit", "#form-grupkelas", function(e){
    e.preventDefault()

    $('button').prop('disabled', true)
    $('.loader').show()

    $.ajax({
      url : '/tambah-grupkelas',
      method : 'POST',
      data : new FormData(this),
      processData : false,
      contentType : false,
      timeout : 10000,
      success : function(resp)
      {

       var json = JSON.parse(resp)
       $('button').prop('disabled', false)
       $('.loader').hide()

       if ($('input[name=aksi]').val()==1){
         reset('#form-grupkelas')
       } 
       $('#load').waitMe('hide')
       table_grupkelas.ajax.reload(null, false);
       Swal.fire(json[0],json[1],json[2]);
     }
   })
  })

  validasi('#form-grupkelas')
  function clear_form() {
    $('#form-grupkelas')[0].reset()
    $('.form-group').removeClass('has-success has-error')
    $('.error').remove()
  }

  $('body').delegate('.edit-grupkelas', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')

    $.ajax({

      url : '/tambah-grupkelas',
      method : 'POST',
      data : {json_grupkelas:id},

      success:function (resp) {

        var json=JSON.parse(resp)
        $("input[name=aksi]").val(0)
        $("input[name=id_grupkelas]").val(json.data[0].id)
        $('#load').waitMe('hide')
        $('#title_grupkelas').text('Edit Grup Kelas')
        $('#status').hide();
        $('#status1').show();
        $('#status1').html('data1');
        $('#token').remove()
        $("#modal-grupkelas").modal({backdrop:'static', keyboard : false})
      }
    })
  })

  $('body').delegate('.hapus-grupkelas', 'click',function () {

    var id=$(this).attr('did')

    Swal.fire({
      title: 'Anda Yakin?',
      text: "Data ini akan hilang!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus data!'
    }).then((result) => {
      if (result.value) {
        loader('#load')
        $.ajax({

          url : '/tambah-grupkelas',
          method : 'POST',
          data : {hapus_grupkelas:id},

          success : function(resp) {
            var json=JSON.parse(resp)
            Swal.fire(json[0],json[1],json[2])
            table_grupkelas.ajax.reload(null,false)
            $('#load').waitMe('hide')

          },
          error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
          }
        })
      }
    })

  })


