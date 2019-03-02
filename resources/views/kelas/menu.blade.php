<div class="page-aside bg-grey1">
	<div class="aside-header">
		<a href="../../kelas" class="text-danger"><i class="flaticon-left-arrow-3"></i> KEMBALI</a>
		<br><br>
		<div class="title">{{$kelas->KelasMatkul->nama_matkul}}</div>
		<a class="btn btn-primary toggle-email-nav" data-toggle="collapse" href="#email-app-nav" role="button" aria-expanded="false" aria-controls="email-nav">
			<span class="btn-label">
				<i class="icon-menu"></i>
			</span>
			Menu 
		</a>
	</div>
	 
	<div class="aside-nav collapse" id="email-app-nav">
		<ul class="nav">
			<li class="{{Request::url() == 'kelas/informasi' ? 'active':''}}">
				<a href="/kelas/{{$id}}/informasi">
					<i class="flaticon-chat-2 ml-2"></i> <b>INFORMASI</b>
					<span class="badge badge-danger float-right">2</span>
				</a>
			</li>
			<li class="{{Request::url() == 'kelas/materi/'.$id ? 'active':''}}">
				<a href="/kelas/{{$id}}/materi">
					<i class="flaticon-agenda ml-2"></i> <b>MATERI</b>
					<span class="badge badge-primary float-right">{{$materi}}</span>
				</a>
			</li>
			<li class="{{Request::url() == 'kelas/kuis/'.$id ? 'active':''}}">
				<a href="/kelas/{{$id}}/kuis">
					<i class="flaticon-stopwatch ml-2"></i> <b>KUIS</b>
					<span class="badge badge-primary float-right">{{$kuiz}}</span>
				</a>
			</li>
			<li class="{{Request::url() == 'kelas/mahasiswa'.$id ? 'active':''}}">
				<a href="/kelas/{{$id}}/mahasiswa">
					<i class="flaticon-users ml-2"></i> <b>MAHASISWA</b>
					<span class="badge badge-primary float-right">{{$pengguna}}</span>
				</a>
			</li>
			<li class="{{Request::url() == 'http://127.0.0.1:8000/kelas/tentang' ? 'active':''}}">
				<a href="/kelas/{{$id}}/tentang">
					<i class="flaticon-exclamation ml-2"></i> <b>TENTANG</b>
				</a>
			</li>
			<li class="{{Request::url() == 'http://127.0.0.1:8000/kelas/pengaturan' ? 'active':''}}">
				<a href="/kelas/{{$id}}/pengaturan">
					<i class="flaticon-settings ml-2"></i> <b>PENGATURAN</b>
				</a>
			</li>
		</ul>
	</div>
</div>