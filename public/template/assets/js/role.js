function modal_role(){
    $("input[name=aksi]").val(1)
    reset('#form-role')
    $("#modal-role").modal({ backdrop : 'static', keyboard : false})
}

validasi("#form-role")

//  data table
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table_role = $('#tabel-role').DataTable({

    processing: true,
    serverSide: true,
    ajax: {
        url:'data-role'
    },
    columns: [
    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: true, searchable: false},
    {data: 'name',     name: 'name'},
    {data: 'description',     name: 'description'},
    {data: 'action',     name: 'action'},
    ],
});

//proses insert update
$(document).on("submit", "#form-role", function(e){
    e.preventDefault()

    $('button').prop('disabled', true)
    $('.loader').show()
    loader('#load')
    $.ajax({
        url : '/tambah-role',
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
                 reset('#form-role')
            } 
            $('#load').waitMe('hide')
            table_role.ajax.reload(null, false);
            Swal.fire(json[0],json[1],json[2]);
        },
        error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
        }
    })
})

$('body').delegate('.edit-role', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')
    $.ajax({

        url : '/tambah-role',
        method : 'POST',
        data : {json_role:id},
        timeout : 10000,
        success:function (resp) {
            var json=JSON.parse(resp)
            $("input[name=aksi]").val(0)
            $("input[name=nama]").val(json[0].name) 
            $("textarea[name=keterangan]").val(json[0].description) 
            $("input[name=id_role]").val(json[0].id)
            $('#load').waitMe('hide')
            $("#modal-role").modal({backdrop:'static', keyboard : false})

        },
        error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
        }
    })

})

$('body').delegate('.hapus-role', 'click',function () {

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

                url : '/tambah-role',
                method : 'POST',
                data : {hapus_role:id},

                success : function(resp) {
                    var json=JSON.parse(resp)
                    Swal.fire(json[0],json[1],json[2])
                    table_role.ajax.reload(null,false)
                    $('#load').waitMe('hide')

                },
                error : function (jqXHR, exception) {
                    errorHandling(jqXHR.status, exception)
                }
            })
        }
    })

})


