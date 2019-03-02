  function modal_soal(){
   $("input[name=aksi]").val(1)
   reset('#form-soal')
   $('#title-soal').text('tambah soal')
   $("#modal-soal").modal({ backdrop : 'static', keyboard : false})
 }
//  data table
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

validasi('#form-soal')

var table_soal = $('#tabel-soal').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url:'data-soal'
  },
  columns: [
  {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: true, searchable: false},
  {data: 'matkul',      name: 'matkul'},
  {data: 'jml_max',     name: 'jml_max'},
  {data: 'nama',        name: 'nama'},
  {data: 'jadwal',      name: 'jadwal'},
  {data: 'smt',         name: 'ksmt'},
  {data: 'action',      name: 'action'},
  ],
});

  //proses insert update

  $(document).on("submit", "#form-soal", function(e){
    e.preventDefault()

    $('button').prop('disabled', true)
    $('.loader').show()
    loader('#load')
    $.ajax({
      url : '/tambah-soal',
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
         reset('#form-soal')

       } 
       $('#load').waitMe('hide')
       table_soal.ajax.reload(null, false);
       Swal.fire(json[0],json[1],json[2]);
     }
   })
  })


  function clear_form() {
    $('#form-soal')[0].reset()
    $('.form-group').removeClass('has-success has-error')
    $('.multiple-states').remove()
    $('.error').remove()
  }

  $('body').delegate('.edit-soal', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')

    $.ajax({

      url : '/tambah-soal',
      method : 'POST',
      data : {json_soal:id},

      success:function (resp) {
        var json=JSON.parse(resp)

        $("input[name=aksi]").val(0)
        $("select[name=id_matkul]").val(json[0].id_matkul)
        $("select[name=id_user]").val(json[0].id_user)
        $("input[name=jml_max]").val(json[0].jml_max)
        $("select[name=semester]").val(json[0].semester)
        $("select[name=jadwal]").val(json[0].jadwal)
        $("input[name=id_soal]").val(json[0].id)
        $('#load').waitMe('hide')
        $('#title-soal').text('Edit data')
        $("#modal-soal").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  $('body').delegate('.lihat-soal', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')

    $.ajax({

      url : '/tambah-soal',
      method : 'POST',
      data : {json_mhssoal:id},

      success:function (resp) {


        $('#nama').html(resp)

        $('#load').waitMe('hide')

        $("#modal-mhssoal").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  $('body').delegate('.hapus-soal', 'click',function () {

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

          url : '/tambah-soal',
          method : 'POST',
          data : {hapus_soal:id},

          success : function(resp) {
            var json=JSON.parse(resp)
            Swal.fire(json[0],json[1],json[2])
            table_soal.ajax.reload(null,false)
            $('#load').waitMe('hide')

          },
          error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
          }
        })
      }
    })

  })



