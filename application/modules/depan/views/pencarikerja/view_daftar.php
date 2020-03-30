<div class="gallery agile" style="margin-top:20px">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading" style="text-align:center;padding:15px 15px 15px 15px;"><h3>PENDAFTARAN KANDIDAT</h3></div>			
				<div class="panel-body">
					<div class="row" id="daftar">
						<form data-toggle="validator" id="form_daftar" enctype="multipart/form-data" method="POST">							
							<div class="form-group has-feedback col-md-2 col-sm-2 col-sm-offset-5">
								<div align="center">
									<div id="image_preview">
										<img id="previewing" src="<?php echo base_url()?>assets/depan/images/nologo.png" width="100px"/>
									</div>
									<br/>
									<div class="form-group">										
										<span class="btn btn-primary btn btn-block btn-file">
										    <i class="fa fa-file"></i>&nbsp;UPLOAD FOTOMU <input type="file" id="foto" style="position: absolute;top: 0;right: 0;min-width: 100%;min-height: 100%;font-size: 100px;text-align: right;filter: alpha(opacity=0);opacity: 0;outline: none;cursor: inherit;display: block;" name="foto" />
										</span>
										<sub style="color: red">JPG ukuran foto max 1mb</sub>
									</div>

								</div>									
							</div>
							<div class="form-group col-md-12 col-sm-12">								
								<div class="form-group has-feedback col-md-6 col-sm-6">
									<label>NIM *</label>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <input type="text" name="nim" class="form-control pull-right nim" data-error="Data ini diperlukan !!" required />
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
								<div class="form-group has-feedback col-md-6 col-sm-6">	
									<label>Nama Lengkap *</label>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <input type="text" name="nama_lengkap" class="form-control pull-right nama_lengkap" data-error="Data ini diperlukan !" required />
										<input type="hidden" name="nama_mhs"/>
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
								
								<div class="form-group has-feedback col-md-6 col-sm-6">
									<label>Email *</label>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <input type="email" name="email" class="form-control pull-right email" data-error="Data ini diperlukan !!" required />
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
								<div class="form-group has-feedback col-md-6 col-sm-6">	
									<label>Kata Sandi *</label>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <input id="password" type="password" name="sandi" class="form-control pull-right password" data-error="Data ini diperlukan !" required />
									  <div id="password-strength-status"></div>
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
								<div class="form-group has-feedback col-md-6 col-sm-6">
									<label>Prograam Studi *</label>
									<div class="input-group">
									  	<div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  	<select name="prodi" class="form-control pull-righ prodi" data-error="Prodi dibutuhkan !" required >
											<option value="">-PILIH-</option>
												<?php foreach($data->result() as $row):?>
													<option value="<?php echo $row->id;?>"><?php echo $row->nama_prodi;?></option>
												<?php endforeach;?>	
											</select>
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
								<div class="form-group has-feedback col-md-6 col-sm-6">	
									<label>Konfirmasi Kata Sandi *</label>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <input type="password" id="konfirm" name="konfirm" class="form-control pull-right konfirm" data-error="Data ini diperlukan !" required />
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
							</div>
							<div class="form-group col-md-12 col-sm-12">																								
								<div class="form-group has-feedback col-md-6 col-sm-6">
									<label>Konsentrasi *</label>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <select name="jurusan" class="form-control pull-righ jurusan" data-error="Jurusan dibutuhkan !" required >
											<option value="">-PILIH-</option>
					                  </select>
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
								<div class="form-group has-feedback col-md-6 col-sm-6">	
									<label>File Pendukung *</label> <sub style="color: red">PDF ukuran file max 1mb</sub>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <input type="file" id="file_pendukung" name="file_pendukung" class="form-control pull-right file_pendukung" data-error="Data ini diperlukan !" required />
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					        </div>
								</div>
								<div class="form-group has-feedback col-md-6 col-sm-6">	
									<label>No Telp *</label>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <input type="text" name="telp" class="form-control pull-right telp" data-error="Data ini diperlukan !" required />
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
								<div class="form-group has-feedback col-md-6 col-sm-6">	
									<label>CV *</label> <sub style="color: red">PDF ukuran file max 1mb</sub>
									<div class="input-group">
									  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
									  <input type="file" id="cv" name="cv" class="form-control pull-right cv" data-error="Data ini diperlukan !" required />
									</div>
									<div class="form-group has-error">
										<span class="help-block with-errors"></span>
					                </div>
								</div>
							</div>
							
							<div class="col-xs-12" style="text-align: center;">
								<button type="submit" class="btn btn-block simpan_daftar btn-primary"><i class="fa fa-save"></i>&nbsp;Daftar</button>
							</div>
						</form>
					</div>
				</div>								
			</div>
		</div>
	</div>
</div>