<h3 class="box-title">Data List E-Filling</h3>
    <div class="box-body">
    <table class="table datatable">
       <thead>
            <tr class="bg-orange">
                    <th>No</th>
                    <th>Nama Departemen</th>
                    <th>Aksi</th>
                </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $query = $mysqli->query("select * from m_departemen ");
                while ($data = $query->fetch_array()){
                $id_departemen= $data[id_departemen];
                $nama_departemen= $data[nama_departemen];
               echo"<tr>
                        <td>$no</td>
                        <td>$nama_departemen</td>
                        <td>
                           <a href='#' onclick='' class='e_filling' data-id='$id_departemen'>
                              <i class='fa fa-pencil-square-o'></i>
                            </a>|
                            <a href='javascript:hapus(\"{$data[id_departemen]}\")'  class='text-danger'> 
                              <i class='fa fa-remove'></i>
                            </a>
                        </td>
                    </tr>";
                
                $no++;
                }   
                ?>
        </tbody>
    </table>
      <button class="btn btn-warning btn-sm t_filling btn-flat" data-id="0">Tambah Data</button>
      <button class="btn btn-warning btn-sm t_ufilling btn-flat" data-id="0">Tambah U Filling</button>
  <br/>
</div><!-- /.box -->


<div class="modal fade" id="m_filling" role="dialog">
    <div class="modal-dialog modal-sg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center"></h4>
        </div>
        <div class="modal-body" >

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_simpan_filling">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Tambah File-->
<div class="modal fade" id="u_filling" role="dialog">
    <div class="modal-dialog modal-sg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title text-center"></h4>
        </div>
        <div class="modal-body" >
        </div>
        <div class="modal-footer">
          <input type="file" class="" name="gambar" >
          <button type="submit" class="btn btn-success btn-sm btn-flat" id="b_usimpan_filling">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="controllers/filling/aplikasi.js"></script>