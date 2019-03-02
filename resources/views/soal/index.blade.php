@extends('layout.layout')

@section('content')

<div class="page-inner">
	<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		<div>
			<div class="page-header">
				<h4 class="page-title">soal</h4>
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
						<a href="/soal">soal</a>
					</li>
				</ul>
			</div> 
		</div>
		<div class="ml-md-auto py-2 mb-2 py-md-0">
			<a href="#" class="btn btn-success btn-round" onclick="modal_soal()">Tambah</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="tabel-soal" class="table table-head-bg-info table-striped table-hover" width="100%" >
							<thead>
								<tr class="active">
									<th width="5%">No</th>
									<th>Soal</th>
									<th>Matakuliah</th>
									<th>Keterangan</th>
									<th>Waktu</th>
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
<div class="modal" id="modal-soal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" soal="document">
		<div class="modal-content">
			<div class="modal-header no-bd" >
				<div class="card-title">Tambah soal</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-soal" enctype="multipart/form-data">
		
				<input type="hidden" name="aksi">
				<div class="modal-body">
					<div class="card-body">
						<input type="hidden" name="id_soal">
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Soal<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<input type="text" name="nama" class="form-control" required="" placeholder="Masukkan Quiz keberapa ">
							</div>
						</div>
						<br>
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">soal<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<textarea class="form-control" name="soal" rows="10" cols="50" placeholder="Masukkan Soal"></textarea>
							</div>
						</div>
						<br>
						<div class="form-group form-show-validation row mt--2">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Matakuliah <span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-9 col-sm-12 select2-input">
								<select name="id_grubsoal" class="form-control">
									@foreach($matkul as $matkuls)

					        <option value="{{$matkuls->id}}">{{$matkuls->GrubSoalKelas->KelasMatkul->nama_matkul}} ({{$matkuls->GrubSoalKelas->Token}})</option>

									@endforeach

								</select>
							</div>
						</div>
						<br>
						
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">File<span class="required-label"></span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<input type="file" name="file" class="form-control">
							</div>
						</div>
						<br>

						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Waktu<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<input type="number" name="waktu" class="form-control" required="" placeholder="maukkan waktu berarapa menit">
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