@extends('layout.layout')

@section('content')


<div class="page-inner">
	<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		<div>
			<div class="page-header">
				<h4 class="page-title">Quote</h4>
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
						<a href="/quote">Quote</a>
					</li>
				</ul>
			</div> 
		</div>
		<div class="ml-md-auto py-2 mb-2 py-md-0">
			<a href="#" class="btn btn-success btn-round" onclick="modal_quote()"><i class="fas fa-plus"></i> Tambah</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive" >
						<table id="tabel-quote" class="table table-head-bg-info table-striped table-hover" width="100%" >
							<thead>
								<tr class="active">
									<th width="5%">No</th>
									<th>Foto</th>
									<th>Nama</th>
									<th>Text Quote</th>
									<th >Opsi</th>
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
<div class="modal" id="modal-quote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" quote="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<div class="card-title"><span class="title-modal"><i class="fas fa-plus-circle text-success"></i> Tambah Quote</span></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-quote">
				<input type="hidden" name="aksi">
				<div class="modal-body">
					<div class="card-body">
						<input type="hidden" name="id_quote">
						
						<div class="row">
							<div class="col-sm-3 col-5 ml-auto mr-auto">
								<div class="form-group row">
									<div class="input-file input-file-image">
										<img class="img-upload-preview" width="150" src="http://placehold.it/100x100" alt="preview">
										<input type="file" class="form-control form-control-file" id="uploadImg1" name="foto" accept="image/*" required="">
										<label for="uploadImg1" class="label-input-file btn btn-default btn-round">
											<span class="btn-label">
												<i class="fa fa-file-image"></i>
											</span>
											Pilih Foto
										</label>
									</div>
								</div>
								<br>
							</div>
							<div class="col-sm-9">
								<div class="form-group row mt--2">
									<label for="name">Nama <span class="required-label">*</span></label>
									<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama file " required>
								</div>
								<br>
								<div class="form-group row">
									<label for="name">Text Quote<span class="required-label">*</span></label>
									<textarea class="form-control"  rows="6" name="quote" required " placeholder="Masukkan quote"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer no-bd">
						<button class="btn btn-primary">Simpan</button>
						<button type="button" class="btn" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection