  function modal_jurusan(){
   $("input[name=aksi]").val(1)
   reset('#form-jurusan')
   $("#modal-jurusan").modal({ backdrop : 'static', keyboard : false})
 }
//  data table
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var table_jurusan = $('#tabel-jurusan').DataTable({

  processing: true,
  serverSide: true,
  ajax: {
    url:'data-jurusan'
  },
  columns: [
  {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: true, searchable: false},
  {data: 'nama',     name: 'nama'},
  {data: 'action',     name: 'action'},
  ],
});

  //proses insert update

  $(document).on("submit", "#form-jurusan", function(e){
    e.preventDefault()

    $('button').prop('disabled', true)
    $('.loader').show()

    $.ajax({
      url : '/tambah-jurusan',
      method : 'POST',
      data : new FormData(this),
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
      processData : false,
      contentType : false,
      timeout : 10000,
      success : function(resp)
      {

       var json = JSON.parse(resp)
       $('button').prop('disabled', false)
       $('.loader').hide()

       if ($('input[name=aksi]').val()==1){
         reset('#form-jurusan')
       } 
       $('#load').waitMe('hide')
       table_jurusan.ajax.reload(null, false);
       Swal.fire(json[0],json[1],json[2]);
     }
   })
  })


  function clear_form() {
    $('#form-jurusan')[0].reset()
    $('.form-group').removeClass('has-success has-error')
    $('.error').remove()
  }

  $('body').delegate('.edit-jurusan', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')

    $.ajax({

      url : '/tambah-jurusan',
      method : 'POST',
      data : {json_jurusan:id},



      success:function (resp) {

        var json=JSON.parse(resp)
        $("input[name=aksi]").val(0)
        $("input[name=nama]").val(json[0].nama) 
        $("input[name=id_jurusan]").val(json[0].id)
        $('#load').waitMe('hide')
        $("#modal-jurusan").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  $('body').delegate('.hapus-jurusan', 'click',function () {

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

          url : '/tambah-jurusan',
          method : 'POST',
          data : {hapus_jurusan:id},

          success : function(resp) {
            var json=JSON.parse(resp)
            Swal.fire(json[0],json[1],json[2])
            table_jurusan.ajax.reload(null,false)
            $('#load').waitMe('hide')

          },
          error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
          }
        })
      }
    })

  })


