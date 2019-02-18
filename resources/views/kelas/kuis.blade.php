@extends('layout.layout')
@section('content')

<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Kuis <span class="text-warning">Bahasa Inggirs</span></h4>
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
				<a href="#">Kelas</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Kuis</a>
			</li>
		</ul>
	</div>


	<div class="card alert-warning">
		<div class="card-body">
			Jumlah soal : 5
			<br>
			Batas pengerjaan : jam 16:00 WITA
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-1">
					<div class="avatar">
						<span class="avatar-title rounded-circle border border-white">1</span>
					</div>
					<div class="avatar">
						<span class="avatar-title bg-success rounded-circle border border-white fas fa-check"></span>
					</div>
				</div>
				<div class="col-sm-11">
					<div class="card-sub">
						<p class="blockquote blockquote-primary" align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book ?</p>

						<label class="radio-btn">One
							<input type="radio" name="jawaban" checked="checked">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Two
							<input type="radio" name="jawaban">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Three
							<input type="radio" name="jawaban">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Four
							<input type="radio" name="jawaban">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-1">
					<div class="avatar">
						<span class="avatar-title rounded-circle border border-white">2</span>
					</div>
					<div class="avatar">
						<span class="avatar-title bg-success rounded-circle border border-white fas fa-check"></span>
					</div>
				</div>
				<div class="col-sm-11">
					<div class="card-sub">
						<p class="blockquote blockquote-primary" align="justify">Lorem Ipsum is simply dummy _________?</p>

						<label class="radio-btn">One
							<input type="radio" name="jawaban[2]" checked="checked">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Two
							<input type="radio" name="jawaban[2]">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Three
							<input type="radio" name="jawaban[2]">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Four
							<input type="radio" name="jawaban[2]">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-1">
					<div class="avatar">
						<span class="avatar-title rounded-circle border border-white">3</span>
					</div>
					<div class="avatar">
						<span class="avatar-title bg-success rounded-circle border border-white fas fa-check"></span>
					</div>
				</div>
				<div class="col-sm-11">
					<div class="card-sub">
						<img src="/template/assets/img/examples/product12.jpeg" width="100%" alt="">
						<p class="blockquote blockquote-primary" align="justify">Lorem Ipsum is simply dummy _________?</p>

						<label class="radio-btn">One
							<input type="radio" name="jawaban[3]" checked="checked">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Two
							<input type="radio" name="jawaban[3]">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Three
							<input type="radio" name="jawaban[3]">
							<span class="checkmark"></span>
						</label>

						<label class="radio-btn">Four
							<input type="radio" name="jawaban[3]">
							<span class="checkmark"></span>
						</label>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-sm-1">
					<div class="avatar">
						<span class="avatar-title rounded-circle border border-white">4</span>
					</div>
					<div class="avatar">
						<span class="avatar-title bg-success rounded-circle border border-white fas fa-check"></span>
					</div>
				</div>
				<div class="col-sm-11">
					<div class="card-sub">
						<p class="blockquote blockquote-primary" align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book ?</p>

						<div class="form-group mb-2">
							<label for="comment">Jawaban</label>
							<textarea class="form-control" id="comment" rows="5">
							</textarea>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="text-right">
				<button class="btn btn-success"><i class="fas fa-save"></i> SIMPAN </button>
				<button class="btn btn-dark"><i class="fas fa-arrow-left"></i> KEMBALI </button>
			</div>
		</div>
	</div>
</div>
@endsection