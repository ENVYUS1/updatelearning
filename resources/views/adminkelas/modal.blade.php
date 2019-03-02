<div class="modal" id="modal-join" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<div class="card-title" id="title_grupkelas">Tambah Mahasiswa</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-join" class="validation">
				<input type="hidden" name="aksi1">
				<div class="modal-body">
					<div class="card-body">
						<input type="hidden" name="id_kelas">
						<div class="form-group form-show-validation row" id="status">
							<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Mahasiswa<span class="required-label">*</span></label>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<select id="multiple" name="id_user[]" class="form-control" multiple="multiple" style="width: 100%;">
									@foreach($mahasiswa as $mhs)
									<option  value="{{$mhs->id}}">{{$mhs->name}} ({{$mhs->pengguna->no_induk}})</option>
									@endforeach
								</select>
							</div>
						</div>
						<br>
					</div>
					<div class="modal-footer no-bd">
						<button type="button" class="btn" data-dismiss="modal">Batal</button>
						<button class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

