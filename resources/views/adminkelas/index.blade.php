@extends('layout.layout')

@section('content')

<div class="page-inner">
	<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		<div>
			<div class="page-header">
				<h4 class="page-title">Kelas</h4>
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
						<a href="/kelas">Kelas</a>
					</li>
				</ul>
			</div> 
		</div>
		<div class="ml-md-auto py-2 mb-2 py-md-0">
			<a href="#" class="btn btn-success btn-round" onclick="modal_kelas()">Tambah</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="tabel-kelas" class="table table-head-bg-info table-striped table-hover" width="100%" >
							<thead>
								<tr class="active">
									<th width="5%">No</th>
									<th>Matakuliah</th>
									<th>Maksimal</th>
									<th>Dosen</th>
									<th>Jadwal</th>
									<th>Semester</th>
									<th>Token</th>
									<th>Action</th>
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
<div class="modal" id="modal-kelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" kelas="document">
		<div class="modal-content">
			<div class="modal-header no-bd" >
				<div class="card-title"><i class="fas fa-bullhorn"></i> Tambah Kelas</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-kelas">
				<input type="hidden" name="aksi">
				<div class="modal-body">
					<div class="card-body">
						<input type="hidden" name="id_kelas">

						<div class="form-group form-show-validation row mt--2">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Matakuliah <span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-9 col-sm-12 select2-input">
								<select name="id_matkul" class="form-control">
									@foreach($matkul as $matkuls)

									<option value="{{$matkuls->id}}">{{$matkuls->kode_matkul}}--{{$matkuls->nama_matkul}}</option>

									@endforeach

								</select>
							</div>
						</div>
						<br>
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Dosen<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<select  class="form-control" name="id_user" required="" style="width: 100%;">

									@foreach($dosen as $dosens)

									<option value="{{$dosens->id}}">{{$dosens->name}}</option>

									@endforeach

								</select>

							</div>
						</div>

						<br>

						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Jadwal<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<select  class="form-control" name="jadwal" required="" style="width: 100%;">

									 <option value="01">Pagi</option>
									 <option value="02">Sore</option>
								</select>

							</div>
						</div>
						<br>

						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Maksimal<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<input type="number" name="jml_max" class="form-control" required="" placeholder="Masukkan Jumlah maksimal">
							</div>
						</div>
						<br>

						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Semester<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">

								<select name="semester" class="form-control" required="">
									@foreach($smt as $index => $smts)

									<option value="{{$index+1}}">{{$smts}}</option>

									@endforeach

								</select>
							</div>
						</div>

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