@extends('layout.layout')
@section('content')
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Profil</h4>
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
				<a href="#">Profil</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<div class="card card-profile">
				<div class="card-header" style="background-image: url('/template/assets/img/examples/product10.jpeg')">
					<div class="profile-picture">
						<div class="avatar avatar-xl">
							<img src="/template/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="user-profile text-center">
						<div class="name">Hizrian, 19</div>
						<div class="job">Frontend Developer</div>
						<div class="desc">A man who hates loneliness</div>

					</div>
				</div>
				<div class="card-footer">
					<div class="row user-stats text-center">
						<div class="col">
							<div class="number">125</div>
							<div class="title">Post</div>
						</div>
						<div class="col">
							<div class="number">25K</div>
							<div class="title">Followers</div>
						</div>
						<div class="col">
							<div class="number">134</div>
							<div class="title">Following</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card card-round">
				<div class="card-body">
					<div class="card-title fw-mediumbold">Suggested People</div>
					<div class="card-list">
						<div class="item-list">
							<div class="avatar">
								<img src="template/assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info-user ml-3">
								<div class="username">Jimmy Denis</div>
								<div class="status">Graphic Designer</div>
							</div>
							<button class="btn btn-icon btn-primary btn-round btn-xs">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<div class="item-list">
							<div class="avatar">
								<img src="template/assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info-user ml-3">
								<div class="username">Chad</div>
								<div class="status">CEO Zeleaf</div>
							</div>
							<button class="btn btn-icon btn-primary btn-round btn-xs">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<div class="item-list">
							<div class="avatar">
								<img src="template/assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info-user ml-3">
								<div class="username">Talha</div>
								<div class="status">Front End Designer</div>
							</div>
							<button class="btn btn-icon btn-primary btn-round btn-xs">
								<i class="fa fa-plus"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="card card-with-nav">
				<div class="card-body">
					<ul class="nav nav-pills nav-warning nav-pills-no-bd justify-content-center" id="pills-tab" role="tablist">
						<li class="nav-item submenu">
							<a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Kelas</a>
						</li>
						<li class="nav-item submenu">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Kuis</a>
						</li>
					</ul>
					<br>
					<table id="basic-datatables" class="table-head-bg-info table table-striped table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Kelas</th>
								<th>Dosen</th>
								<th>Tgl Daftar</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
							</tr>
							<tr>
								<td>2.</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
							</tr>
							<tr>
								<td>3.</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
							</tr>
							<tr>
								<td>4.</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
							</tr>
							<tr>
								<td>5.</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection