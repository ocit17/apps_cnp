<div class="box box-primary">
    <div class="box-body">
        <div class="box-header">
            <div class="login-box">
                <div class="login-logo">
                    <img src="<?php echo base_url()?>assets/depan/images/logolp3i.png" width="100px"/><br>
                    <a href="#"><b>SCREENING </b>ONLINE</a>
                </div>
                <div class="login-box-body"> 
                    <div id="error"><!-- error will be shown here ! --></div>                
                    <form id="login_screening" data-toggle="validator" method="POST">                                             
                        <!-- <div class="form-group">
                            <div class="input-group">                                                          
                                <select name="jurusan" id="jurusan" class="form-control pull-left" data-error="Data Jurusan Harus Diisi !" required >
                                    <option value="">Pilih Jurusan</option>
                                    <?php
                                    foreach ($jurusan as $k)
                                    {
                                        echo "<option value='$k->kd_jurusan'>$k->nm_jurusan</option>";
                                    }
                                    ?>
                                </select>
                                <div class="input-group-addon bg-light-blue"><i class="fa fa-square"></i></div>
                            </div>
                            <div class="form-group has-error">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="input-group">                                                         
                                <select name="mhs" class="form-control pull-right" id="mhs" data-error="Data Mahasiswa Dibutuhkan !" required></select>
                                <div class="input-group-addon bg-light-blue"><i class="fa fa-users"></i></div>
                            </div>
                            <div class="form-group has-error">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">                                                         
                                <input name="nm_dosen" type="text" class="form-control" data-error="Masukan Nama Anda !" placeholder="Interviewer" required>
                                <div class="input-group-addon bg-light-blue"><i class="fa fa-user"></i></div>
                            </div>
                            <div class="form-group has-error">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-xs-4">
                                <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat login_screening"><i class="fa fa-sign-in"></i> Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>