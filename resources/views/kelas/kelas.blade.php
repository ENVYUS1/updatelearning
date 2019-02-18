@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">
		<div class="page-aside bg-grey1">
			<div class="aside-header">
				<div class="title">LESSONS</div>
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
						for ($i=0; $i < 10 ; $i++) { 
							echo '
								<li>
									<a href="#">
										<b>'.$no++. '. NAMA MATERI</b> <i class="flaticon-right-arrow-4 ml-2"></i>';

										if($i == 9){
											echo '<span class="badge badge-danger float-right">i</span>';
										}

									echo '</a>
								</li>
							';
						}
					?>
				</ul>
				<div class="aside-compose"><a href="#" class="btn btn-primary btn-block fw-mediumbold">Compose Email</a></div>
			</div>
		</div>
		<div class="page-content mail-content bg-grey1">
			<div class="inbox-head  d-block">
				<p class="text-warning">NAMA MATERI</p>
				<h3><b>LESSON 1</b> - INTRODUCTION</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, pariatur quis autem aut corporis? Voluptate quisquam aspernatur, reprehenderit quaerat blanditiis, voluptates, tempore odit sunt earum cumque ducimus optio porro quae!</p>



				<div class="row ">
					<div class="col-sm-4 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fab fa-youtube display-1 text-danger"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-excel display-1 text-success"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card text-center">
							<div class="card-body">
								<h1><i class="fas fa-file-powerpoint display-1 text-warning"></i></h1>

								<h5 class="op-8">Lorem ipsum dolor sit amet dolor sit amet</h5>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row mt-5">
					<div class="col-sm-6 col-lg-6 mb-4">
						<div class="d-flex align-items-center">
							<span class="stamp stamp-md bg-grey1 mr-3" style="margin-top: -90px">
								<h1><i class="icon-note text-warning"></i></h2>
							</span>
							<div>
								<h5 class="mb-1"><b><a href="#">QUIZ</a></b></h5>
								<small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quam nisi odio iure incidunt, voluptatem quod enim tempore doloribus laborum. </small>
								<div class="d-flex justify-content-between mt-2">
									<button class="btn btn-round btn-border btn-sm  btn-warning">Take Quiz</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6">
						<div class="d-flex align-items-center">
							<span class="stamp stamp-md bg-grey1 mr-3" style="margin-top: -90px">
								<h1><i class="icon-note text-warning"></i></h2>
							</span>
							<div>
								<h5 class="mb-1"><b><a href="#">QUIZ</a></b></h5>
								<small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quam nisi odio iure incidunt, voluptatem quod enim tempore doloribus laborum. </small>
								<div class="d-flex justify-content-between mt-2">
									<button class="btn btn-round btn-border btn-sm  btn-warning">Take Quiz</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection