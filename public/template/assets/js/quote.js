function modal_quote(){
    $("input[name=aksi]").val(1)
    reset('#form-quote')
    $(".img-upload-preview").attr('src','http://placehold.it/100x100')
    $(".title-modal").html('<i class="fas fa-plus-circle text-success"></i> Tambah Quote')
    $("#modal-quote").modal({ backdrop : 'static', keyboard : false})
    $("#uploadImg1").prop('required', true)
}
//  data table
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

validasi("#form-quote")

var table_quote = $('#tabel-quote').DataTable({

    processing: true,
    serverSide: true,
    responsive: true,
    ajax: {
        url:'data-quote'
    },
    error : function (jqXHR, exception) {
        errorHandling(jqXHR.status, exception)
    },
    columns: [
    {data: 'DT_RowIndex', name:'DT_RowIndex', orderable: true, searchable: false},
    {data: 'foto', nama: 'foto'},
    {data: 'nama', name: 'nama'},
    {data: 'text_quote', name: 'text_quote'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],

});

//proses insert update
$(document).on("submit", "#form-quote", function(e){
    e.preventDefault()
    loader('#load')
    $.ajax({
        url : '/tambah-quote',
        method : 'POST',
        data : new FormData(this),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData : false,
        contentType : false,
        timeout : 10000,
        success : function(resp)
        {   
            var json = JSON.parse(resp)
            $('#load').waitMe('hide')
            table_quote.ajax.reload(null, false);
            Swal.fire(json[0],json[1],json[2]);
        },
        error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
        }
    })
})


function clear_form() {
    $('#form-quote')[0].reset()
    $('.form-group').removeClass('has-success has-error')
    $('.error').remove()
}

$('body').delegate('.edit-quote', 'click',function () {
    var id=$(this).attr('did');
    loader('#load')
    $("#uploadImg1").prop('required', false)
    clear()
    $(".title-modal").html('<i class="fas fa-edit text-info"></i> Edit Quote')
    $.ajax({
        url : '/tambah-quote',
        method : 'POST',
        data : {json_quote:id},
        timeout : 10000,
        dataType : 'json',
        success:function (resp) {
            $("input[name=aksi]").val(0)
            $("input[name=id_quote]").val(resp[0].id)
            $("input[name=nama]").val(resp[0].nama) 
            $("textarea[name=quote]").val(resp[0].text_quote) 
            $(".img-upload-preview").attr('src','template/assets/img/tokoh/'+resp[0].foto)
            $('#load').waitMe('hide')
            $("#modal-quote").modal({backdrop:'static', keyboard : false})

        },
        error : function (jqXHR, exception) {
            errorHandling(jqXHR.status, exception)
        }
    })

})

$('body').delegate('.hapus-quote', 'click',function () {

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

            url : '/tambah-quote',
            method : 'POST',
            data : {hapus_quote:id},

            success : function(resp) {
                var json=JSON.parse(resp)
                Swal.fire(json[0],json[1],json[2])
                table_quote.ajax.reload(null,false)
                $('#load').waitMe('hide')

            },
            error : function (jqXHR, exception) {
                errorHandling(jqXHR.status, exception)
            }
        })
       }
   })

})


