@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">

		@include('kelas.menu')
		
		<div class="page-content mail-content bg-white">
			<div class="inbox-head d-lg-flex d-block">
				<h3>INFORMASI DOSEN</h3>
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
					<button type="button" onclick="form_pesan()" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Informasi</button>
				</div>
				<div style="max-height: 400px; overflow-y: auto;">
					<div class="list-group list-group-messages list-group-flush">
						@for($i=0; $i<10; $i++)
						<div class="list-group-item">
							<div class="list-group-item-figure">
								<a href="conversations.html" class="user-avatar">
									<div class="avatar avatar-online">
										<span class="avatar-title bg-info rounded-circle border border-white"><i class="fas fa-user-alt"></i></span>
									</div>
								</a>
							</div>
							<div class="list-group-item-body pl-3 pl-md-4">
								<div class="row">
									<div class="col-12 col-lg-9">
										<h4 class="list-group-item-title">
											<a href="conversations.html">Jimmy Denis</a>
										</h4>
										<p class="list-group-item-text text-truncate"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit magni numquam itaque at eligendi quo fugit hic distinctio eum, animi atque, iusto fugiat dicta. Recusandae quo doloremque mollitia, commodi excepturi? </p>
									</div>
									<div class="col-12 col-lg-3 text-lg-right">
										<p class="list-group-item-text"> 16 minutes ago </p>
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
										<a href="#modal_informasi" class="dropdown-item" data-toggle="modal">Lihat</a>
										<a href="#modal_tambah_informasi" class="dropdown-item" data-toggle="modal">Edit</a>
										<a href="#" class="dropdown-item">Hapus</a>
									</div>
								</div>
							</div>
						</div>
						@endfor
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white bubble-shadow">
				<h4 class="modal-title" id="exampleModalLongTitle">
					<div class="avatar avatar-sm mr-2">
						<span class="avatar-title rounded-circle border bg-warning border-white"><i class="fas fa-comment-alt"></i></span>
					</div> 
				ISI PESAN</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body no-bd">
				<blockquote class="blockquote">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, ipsa at facere eaque similique natus earum perspiciatis, quia sequi, suscipit, voluptatem perferendis soluta minima rem voluptatibus cum consequuntur! Quod, iure!</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, ipsa at facere eaque similique natus earum perspiciatis, quia sequi, suscipit, voluptatem perferendis soluta minima rem voluptatibus cum consequuntur! Quod, iure!</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, ipsa at facere eaque similique natus earum perspiciatis, quia sequi, suscipit, voluptatem perferendis soluta minima rem voluptatibus cum consequuntur! Quod, iure!</p>
					<footer class="blockquote-footer">Sincerely <cite title="Source Title">PAHRI KHALID</cite></footer>
				</blockquote>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah Informasi-->
<div class="modal fade" id="modal_tambah_informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<div class="card-title"><i class="fas fa-plus-circle text-success"></i> Tambah Pesan Informasi</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_pesan">
				<div class="modal-body no-bd">
					<div class="form-group">
						<label>Pesan <span class="required-label">*</span></label>
						<textarea name="pesan_informasi" rows="10" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer no-bd mt--3">
					<button class="btn btn-success">Kirim</button>
					<button data-dismiss="modal" class="btn">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection