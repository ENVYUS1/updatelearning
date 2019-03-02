<div class="user">
	<div class="avatar-sm float-left mr-2">
		@if(isset(Auth::user()->color))
		<span class="avatar-title {{Auth::user()->color}} rounded-circle border border-white"><i class="fas text-white fa-user-alt"></i></span>	
		@endif	

	</div>

	<div class="info">
		<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
			<span>
				{{Auth::user()->pengguna->nama}}
				<span class="user-level">{{Auth::user()->role->role->name}}</span>
				<span class="caret"></span>
			</span>
		</a>
		<div class="clearfix"></div>

		<div class="collapse in" id="collapseExample">
			<ul class="nav">
				<li>
					<a href="#profile">
						<span class="link-collapse">Profil</span>
					</a>
				</li>
				<li>
					<a href="#edit">
						<span class="link-collapse">Edit Profil</span>
					</a>
				</li>
				<!-- <li>
					<a href="#settings">
						<span class="link-collapse">Pengaturan</span>
					</a>
				</li> -->
			</ul>
		</div>
	</div>
</div>
<ul class="nav nav-primary">
	<li class="nav-item">
		<a href="invoice.html">
			<i class="fas fa-home"></i>
			<p>Dashboard</p>
		</a>
	</li>
	<li class="nav-section">
		<span class="sidebar-mini-icon">
			<i class="fa fa-ellipsis-h"></i>
		</span>
		<h4 class="text-section">Menu</h4>
	</li>
	<li class="nav-item {{ Request::segment(1) == 'jurusan' || Request::segment(1) == 'matkul' || Request::segment(1) == 'quote' ? 'active submenu':''}}">
		<a data-toggle="collapse" href="#custompages">
			<i class="fas fa-database"></i>
			<p>Referensi</p>
			<span class="caret"></span>
		</a>
		<div class="collapse {{ Request::segment(1) == 'jurusan' || Request::segment(1) == 'matkul' || Request::segment(1) == 'quote' ? 'show':''}}" id="custompages">
			<ul class="nav nav-collapse">
				<li class="{{ Request::segment(1) == 'jurusan' ? 'active':''}}">
					<a href="{{url('/jurusan')}}">
						<span class="sub-item">Jurusan</span>
					</a>
				</li>
		
				<li class="{{ Request::segment(1) == 'matkul' ? 'active':''}}">
					<a href="{{url('/matkul')}} ">
						<span class="sub-item">Mata Kuliah</span>
					</a>
				</li>
				<li class="{{ Request::segment(1) == 'quote' ? 'active':''}}">
					<a href="{{url('/quote')}}">
						<span class="sub-item">Quote</span>
					</a>
				</li>
				<li class="{{ Request::segment(1) == 'role' ? 'active':''}}">
					<a href=" {{url('/role')}} ">
						<span class="sub-item">Role</span>
					</a>
				</li>
			</ul>
		</div>
	</li>
	<li class="nav-item {{ Request::segment(1) == 'kelas' ? 'active':''}}">
		<a href="{{url('/kelas')}}">
			<i class="fas fa-pencil-ruler"></i>
			<p>Kelas</p>
		</a>
	</li>

	<li class="nav-item {{ Request::segment(1) == 'file_manager' ? 'active':''}}">
		<a href="/file_manager">
			<i class="fas fa-folder-open"></i>
			<p>File Manager</p>
		</a>
	</li>
	<li class="nav-item">
		<a data-toggle="collapse" href="#submenu">
			<i class="fas fa-users"></i>
			<p>User</p>
			<span class="caret"></span>
		</a>
		<div class="collapse" id="submenu">
			<ul class="nav nav-collapse">
				<li>
					<a href="{{url('/pengguna')}}">
						<span class="sub-item">Pengguna</span>
					</a>
				</li>
				<li>
					<a href=" {{url('/mahasiswa')}}">
						<span class="sub-item">Mahasiswa</span>
					</a>
				</li>
			</ul>
		</div>
	</li>
	<li class="nav-item">
		<a data-toggle="collapse" href="#Sampah">
			<i class="fas fa-trash-alt"></i>
			<p>Sampah</p>
			<span class="caret"></span>
		</a>
		<div class="collapse" id="Sampah">
			<ul class="nav nav-collapse">
				<li>
					<a href="/pengguna">
						<span class="sub-item">Pengguna</span>
					</a>
				</li>
				<li>
					<a href="/mahasiswa">
						<span class="sub-item">Mahasiswa</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="sub-item">Kelas</span>
					</a>
				</li>

				<li>
					<a href="#">
						<span class="sub-item">Grup Kelas</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="sub-item">Materi</span>
					</a>
				</li>

				<li>
					<a href="#">
						<span class="sub-item">Kuis</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="sub-item">Lainnya</span>
					</a>
				</li>
			</ul>
		</div>
	</li>
</ul>



