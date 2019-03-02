<div class="page-aside bg-grey1">
	<div class="aside-header">
		<a href="../../kelas" class="text-danger"><i class="flaticon-left-arrow-3"></i> KEMBALI</a>
		<br><br>
		<div class="title">File Manager</div>
		<a class="btn btn-primary toggle-email-nav" data-toggle="collapse" href="#email-app-nav" role="button" aria-expanded="false" aria-controls="email-nav">
			<span class="btn-label">
				<i class="icon-menu"></i>
			</span>
			Menu 
		</a>
	</div>
	<div class="aside-nav collapse" id="email-app-nav">
		<ul class="nav">
			<li class="{{Request::url() == 'http://127.0.0.1:8000/kelas/informasi' ? 'active':''}}">
				<a href="/kelas/informasi">
					<i class="flaticon-folder ml-2"></i> <b>Materi Pelajaran</b>
					<span class="badge badge-primary float-right">10</span>
				</a>
			</li>
			<li class="{{Request::url() == 'http://127.0.0.1:8000/kelas/materi' ? 'active':''}}">
				<a href="/kelas/materi">
					<i class="flaticon-folder ml-2"></i> <b>Soal Kuis</b>
					<span class="badge badge-primary float-right">10</span>
				</a>
			</li>
		</ul>
	</div>
</div>