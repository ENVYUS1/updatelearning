
@extends('layout.layout')

@section('content')

<div class="page-inner">
	<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		<div>
			<div class="page-header">
				<h4 class="page-title">Grup kelas</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="/grupkelas">Grup kelas</a>
					</li>
				</ul>
			</div> 
		</div>
		@if(Session::has('flash_message'))
		<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width: 50%; margin-left: 7%">
			{{ Session::get('flash_message') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<div class="ml-md-auto py-2 mb-2 py-md-0">
			<a href="#" class="btn btn-success btn-round" onclick="modal_grupkelas()">Tambah</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				
				<div class="card-body">
					<div class="table-responsive" >
						<table id="tabel-grupkelas" class="table table-head-bg-info table-striped table-hover" width="100%" >
							<thead>
								<tr class="active">
									<th width="5%">No</th>
									<th>Dosen</th>
									<th>Matakuliah</th>
									<th>Mahasiswa</th>
									<th width="17%">Action</th>
								</tr>
							</thead>						
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal" id="modal-grupkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<div class="card-title" id="title_grupkelas"></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-grupkelas" class="validation">
				<input type="hidden" name="aksi">
				<div class="modal-body">
					<div class="card-body">
						<input type="hidden" name="id_grupkelas">
						<div class="form-group form-show-validation row" id="status"  style="display: none">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Mahasiswa<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12" id="selek">
								<select  name="id_user[]" class="form-control multiple" multiple="multiple" style="width:100%;">
									@foreach($mahasiswa as $mhs)

									<option  value="{{$mhs->id}}">{{$mhs->name}} ({{$mhs->pengguna->no_induk}})</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group form-show-validation row" id="status1">
							
						</div>
						<br>

						<div class="form-group form-show-validation row" id="status">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Matakuliah<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<select name="matkul" class="form-control" required="">
									@foreach($matkul as $matkuls)
									<option  value="{{$matkuls->id}}">{{$matkuls->KelasMatkul->nama_matkul}} ({{$matkuls->Token}})</option>
									@endforeach
								</select>
							</div>
						</div>
						<br>
						<div class="form-group form-show-validation row" id="token">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Token<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<input type="text" name="token" class="form-control" required="" placeholder="Masukkan Token">
							</div>
						</div>

						<br>
					</div>
					<div class="modal-footer no-bd">
						<!-- 	<div class="loader loader-info"></div> -->
						<button type="button" class="btn" data-dismiss="modal">Batal</button>
						<button class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection