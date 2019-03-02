@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">

		@include('kelas.menu')
		
		<div class="page-content mail-content bg-white">
			<div class="inbox-head d-lg-flex d-block">
				<h3>MATERI MATEMATIKA REKAYASA</h3>
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
					<button type="button" onclick="form_materi()" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Materi</button>
				</div>
				<div style="max-height: 500px; overflow-x: hidden;">
					<div class="list-group list-group-messages list-group-flush">
						@if(count($materi) > 0)
						@foreach($materis as $data)

						<?php 
						if($data->url != NULL){
							$url = $data->url;
							$avatar = '<a href="'.$url.'" class="video" data-toggle="tooltip" data-placemnet="top" title="Putar">
							<span class="avatar-title rounded-circle bg-warning border border-white"><i class="fab fa-youtube"></i></span>
							</a>';
						}else{
							$url = '/template/assets/materi/'.$data->nama_file;
							$avatar = '<a href="'.$url.'" class="video" target="_blank" data-toggle="tooltip" data-placemnet="top" title="Baca">
							<span class="avatar-title rounded-circle bg-danger border border-white"><i class="fas fa-file-pdf"></i></span>
							</a>';
						}
						?>

						<div class="list-group-item">
							<div class="list-group-item-figure">
								<div class="avatar-group">
									<div class="avatar">
										{!! $avatar !!}
									</div>
								</div>
							</div>
							<div class="list-group-item-body pl-3 pl-md-4">
								<div class="row">
									<div class="col-12 col-lg-9">
										<h4 class="list-group-item-title">
											<a href="{{ $url }}" class="video">{{ $data->nama_materi }}</a>
										</h4>
										<p class="list-group-item-text text-truncate">{{ $data->keterangan_materi }}</p>
									</div>
									<div class="col-12 col-lg-3 text-lg-right">
										<p class="list-group-item-text">{{ get_time_difference_php($data->created_at) }}</p>
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
										<a href="#" class="dropdown-item">Download</a>
										<a href="#" did="{{ $data->id }}" class="dropdown-item edit-materi">Edit</a>
										<a href="#" data-toggle="modal" class="dropdown-item">Hapus</a>
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
									<p class="lead">Materi tidak tersedia </p>
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


<!-- Modal Tambah Materi-->
<div class="modal fade" id="modal_tambah_materi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<div class="card-title"><i class="fas fa-plus-circle text-success"></i> Tambah Materi</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-materi">
				<input type="hidden" name="aksi" id="aksi" value="1">
				<input type="hidden" name="id_kelas" value="{{ $id_kelas }}">
				<input type="hidden" name="id_materi" id="id_materi">
				<div class="modal-body no-bd">
					<div class="form-group form-show-validation row mt-2">
						<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Materi <span class="required-label">*</span></label>
						<div class="col-lg-7 col-md-12 col-sm-12">
							<input type="text" name="nama" id="nama" class="form-control" required placeholder="Masukkan Nama Materi" aria-required="true">
						</div>
					</div>
					<div class="form-group form-show-validation row mt-2">
						<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Keterangan Materi <span class="required-label">*</span></label>
						<div class="col-lg-7 col-md-12 col-sm-12">
							<textarea name="keterangan" class="form-control" id="keterangan" rows="3" required placeholder="Masukkan Nama Materi" aria-required="true"></textarea>
						</div>
					</div>
					<div class="form-group form-show-validation row mt-2" id="select-method">
						<label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right"></label>
						<div class="col-lg-7 selectgroup w-100">
							<label class="selectgroup-item">
								<input type="radio" name="pilihan" value="1" class="selectgroup-input" checked="">
								<span class="selectgroup-button selectgroup-button-icon">File</span>
							</label>
							<label class="selectgroup-item">
								<input type="radio" name="pilihan" value="2" class="selectgroup-input">
								<span class="selectgroup-button selectgroup-button-icon">Video</span>
							</label>
							<label class="selectgroup-item">
								<input type="radio" name="pilihan" value="3" class="selectgroup-input">
								<span class="selectgroup-button selectgroup-button-icon">Semuanya</span>
							</label>
						</div>
					</div>
					<div id="form-pilihan">
						<div class="form-group form-show-validation row mt-1">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">File Materi <span class="required-label">*</span></label>
							<div class="col-lg-7 col-md-12 col-sm-12">
								<input type="file" name="file" class="form-control" required placeholder="Masukkan Nama Materi" aria-required="true">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer no-bd mt--1">
					<button class="btn btn-success">Simpan</button>
					<button data-dismiss="modal" class="btn">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection