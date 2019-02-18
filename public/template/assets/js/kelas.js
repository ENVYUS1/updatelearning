  function modal_kelas(){
   $("input[name=aksi]").val(1)
   reset('#form-kelas')
   $("#modal-kelas").modal({ backdrop : 'static', keyboard : false})
 }
//  data table
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

validasi('#form-kelas')

var table_kelas = $('#tabel-kelas').DataTable({

  processing: true,
  serverSide: true,
  ajax: {
    url:'data-kelas'
  },
  columns: [
  {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: true, searchable: false},
  {data: 'matkul',      name: 'matkul'},
  {data: 'jml_max',     name: 'jml_max'},
  {data: 'nama',        name: 'nama'},
  {data: 'jadwal',      name: 'jadwal'},
  {data: 'smt',         name: 'ksmt'},
  {data: 'Token',       name: 'Token'},
  {data: 'action',      name: 'action'},
  ],
});

  //proses insert update

  $(document).on("submit", "#form-kelas", function(e){
    e.preventDefault()

    $('button').prop('disabled', true)
    $('.loader').show()
    loader('#load')
    $.ajax({
      url : '/tambah-kelas',
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
         reset('#form-kelas')
       } 
       $('#load').waitMe('hide')
       table_kelas.ajax.reload(null, false);
       Swal.fire(json[0],json[1],json[2]);
     }
   })
  })


  function clear_form() {
    $('#form-kelas')[0].reset()
    $('.form-group').removeClass('has-success has-error')
    $('.multiple-states').remove()
    $('.error').remove()
  }

  $('body').delegate('.edit-kelas', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')

    $.ajax({

      url : '/tambah-kelas',
      method : 'POST',
      data : {json_kelas:id},

      success:function (resp) {
        var json=JSON.parse(resp)

        $("input[name=aksi]").val(0)
        $("select[name=id_matkul]").val(json[0].id_matkul)
        $("select[name=id_user]").val(json[0].id_user)
        $("input[name=jml_max]").val(json[0].jml_max)
        $("select[name=semester]").val(json[0].semester)
        $("select[name=jadwal]").val(json[0].jadwal)
        $("input[name=id_kelas]").val(json[0].id)
        $('#load').waitMe('hide')
        $("#modal-kelas").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  $('body').delegate('.lihat-kelas', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')

    $.ajax({

      url : '/tambah-kelas',
      method : 'POST',
      data : {json_mhskelas:id},

      success:function (resp) {


        $('#nama').html(resp)

        $('#load').waitMe('hide')

        $("#modal-mhskelas").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  $('body').delegate('.hapus-kelas', 'click',function () {

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

          url : '/tambah-kelas',
          method : 'POST',
          data : {hapus_kelas:id},

          success : function(resp) {
            var json=JSON.parse(resp)
            Swal.fire(json[0],json[1],json[2])
            table_kelas.ajax.reload(null,false)
            $('#load').waitMe('hide')

          },
          error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
          }
        })
      }
    })

  })



