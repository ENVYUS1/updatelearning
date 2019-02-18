@extends('layout.layout')
@section('content')


<div class="page-inner">
	<div class="row text-center">
		<div class="col-sm-12 mt-2">
			<h1 class="mt-3 display-4" style="font-family: 'Bree Serif', serif; color: #041842">E-<span class="text-warning">LEARNING</span></h1>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-sm-3 col-6">
			<div class="card text-center">
				<div class="card-body skew-shadow">
					<h5 class="op-8">Total conversations</h5>
					<h1><i class="icon-book-open display-1 text-warning"></i></h1>
					<div class="pull-right">
						<h3 class="fw-bold op-8">88%</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-6">
			<div class="card text-center">
				<div class="card-body skew-shadow">
					<h5 class="op-8">Total conversations</h5>
					<h1><i class="icon-notebook display-1 text-warning"></i></h1>
					<div class="pull-right">
						<h3 class="fw-bold op-8">88%</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-6">
			<div class="card text-center">
				<div class="card-body skew-shadow">
					<h5 class="op-8">Total conversations</h5>
					<h1><i class="icon-calendar display-1 text-warning"></i></h1>
					<div class="pull-right">
						<h3 class="fw-bold op-8">88%</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-6">
			<div class="card text-center">
				<div class="card-body skew-shadow">
					<h5 class="op-8">Total conversations</h5>
					<h1><i class="icon-note display-1 text-warning"></i></h1>
					<div class="pull-right">
						<h3 class="fw-bold op-8">88%</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card full-height">
		<div class="card-header">
			<div class="card-head-row">
				<div class="card-title">Support Tickets</div>
				<div class="card-tools">
					<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="d-flex">
				<div class="avatar avatar-online">
					<span class="avatar-title rounded-circle border border-white bg-info">J</span>
				</div>
				<div class="flex-1 ml-3 pt-1">
					<h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
					<span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
				</div>
				<div class="float-right pt-1">
					<small class="text-muted">8:40 PM</small>
				</div>
			</div>
			<div class="separator-dashed"></div>
			<div class="d-flex">
				<div class="avatar avatar-offline">
					<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
				</div>
				<div class="flex-1 ml-3 pt-1">
					<h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
					<span class="text-muted">I have some query regarding the license issue.</span>
				</div>
				<div class="float-right pt-1">
					<small class="text-muted">1 Day Ago</small>
				</div>
			</div>
			<div class="separator-dashed"></div>
			<div class="d-flex">
				<div class="avatar avatar-away">
					<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
				</div>
				<div class="flex-1 ml-3 pt-1">
					<h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
					<span class="text-muted">Is there any update plan for RTL version near future?</span>
				</div>
				<div class="float-right pt-1">
					<small class="text-muted">2 Days Ago</small>
				</div>
			</div>
			<div class="separator-dashed"></div>
			<div class="d-flex">
				<div class="avatar avatar-offline">
					<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
				</div>
				<div class="flex-1 ml-3 pt-1">
					<h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
					<span class="text-muted">I have some query regarding the license issue.</span>
				</div>
				<div class="float-right pt-1">
					<small class="text-muted">2 Day Ago</small>
				</div>
			</div>
			<div class="separator-dashed"></div>
			<div class="d-flex">
				<div class="avatar avatar-away">
					<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
				</div>
				<div class="flex-1 ml-3 pt-1">
					<h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
					<span class="text-muted">Is there any update plan for RTL version near future?</span>
				</div>
				<div class="float-right pt-1">
					<small class="text-muted">2 Days Ago</small>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection