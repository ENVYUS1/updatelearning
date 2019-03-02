
@extends('layout.layout')
@section('content')
<div class="page-inner">
	<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		<div>
			<div class="page-header">
				<h4 class="page-title"> Ubah Password</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="/">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="/">Home</a>
					</li>
				</ul>
			</div> 
		</div>
	</div>
	
	<div class="row col-md-12" >
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" >
					<div class="card-title">Ubah Password</div>
				</div>
				<form class="validation" method="POST"  action="/ubah-password" id="passwordForm">
					@csrf
					<div class="modal-body">
						<div class="card-body">
							<div class="form-group form-show-validation row" id="status">
								<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password Lama<span class="required-label">*</span></label>
								<div class="col-lg-6 col-md-12 col-sm-12">
								     <input type="password" name="lama" placeholder="Masukkan Password lama" class="form-control" required="" id="old_password">
								</div>
							</div>
						<div class="form-group form-show-validation row" id="status">
								<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password Baru<span class="required-label">*</span></label>
								<div class="col-lg-6 col-md-12 col-sm-12">
								 <input type="password" name="baru"  placeholder="Masukkan Password Baru" class="form-control" required="" id="new_password">

								</div>
							</div>
				
						<div class="form-group form-show-validation row" id="status">
								<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Konfirmasi<span class="required-label">*</span></label>
								<div class="col-lg-6 col-md-12 col-sm-12">
								 <input type="password" name="konf"  placeholder="konfirmasi password" class="form-control" required=""  id="confirm_password">

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


