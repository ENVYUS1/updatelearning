@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">

		@include('file_manager.menu')
		
		<div class="page-content mail-content bg-white">
			<div class="inbox-head d-lg-flex d-block">
				<h3><i class="flaticon-folder ml-2"></i> MATERI PELAJARAN</h3>
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
			<div class="inbox-body" style="max-height: 500px; overflow-y: auto;">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="fw-bold">NAMA</th>
							<th class="fw-bold">TIPE</th>
							<th class="fw-bold">UKURAN</th>
							<th class="fw-bold text-center">AKSI</th>
						</tr>
					</thead>
					<tbody>
						@for($i=0; $i<15; $i++)
						<tr>
							<td>
								<div class="avatar mr-3">
									<span class="avatar-title rounded-circle border bg-danger border-white"><i class="fas fa-file-pdf"></i></span>
								</div>
							Materi Matematika</td>
							<td>PDF</td>
							<td>2.5 Mb</td>
							<td width="5%">
								<div class="form-button-action">
									<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info edit-quote" data-original-title="Download">
										<i class="fa fa-download"></i>
									</button>
									<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary edit-quote" data-original-title="Edit Task">
										<i class="fa fa-edit"></i>
									</button>
									<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger hapus-quote" data-original-title="Remove">
										<i class="fa fa-times"></i>
									</button>
								</div>
							</td>
						</tr>
						@endfor
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection