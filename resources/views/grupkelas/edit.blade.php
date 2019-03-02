
@extends('layout.layout')
@section('content')
<div class="page-inner">
	<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		<div>
			<div class="page-header">
				<h4 class="page-title"> Edit grup Kelas</h4>
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
						<a href="/grupkelas">Grup Kelas</a>
					</li>
				</ul>
			</div> 
		</div>
	</div>
	
	<div class="row col-md-12" >
		<div class="col-md-12">

			
			<div class="card">
				<div class="card-header" >
					<div class="card-title">Edit Grup Kelas</div>
				</div>
				<form class="validation" method="POST" action="/grupkelas/{{$edit[0]->grupkelas_id}}">
					@csrf
					<div class="modal-body">
						<div class="card-body">
							<div class="form-group form-show-validation row">
								<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Mahasiswa<span class="required-label">*</span></label>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<select name="id_user[]" class="form-control" id="multiple2" multiple="" style="width:100%;">
										@foreach($mahasiswa as $mhs)
										@if(in_array($mhs->id,$id_user))
										<option value="{{$mhs->id}}" selected>{{$mhs->name}} ({{$mhs->pengguna->no_induk}})</option>
										@else
										<option value="{{$mhs->id}}">{{$mhs->name}} ({{$mhs->pengguna->no_induk}})</option>
										@endif
										@endforeach
									</select>
								</div>
							</div>
							<br>
							<div class="form-group form-show-validation row" id="status">
								<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Matakuliah<span class="required-label">*</span></label>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<select name="id_kelas" class="form-control multiple" required="">
										@foreach($matkul as $matkuls)
										@if($matkuls->id==$edit[0]->id_kelas)
										<option  value="{{$matkuls->id}}" selected>{{$matkuls->KelasMatkul->nama_matkul}} ({{$matkuls->Token}})</option>
										@else
										<option  value="{{$matkuls->id}}">{{$matkuls->KelasMatkul->nama_matkul}} ({{$matkuls->Token}})</option>
										@endif
										@endforeach
									</select>
								</div>
							</div>
							<br>
						<!-- 	<div class="form-group form-show-validation row" id="token">
								<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Token<span class="required-label">*</span></label>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<input type="text" name="token" class="form-control" required="" placeholder="Masukkan Token">
								</div>
							</div>
 -->
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


