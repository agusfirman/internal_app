<h3 class="box-title">Data List Kategori </h3>
    </div><!-- /.box-header -->
    <div class="box-body">
  <table id="" class="table table-bordered table-striped datatable">
     <thead>
     <tr class="bg-orange">
        <th>No</th>
        <th>ID </th>
        <th>Nama Kategori</th>
        <th width="5%">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $query=$mysqli->query("select * from task_cat ");
      $cek=mysqli_num_rows($query);
      $no = 1;
      while($data   = $query->fetch_array()){
        echo"<tr>
          <td>$no</td>
          <td>$data[id_task_cat]</a></td>
          <td> $data[nama_task_cat]</td>
          <td>  
            <a href='#' onclick='' class='e_cat_task' data-id='$data[id_task_cat]'>
              <i class='fa fa-pencil-square-o'></i>
            </a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
  <button class='btn btn-warning btn-sm btn-flat t_cat_task' data-id='0'>Tambah Kategori Task</button>
  <br/>
</div>