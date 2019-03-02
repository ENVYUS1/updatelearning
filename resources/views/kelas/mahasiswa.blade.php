@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">
		@include('kelas.menu')
		<div class="page-content mail-content bg-white">
			<div class="inbox-head d-lg-flex d-block">
				<h3>MAHASISWA</h3>
				<form action="#" class="ml-auto">
					<div class="input-group">
						<input type="text" placeholder="Search Email" class="form-control">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="fa fa-search search-icon"></i>
							</span>
						</div>
					</div>
				</form>
			</div>
			<div class="inbox-body">
				<div class="mail-option">
					<button type="button" onclick="form_mahasiswa()" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Mahasiswa</button>
				</div>
				<div style="max-height: 600px; overflow-x: hidden;">
					<div class="list-group list-group-messages list-group-flush">
						@if(count($mahasiswa) > 0)
						@foreach($mahasiswa as $mhs)
						<div class="list-group-item">
							<div class="list-group-item-figure">
								<a href="conversations.html" class="user-avatar">
									<div class="avatar avatar">
										<span class="avatar-title rounded-circle {{$mhs->GrubKelasUser->color}} border border-white">{{substr($mhs->GrubKelasUser->name,0,1)}}</span>
									</div>
								</a>
							</div>
							<div class="list-group-item-body pl-3 pl-md-4">
								<div class="row">
									<div class="col-12 col-lg-9">
										<h4 class="list-group-item-title">
											<a href="conversations.html">{{$mhs->GrubKelasUser->pengguna->nama}}</a>
										</h4>
										<p class="list-group-item-text">{{$mhs->GrubKelasUser->pengguna->no_induk}}</p>
									</div>
									<div class="col-12 col-lg-3 text-lg-right">
										<p class="list-group-item-text"> {{ get_time_difference_php($mhs->created_at) }}</p>
									</div>
								</div>
							</div>
							<div class="list-group-item-figure">
								<div class="dropdown">
									<button class="btn-dropdown" data-toggle="dropdown">
										<i class="icon-options-vertical"></i>
									</button>
									<div class="dropdown-arrow"></div>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" did="{{$mhs->id_user}}" class="dropdown-item lht-mhs">Info</a>
											<a href="mahasiswa/hapus/{{$mhs->id}}" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="dropdown-item">Hapus</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@else
						<div class="list-group list-group-messages list-group-flush">
							<div class="row mt-5" id="pic-no-data">
								<div class="col-12 ml-auto mr-auto text-center">
									<img src="/template/assets/img/draws/undraw_empty_xct9.svg" width="30%" alt="">
									<br>
									<p class="lead">Mahasiswa tidak ada bergabung </p>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-lihatmhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white bubble-shadow">
				<h4 class="modal-title" id="exampleModalLongTitle">
					<div class="avatar avatar mr-2" id="avatar">
						
					</div>
				    <span id="name"></span>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-0 no-bd">
				<table class="table">
					<tbody>
						<tr>
							<td width="5%">NIM</td>
							<td width="1%">:</td>
							<td id="nim"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td id="email"></td>
						</tr>
						<tr>
							<td>Telpon</td>
							<td>:</td>
							<td id="tlp"></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>:</td>
							<td id="kelas"></td>
						</tr>
						<tr>
							<td>Semester</td>
							<td>:</td>
							<td id="semester"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal-join1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<div class="card-title" id="title_grupkelas">Tambah Mahasiswa</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form  method="POST" action="/kelas/{{$id}}/mahasiswa">
				@csrf
				<div class="modal-body">
					<div class="card-body">
						<input type="hidden" name="id_kelas" value="{{$id_kelas}}">
						<div class="form-group form-show-validation row" id="status">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Mahasiswa<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<select id="multiple" name="id_user[]" class="form-control" multiple="multiple" style="width: 100%;">
									@foreach($maha as $mh)
									<option  value="{{$mh->id}}">{{$mh->name}} ({{$mh->pengguna->no_induk}})</option>
									@endforeach
								</select>
							</div>
						</div>
						<br>
					</div>
					<div class="modal-footer no-bd">
						<button type="button" class="btn" data-dismiss="modal">Batal</button>
						<button class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection