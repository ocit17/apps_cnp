<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <!-- <form method="post" id="import_form_sc" enctype="multipart/form-data">
                  <p><label>Select Excel File</label>
                  <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
                
                  <input type="submit" name="import" value="Import" class="btn btn-info" />
              </form>
              </br> -->
              <table id="mhs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Interviewer</th>
                  <th>Jurusan</th>
                  <th>Nilai Screening</th>
                  <th>Cetak Nilai</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach($screening->result_array() as $sc):
                    $nim          = isset($sc['nim']) ? $sc['nim'] : '-' ;
                    $nama         = isset($sc['nama']) ? $sc['nama'] : '-' ;
                    $interviewer  = isset($sc['interviewer']) ? $sc['interviewer'] : '-' ;
                    $nm_jurusan   = isset($sc['nm_jurusan']) ? $sc['nm_jurusan'] : '-' ;
                    $nilai        = isset($sc['nilai']) ? $sc['nilai'] : '-' ;
                  ?>
                <tr>
                  <td><?php echo $nim;?></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $interviewer;?></td>
                  <td><?php echo $nm_jurusan;?></td>
                  <td><?php echo $nilai;?></td>
                  <td><a target="_blank" href="<?php echo base_url().'belakang/contoh/'.$nim; ?>" class="button button-primary">Cetak Screening</a></td>
                </tr>
                <?php endforeach;?>
                </tbody>          
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>