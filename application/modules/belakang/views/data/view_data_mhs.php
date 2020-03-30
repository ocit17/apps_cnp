<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>NAMA</th>
                  <th>Email</th>
                  <th>Jurusan</th>
                  <th>CV</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach($mhs->result_array() as $i):

                        $nim= isset($i['nim']) ? $i['nim'] : '-' ;
                        $nama= isset($i['nama_mhs']) ? $i['nama_mhs'] : '-' ;
                        $email= isset($i['email']) ? $i['email'] : '-' ;
                        $jurusan= isset($i['nm_jurusan']) ? $i['nm_jurusan'] : '-' ;
                        $cv= isset($i['cv_mhs']) ? $i['cv_mhs'] : '-' ;
                  ?>
                <tr>
                    <td><?php echo $nim;?> </td>
                    <td><?php echo $nama;?> </td>
                    <td><?php echo $email;?> </td>
                    <td><?php echo $jurusan;?> </td>
                    <td><a href="<?php echo base_url().'belakang/download/'.$nim; ?>" class="button button-primary">Download CV</a></td>
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