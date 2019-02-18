@extends('layout.layout')

@section('content')


<div class="page-inner">
	<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		<div>
			<div class="page-header">
				<h4 class="page-title">Matakuliah</h4>
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
						<a href="/matkul">Matakuliah</a>
					</li>
				</ul>
			</div> 
		</div>
		<div class="ml-md-auto py-2 mb-2 py-md-0">
			<a href="#" class="btn btn-success btn-round" onclick="modal_matkul()"><i class="fas fa-bullhorn"></i> Tambah</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive" >
						<table id="tabel-matkul" class="table table-head-bg-info table-striped table-hover" width="100%" >
							<thead>
								<tr class="active">
									<th width="5%">No</th>
									<th width="40%">Nama</th>
									<th>Keterangan</th>
									<th >Action</th>
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
	<div class="modal" id="modal-matkul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" matkul="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="card-title"><i class="fas fa-bullhorn"></i> Tambah Matakuliah</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form-matkul">
					<input type="hidden" name="aksi">
					<div class="modal-body">
						<div class="card-body">
							<input type="hidden" name="id_matkul">
							<div class="form-group form-show-validation row mt--2">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama <span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-9 col-sm-12">
								<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama file " required>
							</div>
						</div>

						<br>
						<div class="form-group form-show-validation row">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Keterangan<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<textarea class="form-control"  rows="5" name="keterangan" required " placeholder="Masukkan Keterangan"></textarea>

							</div>
						</div>

					</div>
		
	
					<div class="modal-footer">
				
						<button type="button" class="btn" data-dismiss="modal">Batal</button>
						<button class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection