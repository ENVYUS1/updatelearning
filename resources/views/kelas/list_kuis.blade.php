@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">
		<div class="page-aside bg-grey1">
			<div class="aside-header">
				<div class="title">DAFTAR KUIS</div>
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
			<br>
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
							<button type="button" class="btn btn-secondary btn-border"><i class="fa fa-angle-left"></i></button>
							<button type="button" class="btn btn-secondary btn-border"><i class="fa fa-angle-right"></i></button>
						</div>
					</div>
				</div>

				<div class="email-list">
					<div class="email-list-item ">
						<div class="email-list-detail">
							<div class="avatar float-right">
								<span class="avatar-title rounded-circle border border-white bg-warning">60</span>
							</div>
							<span class="from fw-bold">Kuis ke-1 (Nama Materi)</span>
							<p class="msg">2 Februari 2019</p>
						</div>
					</div>
					<div class="email-list-item ">
						<div class="email-list-detail">
							<div class="avatar float-right">
								<span class="avatar-title rounded-circle border border-white bg-success">100</span>
							</div>
							<span class="from fw-bold">Kuis ke-2 (Nama Materi)</span>
							<p class="msg">2 Februari 2019</p>
						</div>
					</div>
					<div class="email-list-item ">
						<div class="email-list-detail">
							<div class="avatar float-right">
								<span class="avatar-title rounded-circle border border-white bg-danger">40</span>
							</div>
							<span class="from fw-bold">Kuis ke-3 (Nama Materi)</span>
							<p class="msg">2 Februari 2019</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection