function modal_mahasiswa(){
    $("input[name=aksi]").val(1)
    $('#title-mhs').text('Tambah Mahasiswa')
    reset('#form-mahasiswa')
    $("#modal-mahasiswa").modal({ backdrop : 'static', keyboard : false})
}
//  data table
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

validasi('#form-mahasiswa')


var table_mahasiswa = $('#tabel-mahasiswa').DataTable({

    processing: true,
    serverSide: true,
    ajax: {
        url:'data-mahasiswa'
    },
    columns: [
    {data: 'DT_RowIndex',name:'DT_RowIndex', orderable: true, searchable: false},
    {data: 'name',       name: 'name'},
    {data: 'nim',        name: 'nim'},
    {data: 'email',      name: 'email'},
    {data: 'notlp',      name: 'notlp'},
    {data: 'kelas',      name: 'kelas'},
    {data: 'jurusan',    name: 'jurusan'},
    {data: 'action',     name: 'action'},
    ],
});

//proses insert update
$(document).on("submit", "#form-mahasiswa", function(e){
    e.preventDefault()

    $('button').prop('disabled', true)
    $('.loader').show()
    loader('#load')
    $.ajax({
        url : '/tambah-mahasiswa',
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
                reset('#form-mahasiswa')
            } 
            $('#load').waitMe('hide')
            table_mahasiswa.ajax.reload(null, false);
            Swal.fire(json[0],json[1],json[2]);
        },
        error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
        }
    })
})

$('body').delegate('.edit-mahasiswa', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')
    $.ajax({

        url : '/tambah-mahasiswa',
        method : 'POST',
        data : {json_mahasiswa:id},
        timeout : 10000,
        success:function (resp) {
            var json=JSON.parse(resp)
            $("input[name=aksi]").val(0)
            $("input[name=nama]").val(json[0].nama) 
            $("input[name=nim]").val(json[0].no_induk)
            $("input[name=notlp]").val(json[0].no_tlp) 
            $("input[name=email]").val(json[0].email)
            $("select[name=kelas]").val(json[0].kelas)
            $("select[name=jurusan]").val(json[0].id_jurusan) 
            $("input[name=semester]").val(json[0].semester)    
            $("input[name=id_mahasiswa]").val(json[0].id)
            $('#load').waitMe('hide')
            $('#title-mhs').text('Edit Mahasiswa')
            $("#modal-mahasiswa").modal({backdrop:'static', keyboard : false})
        },
        error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
        }
    })

})

$('body').delegate('.hapus-mahasiswa', 'click',function () {

    var id=$(this).attr('did')

    Swal.fire({
        title: 'Anda Yakin?',
        text: "Data ini akan hilang!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        timeout : 10000,
        confirmButtonText: 'Ya, Hapus data!'
    }).then((result) => {
        if (result.value) {
          loader('#load')
          $.ajax({

            url : '/tambah-mahasiswa',
            method : 'POST',
            data : {hapus_mahasiswa:id},

            success : function(resp) {
                var json=JSON.parse(resp)
                Swal.fire(json[0],json[1],json[2])
                table_mahasiswa.ajax.reload(null,false)
                $('#load').waitMe('hide')

            },
            error : function (jqXHR, exception) {
                errorHandling(jqXHR.status, exception)
            }
        })
      }
  })

})


