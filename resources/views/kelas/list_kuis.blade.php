
@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">
		
		<div class="page-aside bg-grey1">
			<div class="aside-header">
				<a href="../kuis" class="text-danger"><i class="flaticon-left-arrow-3"></i> KEMBALI</a>
				<br><br>
				<div class="title">KUIS KE-</div>
				
				<div class="card-add text-center mt-4" style="border-radius: 6px">
					<div class="my-4">
						<div class="title"><h1 style="font-size: 40px" class="fw-bold text-muted" id="timer">00:00:00</h1></div>
						<div>Waktu tersisa</div>
					</div>
				</div>

				<button class="btn btn-block btn-info mt-3" data-toggle="modal" data-target="#modal_bantuan"><i class="fas fa-question-circle"></i> Bantuan</button>
			</div>
		</div>

		<div class="page-content mail-content bg-white">
			<div class="inbox-head d-lg-flex d-block">
				<h3>SOAL PERTANYAAN!</h3>
				<div class="btn-group ml-auto">
					<button type="button" class="btn btn-lg btn-border text-muted"><i class="icon-check mr-1 text-success"></i>{{count($hitung)}} terjawab</button>
					<button type="button" class="btn btn-lg btn-border text-muted"><i class="icon-clock mr-1 text-warning"></i> {{count($soal)}} Belum dijawab</button>
				</div>
			</div>
			<div class="inbox-body" style="max-height: 500px; overflow-y: auto;">
				<div class="list-group list-group-messages list-group-flush">
					
					<div class="list-group-item">
						<div class="list-group-item-figure">
							<a href="conversations.html" class="user-avatar">
								<div class="avatar">
									<span class="avatar-title rounded-circle border border-white bg-warning">1</span>
								</div>
							</a>
						</div>
						<div class="list-group-item-body pl-3 pl-md-4">
							<div class="row">
								<div class="col-12">

									@if($hitung >0)
									@foreach($hitung as $hit)
									<h4 class="list-group-item-title">
										{{$hit->ket_soal}}
									</h4>
									<div class="form-group">
										<label class="form-label">Jawaban</label>
										<textarea class="form-control" id="comment" rows="5" disabled>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo velit iusto beatae quod consequuntur officiis veritatis nesciunt nihil dolorum cumque eum itaque.</textarea>
									</div>
									<button class="btn btn-sm btn-info mt-3">Edit jawaban</button>
								</div>

								<div class="form-group">
									<label class="form-label">Jawaban gambar</label>

									<form method="POST" >
										@csrf
										<div class="row">
											<div class="col-sm-3 col-6 mb-2">
												<img src="/template/assets/img/blogpost.jpg" class="img-thumbnail" width="100%" alt="">
												
                                                <div style="margin-left: 10%;padding-top: 5%">

												<button class="btn btn-sm btn-info sm-1">Edit</button>

											    <a href="" class="btn btn-sm btn-danger sm-1">hapus</a>

											    </div>
											</div>
											
										</div>

										@endif
										@endforech

									</form>
								</div>
								
							</div>
						</div>
					</div>
				</div>

				

				@foreach($soal as $soals)
				<div class="list-group-item">
					<div class="list-group-item-figure">
						<a href="conversations.html" class="user-avatar">
							<div class="avatar">
								<span class="avatar-title rounded-circle border border-white bg-warning">{{$i++}}</span>
							</div>
						</a>
					</div>
					<div class="list-group-item-body pl-3 pl-md-4">
						<div class="row">
							<div class="col-12">
								<h4 class="list-group-item-title">
									{{$soals->ket_soal}}
								</h4>
								<a href="#" did="{{$soals->id}}" class="btn mt-3 btn-sm btn-info jawab-soal">Jawab Soal</a>

							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

<!-- Modal Jawab soal-->
<!-- Modal Jawab soal-->
<div class="modal fade" id="modal_jawab_soal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content" style="width: 100%">
			<div class="modal-header bg-info text-white bubble-shadow">
				<h4 class="modal-title" id="exampleModalLongTitle">
					<div class="avatar avatar-sm mr-2">
						<span class="avatar-title rounded-circle border bg-warning border-white"><i class="fas fa-pen"></i></span>
					</div> 
				JAWAB SOAL NO -</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			

			<form  method="post" action="/kelas/jawabantext" enctype="multipart/form-data">
				@csrf
				<div class="card-body">

					<div class="form-group form-show-validation row col-lg-12">
						<input type="hidden" name="id_soal">

						<input type="hidden" name="id_user" value="{{Auth::user()->id}}">
						<div class="col-lg-12">
							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<textarea class="form-control" rows="5"  name="soal" id="summernote"></textarea>
							</div>
						</div>
					</div>

					<div class="form-group form-show-validation row">
						<div class="col-lg-12 col-md-9 col-sm-8">
							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<div class="input-file input-file-image">
									<input type="file" multiple="multiple" class="form-control form-control-file" id="uploadImg" name="file[]" accept="image/*">
									<label for="uploadImg" class=" label-input-file btn btn-primary">Upload  file</label>
								</div>
							</div>
						</div>
					</div>

					<br>
					<div class="card-action">
						<div class="row">
							<div class="col-md-12 text-right">
								<input class="btn btn-success" type="submit" value="Jawab">
								<button class="btn btn-danger">Cancel</button>
							</div>										
						</div>
					</div>
				</form>
			</div>

		</div>

	</div>

</div>

</div>


<!-- Modal Bantuan-->
<div class="modal fade" id="modal_bantuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white bubble-shadow">
				<h4 class="modal-title" id="exampleModalLongTitle">
					<div class="avatar avatar-sm mr-2">
						<span class="avatar-title rounded-circle border bg-warning border-white"><i class="fas fa-question"></i></span>
					</div> 
				BANTUAN</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body no-bd">
				<div class="row">
					<div class="col-sm-3">
						<div class="nav flex-column nav-pills nav-warning nav-pills-no-bd" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-home-tab-nobd" data-toggle="pill" href="#v-pills-home-nobd" role="tab" aria-controls="v-pills-home-nobd" aria-selected="true">Menjawab Soal</a>
							<a class="nav-link" id="v-pills-profile-tab-nobd" data-toggle="pill" href="#v-pills-profile-nobd" role="tab" aria-controls="v-pills-profile-nobd" aria-selected="false">Waktu Menjawab</a>
							<a class="nav-link" id="v-pills-messages-tab-nobd" data-toggle="pill" href="#v-pills-messages-nobd" role="tab" aria-controls="v-pills-messages-nobd" aria-selected="false">Nilai Kuis</a>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-home-nobd" role="tabpanel" aria-labelledby="v-pills-home-tab-nobd">
								<p>Untuk menjawab soal pertanyaan diberika 2 opsi yaitu <b>Jawab Langsung</b> dan <b>Upload File</b>.</p>

								<div class="card-sub mt-3">
									<p class=""><i class="fas fa-pen"></i> Jawab Langsung</span>
										<br>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, labore, cum. Reiciendis sunt, dicta, nisi id est quod velit earum quis, quia, distinctio doloribus. Provident blanditiis cum, quam illo eos.</p>

								</div>

								<div class="card-sub mt-3">
									<p class=""><i class="fas fa-upload"></i> Upload File</span>
										<br>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, labore, cum. Reiciendis sunt, dicta, nisi id est quod velit earum quis, quia, distinctio doloribus. Provident blanditiis cum, quam illo eos.</p>

								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-profile-nobd" role="tabpanel" aria-labelledby="v-pills-profile-tab-nobd">

								<div class="card-sub">
									<p>Saat kuis diberikan oleh dosen, kuis mempunyai batas waktu dalam pengerjaan soal yang ditentukan oleh dosen.</p>
									<div class="text-center">
										<div class="title"><h1 style="font-size: 40px" class="fw-bold text-muted">07:11:11</h1></div>
										<div>Waktu tersisa</div>
									</div>
								</div>

								<div class="card-sub mt-3">
									<p class="text-danger">Jika batas waktu telah habis, Anda tidak dapat menjawab pertanyaan ataupun merubah jawaban pertanyaan!</p>
									<div class="text-center">
										<div class="title"><h1 style="font-size: 40px" class="fw-bold text-danger">00:00:00</h1></div>
										<div class="text-danger">Waktu habis</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-messages-nobd" role="tabpanel" aria-labelledby="v-pills-messages-tab-nobd">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptatem, tempora. Perspiciatis porro sunt, aperiam incidunt dolorem, nostrum suscipit mollitia omnis iste provident non ad quia, nobis in delectus sint?</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis tenetur natus itaque sequi earum illum repudiandae expedita. Aperiam alias nihil quasi vitae, mollitia, quidem fugiat voluptate accusantium a ratione ipsum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis tenetur natus itaque sequi earum illum repudiandae expedita. Aperiam alias nihil quasi vitae, mollitia, quidem fugiat voluptate accusantium a ratione ipsum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis tenetur natus itaque sequi earum illum repudiandae expedita. Aperiam alias nihil quasi vitae, mollitia, quidem fugiat voluptate accusantium a ratione ipsum.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection




