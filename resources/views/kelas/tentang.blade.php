@extends('layout.layout')
@section('content')

<div class="page-inner page-inner-fill">
	<div class="page-with-aside mail-wrapper bg-white">

		@include('kelas.menu')

		<div class="page-content mail-content bg-white">
			<div class="inbox-head  d-block">
				<h3>{{$kelas->KelasMatkul->nama_matkul}}</h3>
				<br>
				<p>{{$kelas->KelasMatkul->keterangan}}</p>
			

				<div class="card-list">
					<div class="item-list">
						<div class="avatar">
							<span class="avatar-title rounded-circle border border-white"><i class="flaticon-user"></i></span>
						</div>
						<div class="info-user ml-3">
							<div class="username fw-bold">DOSEN</div>
							<div class="status">{{$kelas->KelasUser->pengguna->nama}}</div>
						</div>
					</div>
					<div class="item-list">
						<div class="avatar">
							<span class="avatar-title rounded-circle border border-white"><i class="flaticon-agenda"></i></span>
						</div>
						<div class="info-user ml-3">
							<div class="username fw-bold">MATERI</div>
							<div class="status">{{$materi}} </div>
						</div>
					</div>
					<div class="item-list">
						<div class="avatar">
							<span class="avatar-title rounded-circle border border-white"><i class="flaticon-stopwatch"></i></span>
						</div>
						<div class="info-user ml-3">
							<div class="username fw-bold">KUIS</div>
							<div class="status">{{$kuiz}}</div>
						</div>
					</div>
					<div class="item-list">
						<div class="avatar">
							<span class="avatar-title rounded-circle border border-white"><i class="flaticon-users"></i></span>
						</div>
						<div class="info-user ml-3">
							<div class="username fw-bold">MAHASISWA</div>
							<div class="status">{{$pengguna}}</div>
						</div>
					</div>
					<div class="item-list">
						<div class="avatar">
							<span class="avatar-title rounded-circle border border-white"><i class="flaticon-desk"></i></span>
						</div>
						<div class="info-user ml-3">
							<div class="username fw-bold">KELAS</div>
							<div class="status">{{$masuk}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection