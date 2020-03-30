<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
            <form method="post" id="import_form" enctype="multipart/form-data">
                <p><label>Select Excel File</label>
                <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
               
                <input type="submit" name="import" value="Import" class="btn btn-info" />
            </form>
            </br>
              <table id="mhs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>NAMA</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach($mhs->result_array() as $i):

                        $nim= isset($i['nim']) ? $i['nim'] : '-' ;
                        $nama= isset($i['nama']) ? $i['nama'] : '-' ;
                  ?>
                <tr>
                    <td><?php echo $nim;?> </td>
                    <td><?php echo $nama;?> </td>
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