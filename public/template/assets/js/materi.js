function modal_matkul(){
    $("input[name=aksi]").val(1)
   reset('#form-matkul')
    $("#modal-matkul").modal({ backdrop : 'static', keyboard : false})
}
//  data table
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table_matkul = $('#tabel-matkul').DataTable({

    processing: true,
    serverSide: true,
    ajax: {
        url:'data-matkul'
    },
    columns: [
    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: true, searchable: false},
    {data: 'nama_matkul',     name: 'nama_matkul'},
    {data: 'keterangan',     name: 'keterangan'},
    {data: 'action',     name: 'action'},
    ],
});

//proses insert update
$(document).on("submit", "#form-matkul", function(e){
    e.preventDefault()

    $('button').prop('disabled', true)
    $('.loader').show()
    loader('#load')

    $.ajax({
        url : '/tambah-matkul',
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
            reset('#form-matkul')
            } 
            $('#load').waitMe('hide')
            table_matkul.ajax.reload(null, false);
            Swal.fire(json[0],json[1],json[2]);
        },
        error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
        }
    })
})


function clear_form() {
    $('#form-matkul')[0].reset()
    $('.form-group').removeClass('has-success has-error')
    $('.error').remove()
}

$('body').delegate('.edit-matkul', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')
    $.ajax({

        url : '/tambah-matkul',
        method : 'POST',
        data : {json_matkul:id},
        timeout : 10000,
        success:function (resp) {
            var json=JSON.parse(resp)
            $("input[name=aksi]").val(0)
            $("input[name=nama]").val(json[0].nama_matkul) 
            $("textarea[name=keterangan]").val(json[0].keterangan) 
            $("input[name=id_matkul]").val(json[0].id)
            $('#load').waitMe('hide')
            $("#modal-matkul").modal({backdrop:'static', keyboard : false})

        },
        error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
        }
    })

})

$('body').delegate('.hapus-matkul', 'click',function () {

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

                url : '/tambah-matkul',
                method : 'POST',
                data : {hapus_matkul:id},

                success : function(resp) {
                    var json=JSON.parse(resp)
                    Swal.fire(json[0],json[1],json[2])
                    table_matkul.ajax.reload(null,false)
                    $('#load').waitMe('hide')

                },
                error : function (jqXHR, exception) {
                    errorHandling(jqXHR.status, exception)
                }
            })
        }
    })

})


