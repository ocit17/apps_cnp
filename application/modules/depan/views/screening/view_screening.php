<div class="box box-primary">
    <div class="box-body">
        <div class="soal prolog">
            <div class="box-header" style="text-align: center;">
                <img src="<?php echo base_url()?>assets/depan/images/logolp3i.png" class="user-image" alt="User Image"></br>
                <h2 class="box-title text-light-blue" style="font-size: 35px;margin-top:20px;font-weight: bold;">Selamat Datang Di Screening Tes Online</h2>                
            </div>     
        </div></br>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Aspek Umum</h3>
                    </div>
                        <div class="box-body">
                            <table>
                                <?php              
                                    $urut = 1;
                                    $no = 1;
                                    $jawaban = array("Baik","Cukup","Kurang");  
                                    foreach($kategori_aspek->result_array() as $i):
                                    $id = isset($i['id']) ? $i['id'] : '-' ;
                                    $aspek = isset($i['uraian']) ? $i['uraian'] : '-' ;
                                    $kode_umum = isset($i['kode_umum']) ? $i['kode_umum'] : '-' ;
                                ?> 
                                <tr>
                                    <td><?php echo $urut.". ".$aspek;?></td>
                                </tr>
                                <?php
                                    for ($j=0; $j<sizeof($jawaban);$j++) {
                                        $kecil_jawaban = strtolower($jawaban[$j]);
                                        echo '<tr class="cek_umum" id="1"><td width="3%"><input type="radio" id="'.$kode_umum.':'.$jawaban[$j].'" name="umum_'.$no.'" value="'.$jawaban[$j].'">&nbsp;'.$jawaban[$j].'</td></tr>';                
                                    }
                                    $no++;
                                ?>
                                <?php $urut++; endforeach;?>                   
                            </table>  
                        </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Aspek Keahlian</h3>
                    </div>
                        <div class="box-body">
                            <table>
                                <?php              
                                    $no = 1;
                                    $jawaban = array("Baik","Cukup","Kurang");  
                                    foreach($aspek_keahlian->result_array() as $i):
                                    $id= isset($i['id']) ? $i['id'] : '-' ;
                                    $aspek = isset($i['uraian']) ? $i['uraian'] : '-' ;
                                    $kode_keahlian = isset($i['kode_keahlian']) ? $i['kode_keahlian'] : '-' ;
                                ?> 
                                <tr>                         
                                    <td><?php echo $urut.". ".$aspek;?></td>
                                </tr>
                                <?php
                                    for ($j=0; $j<sizeof($jawaban);$j++) {
                                        $kecil_jawaban = strtolower($jawaban[$j]);
                                        echo '<tr class="cek_keahlian" id="2"><td width="3%"><input type="radio" id="'.$kode_keahlian.':'.$jawaban[$j].'" name="keahlian_'.$no.'" value="'.$jawaban[$j].'">&nbsp;'.$jawaban[$j].'</td></tr>';                
                                    }
                                    $no++;
                                ?>
                                <?php $urut++; endforeach;?>                   
                            </table>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pertanyaan Umum</h3>
                    </div>
                        <div class="box-body">
                            <table>
                                <?php              
                                    $no = 1; 
                                    foreach($p_umum->result_array() as $i):
                                    $id= isset($i['id']) ? $i['id'] : '-' ;
                                    $pertanyaan= isset($i['pertanyaan']) ? $i['pertanyaan'] : '-' ;
                                ?> 
                                <tr>    
                                    <td><?php echo $urut.". ".$pertanyaan;?></td>                                                           
                                </tr>                            
                                <tr data-id="<?php echo $i['kdpu'];?>">
                                    <td><input class="form-control pumum" rows="2" type="text" name="umum_<?php echo $no;?>" placeholder="Isi disini ..."></td>
                                </tr>
                                <?php $urut++; $no++; endforeach;?>                   
                            </table>
                        </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pertanyaan Keahlian</h3>
                    </div>
                        <div class="box-body">
                            <table>
                                <?php              
                                    $no = 1; 
                                    foreach($p_jurusan->result_array() as $i):
                                    $id= isset($i['id']) ? $i['id'] : '-' ;
                                    $j_pertanyaan= isset($i['j_pertanyaan']) ? $i['j_pertanyaan'] : '-' ;
                                ?> 
                                <tr>
                                    <td><?php echo $urut.". ".$j_pertanyaan;?></td>                                                                
                                </tr>                            
                                <tr data-id="<?php echo $i['kd_pjurusan'];?>">
                                    <td><input class="form-control pjurusan" rows="2" type="text" name="jurusan_<?php echo $no;?>" placeholder="Isi disini ..."></td>
                                </tr>
                                <?php $urut++; $no++; endforeach;?>                   
                            </table>
                        </div>
                </div>
            </div>
        </div>
        <div class="box-body">        
            <button class="btn btn-block btn-primary pull-right" id="savechecklist">Simpan</button>
        </div>

    </div>
</div>