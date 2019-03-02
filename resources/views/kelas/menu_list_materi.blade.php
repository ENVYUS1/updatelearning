<div class="page-aside bg-grey1">
	<div class="aside-header">
		<a href="../../kelas/materi" class="text-danger"><i class="flaticon-left-arrow-3"></i> KEMBALI</a>
		<br><br>
		<div class="title">PERTEMUAN KE - {{$id}} </div>
		<a class="btn btn-primary toggle-email-nav" data-toggle="collapse" href="#email-app-nav" role="button" aria-expanded="false" aria-controls="email-nav">
			<span class="btn-label">
				<i class="icon-menu"></i>
			</span>
			Menu
		</a>
	</div>
	<div class="aside-nav collapse" id="email-app-nav">
		<ul class="nav">
			@for($i = 1; $i < 6; $i++)
			<li class="{{ Request::segment(4) == $i ? 'active':''}}">
				<a href="/{{ Request::segment(1) }}/{{ Request::segment(2) }}/{{ Request::segment(3) }}/{{$i}}">
					<i class="flaticon-file ml-2"></i> <b>BAB {{$i}}</b>
				</a>
			</li>
			@endfor
		</ul>
	</div>
</div>