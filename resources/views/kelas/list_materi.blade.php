@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">
		<div class="page-aside bg-grey1">
			<div class="aside-header">
				<div class="title">DAFTAR MATERI</div>
				<a class="btn btn-primary toggle-email-nav" data-toggle="collapse" href="#email-app-nav" role="button" aria-expanded="false" aria-controls="email-nav">
					<span class="btn-label">
						<i class="icon-menu"></i>
					</span>
					Menu
				</a>
			</div>
			<div class="aside-nav collapse" id="email-app-nav">
				<ul class="nav">
					<?php 
					$no = 1;
					for ($i=0; $i < 4 ; $i++) { 
						$array = ["Matemtika Diskrit", "Matematika Rekayasa", "Struktur Data", "Fundamental Of Computing"];
						echo '
						<li>
						<a href="#">
						<b>'.$no++. '. '.$array[$i].'</b> ';
						echo '
						<span class="badge badge-info float-right">7</span>
						</a>
						</li>
						';
					}
					?>
				</ul>
			</div>
		</div>
		<div class="page-content mail-content bg-white">
			<div class="inbox-body">
				<div class="mail-option">
					<div class="email-filters-left">
						<div class="input-group">
							<input type="text" placeholder="Search Email" class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fa fa-search search-icon"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="email-filters-right ml-auto"><span class="email-pagination-indicator">1-50 of 213</span>
						<div class="btn-group ml-3">
							<button type="button" class="btn btn-info btn-border"><i class="fa fa-angle-left"></i></button>
							<button type="button" class="btn btn-info btn-border"><i class="fa fa-angle-right"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="inbox-head mt--5">
				<div class="row ">
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-video display-1 text-success"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-video display-1 text-success"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-video display-1 text-success"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-pdf display-1 text-danger"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-pdf display-1 text-danger"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-powerpoint display-1 text-warning"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-word display-1 text-primary"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-word display-1 text-primary"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-word display-1 text-primary"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-archive display-1 text-secondary"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-archive display-1 text-secondary"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-archive display-1 text-secondary"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection