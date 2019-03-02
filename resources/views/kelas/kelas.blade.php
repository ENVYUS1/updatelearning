@extends('layout.layout')
@section('content')

<div class="page-inner">
	<div class="page-header">
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
		<div class="ml-md-auto py-2 py-md-0">
			<div class="input-group">
				<input type="text" placeholder="Cari kelas" class="form-control">
				<div class="input-group-append">
					<span class="input-group-text">
						<i class="fa fa-search search-icon"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		@for($i = 0; $i < 3; $i++)
		<div class="col-md-3">
			<div class="card card-profile bubble-shadow full-height card-info">
				<div class="card-header">
					<div class="avatar avatar-xs mr-2">
						<span class="avatar-title rounded-circle border bg-warning border-white"><i class="fas fa-chalkboard-teacher"></i></span>
					</div>
				</div>
				<div class="card-body text-white mt--5">
					<div class="user-profile text-center mt--5">
						<div class="name fw-bold">REKAYASA PERANGKAT LUNAK</div>
						<div class="job text-white">Pahri Khalid</div>
						<div class="desc text-white">25/40 Mhs | Sore</div>
						<div class="view-profile">
							<a href="/kelas/informasi" class="btn btn-light btn-rounded text-info">Masuk Kelas</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endfor		
		<div class="col-md-3">
			<div class="card card-profile full-height bg-grey1 card-add" onclick="modal_tambah_kelas()">
				<div class="card-body text-center mt--3">
					<i class="icon-plus text-success display-1"></i>
					<p class="text-success fw-bold">TAMBAH KELAS</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_kelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<h2>Silahkan masukkan <b>NO TOKEN</b> kelas</h2>
			</div>
			<div class="modal-footer no-bd">
				<button type="button" class="btn btn-primary">Gabung</button>
				<button type="button" class="btn" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@endsection