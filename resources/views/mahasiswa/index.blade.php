@extends('layout.layout')

@section('content')

<div class="page-inner">
	<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		<div>
			<div class="page-header">
				<h4 class="page-title">mahasiswa</h4>
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
						<a href="/mahasiswa">mahasiswa</a>
					</li>
				</ul>
			</div> 
		</div>
		<div class="ml-md-auto py-2 mb-2 py-md-0">
			<a href="#" class="btn btn-success btn-round" onclick="modal_mahasiswa()">Tambah</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive" >
						<table id="tabel-mahasiswa" class="table table-head-bg-info table-striped table-hover" width="100%" >
							<thead>
								<tr class="active">
									<th width="5%">No</th>
									<th>Nama</th>
									<th>Nim</th>
									<th>Email</th>
									<th>No telpon</th>
									<th>Kelas</th>
									<th>Jurusan</th>
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
<div class="modal" id="modal-mahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" mahasiswa="document">
		<div class="modal-content">
			<div class="modal-header no-bd" >
				<div class="card-title" id="title-mhs"></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-mahasiswa">
				
				<input type="hidden" name="aksi">
				<div class="modal-body">
					<div class="card-body">
						<input type="hidden" name="id_mahasiswa">
						
						<div class="form-group form-show-validation row mt--2">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama <span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-9 col-sm-12">
								<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama  Mahasiswa " required="">
							</div>
						</div>
						<br>
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nim<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">

								<input type="number" name="nim" class="form-control" placeholder="Masukkan Nim" required="">

							</div>
						</div>
						<br>
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Telepon<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<input type="number" name="notlp" class="form-control" required="" placeholder="Masukkan Nomor Telepon">
							</div>
						</div>
						<br>
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Kelas<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<select name="kelas" class="form-control" required="">
									<option value="1">Pagi</option>
									<option value="2">Sore</option>
								</select>
							</div>
						</div>
						<br>
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<input type="text" name="email" class="form-control" required="" placeholder="Masukkan Nomor email">
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
						<br>
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Jurusan<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<select name="jurusan" class="form-control" required="" >
									@foreach($jurusan as $jurusans)

									<option  value="{{$jurusans->id}}">{{$jurusans->nama}}</option>
									@endForeach
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