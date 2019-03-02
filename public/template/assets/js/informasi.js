  function modal_informasi(){
   $("input[name=aksi]").val(1)
   reset('#form-informasi')
   $("#modal-informasi").modal({ backdrop : 'static', keyboard : false})
 }
//  data table
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

validasi('#form-informasi')

var table_informasi = $('#tabel-informasi').DataTable({

  processing: true,
  serverSide: true,
  ajax: {
    url:'data-informasi'
  },
  columns: [
  {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: true, searchable: false},
  {data: 'nama',     name: 'nama'},
  {data: 'action',     name: 'action'},
  ],
});

  //proses insert update

  $(document).on("submit", "#form-informasi", function(e){
    e.preventDefault()

    $('button').prop('disabled', true)
    $('.loader').show()

    $.ajax({
      url : '/tambah-informasi',
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
         reset('#form-informasi')
       } 
       $('#load').waitMe('hide')
       table_informasi.ajax.reload(null, false);
       Swal.fire(json[0],json[1],json[2]);
     }
   })
  })


  function clear_form() {
    $('#form-informasi')[0].reset()
    $('.form-group').removeClass('has-success has-error')
    $('.error').remove()
  }

  $('body').delegate('.edit-informasi', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')

    $.ajax({

      url : '/tambah-informasi',
      method : 'POST',
      data : {json_informasi:id},



      success:function (resp) {

        var json=JSON.parse(resp)
        $("input[name=aksi]").val(0)
        $("input[name=nama]").val(json[0].nama) 
        $("input[name=id_informasi]").val(json[0].id)
        $('#load').waitMe('hide')
        $("#modal-informasi").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  $('body').delegate('.hapus-informasi', 'click',function () {

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

          url : '/tambah-informasi',
          method : 'POST',
          data : {hapus_informasi:id},

          success : function(resp) {
            var json=JSON.parse(resp)
            Swal.fire(json[0],json[1],json[2])
            table_informasi.ajax.reload(null,false)
            $('#load').waitMe('hide')

          },
          error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
          }
        })
      }
    })

  })


