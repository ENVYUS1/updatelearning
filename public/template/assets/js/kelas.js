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
      multiple: true,

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


  $('body').delegate('.join-kelas', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')
    $.ajax({
      url : '/tambah-kelas',
      method : 'POST',
      data : {json_grubkelas:id},
      success:function (resp) {
        var json=JSON.parse(resp)
        $("input[name=id_kelas]").val(json[0].id)
        $('#load').waitMe('hide')
        $("#modal-join").modal({backdrop:'static', keyboard : false})

      }
    })
  })



  $('body').delegate('.join-kelas1', 'click',function () {
    var id=$(this).attr('did');
    loader('#load')
    $.ajax({
      url : '/tambah-kelas',
      method : 'POST',
      data : {json_grubkelas:id},
      success:function (resp) {
        var json=JSON.parse(resp)
        // $("input[name=id_kelas]").val(json[0].id)
        $('#load').waitMe('hide')
        $("#modal-join1").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  $('body').delegate('.lht-mhs', 'click',function () {

    var id=$(this).attr('did');
    loader('#load')

    $.ajax({
      url : '/lihat-mhs',
      method : 'POST',
      data : {json_lhtmhs:id},

      success:function (resp) {
        var json=JSON.parse(resp)
        $('#nama').text(json.data.nama)
        $('#name').text(json.data.nama)
        $('#email').text(json.data.email)
        $('#tlp').text(json.data.no_tlp)

        if (json.data.semester==1) {

          kelas='Satu';
        }else if(json.data.semester==2){

         kelas='Dua';
       }else if(json.data.semester==3){
        kelas='Tiga';

      }else if(json.data.semester==4){

       kelas='Empat';
     }else if(json.data.semester==5){

       kelas='Lima';
     }else if(json.data.semester==6){

      kelas='Enam';
    }else if(json.data.semester==7){

     kelas='Tujuh';
   }else{

    kelas='Delapan';
  }
  $('#semester').text(kelas)
  if (json.data.kelas==1) {

    kelas='Pagi'
  }else{

    kelas='Sore'
  }
  $('#kelas').text(kelas)
  $('#nim').text(json.data.no_induk)
  $('#avatar').html('<span  class="avatar-title rounded-circle border '+json.warna+' border-white">'+json.inisial+'</span>')
  $('#load').waitMe('hide')
  $("#modal-lihatmhs").modal({backdrop:'static', keyboard : false})

}
})
  })


  $('body').delegate('.lihat-mhs', 'click',function () {

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

  //tambah join mahasiswa

  $(document).on("submit", "#form-join", function(e){
    e.preventDefault()

    // $('button').prop('disabled', true)
    $('.loader').show()
    loader('#load')
    $.ajax({
      method : 'POST',
      url : '/tambah-kelas',
      data : new FormData(this),
      processData : false,
      contentType : false,
      timeout : 10000,
      success : function(resp)
      {
       var json = JSON.parse(resp)

       $('.loader').hide()
       if ($('input[name=aksi]').val()==1){
         reset('#form-join')
       } 
       $('#load').waitMe('hide')
       Swal.fire(json[0],json[1],json[2]);
     }
   })
  })


// modal pesan informasi
function form_pesan()
{
  $("#modal_tambah_informasi").modal({backdrop:'static', keyboard:false})
}

// form pilihan upload materi
$('input[type=radio][name=pilihan]').change(function() {
  if (this.value == '1') {
    $("#form-pilihan").html(
      '<div class="form-group form-show-validation row mt-1">\
      <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">File Materi <span class="required-label">*</span></label>\
      <div class="col-lg-7 col-md-12 col-sm-12">\
      <input type="file" name="file" class="form-control" required placeholder="Masukkan Nama Materi" aria-required="true">\
      </div>\
      </div>'
      )
  }
  else if (this.value == '2') {
    $("#form-pilihan").html(
      ' <div class="form-group form-show-validation row mt-2">\
      <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Url Video <span class="required-label">*</span></label>\
      <div class="col-lg-7 col-md-12 col-sm-12">\
      <input type="text" name="url" class="form-control" required placeholder="Masukkan Link URL" aria-required="true">\
      </div>\
      </div>'
      )
  }else{
    $("#form-pilihan").html(
      '<div class="form-group form-show-validation row mt-1">\
      <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">File Materi <span class="required-label">*</span></label>\
      <div class="col-lg-7 col-md-12 col-sm-12">\
      <input type="file" name="file" class="form-control" required placeholder="Masukkan Nama Materi" aria-required="true">\
      </div>\
      </div>\
      <div class="form-group form-show-validation row mt-2">\
      <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Url Video <span class="required-label">*</span></label>\
      <div class="col-lg-7 col-md-12 col-sm-12">\
      <input type="text" name="url" class="form-control" required placeholder="Masukkan Link URL" aria-required="true">\
      </div>\
      </div>'
      )
  }
});

// lampirkan gambar pada soal 
$("body").delegate(".lampiran", "click", function(){
  var $this = $(this).parent().parent().parent().parent()
  if($(this).prop("checked") == true){
    $this.find(".file-lampiran").html('\
      <div class="form-group form-show-validation row">\
      <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">File <span class="required-label">*</span></label>\
      <div class="col-lg-7 col-md-12 col-sm-12">\
      <input  name="file[]" type="file" class="form-control" rows="3" required placeholder="Masukkan batas waktu pengerjaan" aria-required="true">\
      </div>\
      </div>\
      ')
  }
  else if($(this).prop("checked") == false){
    $this.find(".file-lampiran").html('')
  }
})

function number()
{
  var n = 1;
  $(".number").each(function(){
    n = ++n;
    $(this).html(n);
  })
}

// tambah baris pertanyaan
function tambah_pertanyaan()
{

  $("#baris-pertanyaan").append(
    '<div class="body pertanyaan-lainnya"><hr>\
    <div class="form-group form-show-validation row mt-2">\
    <div class="col-lg-1">\
    <div class="avatar avatar-sm">\
    <span class="avatar-title bg-warning rounded-circle border border-white fw-bold number"></span>\
    </div>\
    <div class="avatar avatar-sm mt-2">\
    <a href="#" class="hapus-baris-pertanyaan"><span class="avatar-title bg-danger rounded-circle border border-white fw-bold"><i class="fas fa-times"></i></span></a>\
    </div>\
    </div>\
    <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-right">Pertanyaan <span class="required-label">*</span></label>\
    <div class="col-lg-7 col-md-12 col-sm-12">\
    <textarea name="soal[]" class="form-control" rows="5" required placeholder="Masukkan soal kuis" aria-required="true"></textarea>\
    </div>\
    </div>\
    <div class="row ml-1">\
    <div class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right"></div>\
    <div class="form-check col-lg-7">\
    <label class="form-check-label">\
    <input class="form-check-input lampiran" type="checkbox">\
    <span class="form-check-sign">Lampirkan Gambar</span>\
    </label>\
    </div>\
    </div>\
    <div class="file-lampiran">\
    \
    </div>\
    </div>'
    )
  number()
}

// hapus baris pertanyaan
$("body").delegate(".hapus-baris-pertanyaan", "click", function()
{
  $(this).closest('.pertanyaan-lainnya').remove()
  number()
})

// info mahasiswa
  // $("#modal_informasi_mhs").modal({backdrop:'static', keyboard:false})

  $('body').delegate('.join-kelas1', 'click',function () {
    var id=$(this).attr('did');
    loader('#load')
    $.ajax({
      url : '/tambah-kelas',
      method : 'POST',
      data : {json_grubkelas:id},
      success:function (resp) {
        var json=JSON.parse(resp)
        $('#load').waitMe('hide')
        $("#modal-join1").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  //json-jawab soal

  $('body').delegate('.jawab-soal', 'click',function () {
    var id=$(this).attr('did');
    $.ajax({
      url : '/jawab-soal',
      method : 'POST',
      data : {json_jawabsoal:id},
      success:function (resp) {

        var json=JSON.parse(resp)
      $("input[name=id_soal]").val(json.id)
        $("#modal_jawab_soal").modal({backdrop:'static', keyboard : false})

      }
    })
  })

  // aksi jawab so

// modal tambah mahasiswa
function form_mahasiswa()
{
  $("#modal-join1").modal({backdrop:'static', keyboard: false})
}

// form materi
function form_materi()
{
  $("#select-method").removeClass("d-none")
  $("#modal_tambah_materi").modal({'backdrop':'static', keyboard:false})
}

function form_kuis()
{

 $("input[name=aksi]").val(1)
 reset('#form-kuis')
 $("#modal_tambah_kuis").modal({'backdrop':'static', keyboard:false})
}

$(document).on("submit", "#form-kuis", function(e){
  e.preventDefault()
  $('button').prop('disabled', true)
  $('.loader').show()
  loader('#load')
  $.ajax({
    url : '/tambah-soal-mahasiswa',
    method : 'POST',
    data : new FormData(this),
    processData : false,
    contentType : false,
    success : function(resp)
    {
     var json = JSON.parse(resp)
     $('button').prop('disabled', false)
     $('.loader').hide()
     if ($('input[name=aksi]').val()==1){

       reset('#form-kuis')
     } 
     $('#load').waitMe('hide')
     Swal.fire(json[0],json[1],json[2]);
     window.location.reload();
   },
   error : function (jqXHR, exception) {
    errorHandling(jqXHR.status, exception)
  }
})
})


// aksi materi
$(document).on("submit", "#form-materi", function(e){
  e.preventDefault()

  loader('#load')

  $.ajax({
    url : '/tambah-materi',
    method : 'POST',
    data : new FormData(this),
    processData : false,
    contentType : false,
    dataType : 'json',
    timeout : 10000,
    success : function(resp)
    {
      if(resp.sts == 1){
        list_materi(resp)
        swal.fire(resp.message[0],resp.message[1],resp.message[2])
        $("#modal_tambah_materi").modal("hide")
      }else if(resp.sts == 2){
        swal.fire(resp.message[0],resp.message[1],resp.message[2])
      }else{
        swal.fire(resp.message[0],resp.message[1],resp.message[2])
      }
      $("#load").waitMe("hide")
    },
    error : function (jqXHR, exception) {
      errorHandling(jqXHR.status, exception)
    }
  })
})

// reload materi
function list_materi(resp){
  var avatar, url;
  if(resp.opsi == 'url'){
    url = resp.url;
    avatar = '<div class="avatar">\
    <a href="'+url+'" class="video" data-toggle="tooltip" data-placemnet="top" title="Putar">\
    <span class="avatar-title rounded-circle bg-warning border border-white"><i class="fab fa-youtube"></i></span>\
    </a>\
    </div>';
  }else if(resp.opsi == 'file'){
    url = '/template/assets/materi/'+resp.url;
    avatar = '<div class="avatar">\
    <a href="'+url+'" class="video" data-toggle="tooltip" data-placemnet="top" title="Lihat">\
    <span class="avatar-title rounded-circle bg-danger border border-white"><i class="fas fa-file-pdf"></i></span>\
    </a>\
    </div>';
  }

  $(".list-group").append('<div class="list-group-item">\
    <div class="list-group-item-figure">\
    <div class="avatar-group">'+avatar+'</div>\
    </div>\
    <div class="list-group-item-body pl-3 pl-md-4">\
    <div class="row">\
    <div class="col-12 col-lg-9">\
    <h4 class="list-group-item-title">\
    <a href="'+url+'" class="video">'+resp.nama+'</a>\
    </h4>\
    <p class="list-group-item-text text-truncate">'+resp.keterangan+'</p>\
    </div>\
    <div class="col-12 col-lg-3 text-lg-right">\
    <p class="list-group-item-text">'+resp.create+'</p>\
    </div>\
    </div>\
    </div>\
    <div class="list-group-item-figure">\
    <div class="dropdown">\
    <button class="btn-dropdown" data-toggle="dropdown">\
    <i class="icon-options-vertical"></i>\
    </button>\
    <div class="dropdown-arrow"></div>\
    <div class="dropdown-menu dropdown-menu-right">\
    <a href="#" class="dropdown-item">Download</a>\
    <a href="#" did="'+resp.id+'" class="dropdown-item edit-materi">Edit</a>\
    <a href="#" data-toggle="modal" class="dropdown-item">Hapus</a>\
    </div>\
    </div>\
    </div>\
    </div>')
  frame()
}

// iframe video youtube
frame()
function frame()
{
  $('.video').magnificPopup({
    type: 'iframe',
    markup: '<div class="mfp-iframe-scaler">'+
    '<div class="mfp-close"></div>'+
    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
    '</div>', 
    patterns: {
      youtube: {
        index: 'youtube.com/',
        id: 'v=',
        src: '//www.youtube.com/embed/%id%?autoplay=1' 
      }
    },
    srcAction: 'iframe_src',
    zoom: {
      enabled: true, 
    }
  });
}

// edit materi
$("body").delegate(".edit-materi", "click", function(){
  var id = $(this).attr("did")
  $("#aksi").val(2)
  $("#select-method").addClass("d-none")
  loader('#load')
  $.ajax({
    url : '/show-materi',
    method : 'POST',
    data : {json_materi:id},
    dataType : 'json',
    timeout : 10000,
    success:function (resp) {
      $("#id_materi").val(resp.data.id)
      $("#nama").val(resp.data.nama_materi)
      $("#keterangan").val(resp.data.keterangan_materi)

      if (resp.opsi == '3') {
        $("#form-pilihan").html(
          '<div class="form-group form-show-validation row mt-1">\
          <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">File Materi <span class="required-label">*</span></label>\
          <div class="col-lg-7 col-md-12 col-sm-12">\
          <input type="file" name="file" class="form-control" required placeholder="Masukkan Nama Materi" aria-required="true">\
          </div>\
          </div>\
          <div class="form-group form-show-validation row mt-1">\
          <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">File Materi <span class="required-label">*</span></label>\
          <div class="col-lg-7 col-md-12 col-sm-12">\
          <div class="input-group">\
          <input type="text" class="form-control" id="file" disabled>\
          <div class="input-group-prepend">\
          <a href="/template/assets/materi/'+resp.data.nama_file+'" target="_blank" class="btn btn-info video" style="text-decoration:none"><i class="fas fa-download"></i></a>\
          </div>\
          </div>\
          </div>\
          </div>'
          )
        $("#file").val(resp.data.nama_file)
      }
      else if (resp.opsi == '2') {
        $("#form-pilihan").html(
          ' <div class="form-group form-show-validation row mt-2">\
          <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Url Video <span class="required-label">*</span></label>\
          <div class="col-lg-7 col-md-12 col-sm-12">\
          <input type="text" name="url" id="url" class="form-control" required placeholder="Masukkan Link URL" aria-required="true">\
          </div>\
          </div>'
          )
        $("#url").val(resp.data.url)
      }else{
        $("#form-pilihan").html(
          '<div class="form-group form-show-validation row mt-1">\
          <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">File Materi <span class="required-label">*</span></label>\
          <div class="col-lg-7 col-md-12 col-sm-12">\
          <input type="file" name="file" class="form-control" required placeholder="Masukkan Nama Materi" aria-required="true">\
          </div>\
          </div>\
          <div class="form-group form-show-validation row mt-2">\
          <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Url Video <span class="required-label">*</span></label>\
          <div class="col-lg-7 col-md-12 col-sm-12">\
          <input type="text" name="url" class="form-control" required placeholder="Masukkan Link URL" aria-required="true">\
          </div>\
          </div>'
          )
      }

      $('#load').waitMe('hide')
      $("#modal_tambah_materi").modal({backdrop:'static', keyboard : false})
    },
    error : function (jqXHR, exception) {
      errorHandling(jqXHR.status, exception)
    }
  })
})

  //insert update  update soal

  