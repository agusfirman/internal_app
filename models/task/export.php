<?php
include_once "../../include/koneksi.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=task.xls");
?>
<table style="font-size: 10px">
     <thead>
     <tr>
        <th>No</th>
        <th>Subject</th>
        <th>Kategori</th>
        <th>Spesifikasi</th>
        <th>User Create</th>
        <th>Users Finish</th>
        <th>Users Claims</th>
        <th>Users Dept</th>
        <th>Description</th>
        <th>Tgl</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $query=$mysql->query("SELECT
                          task.*,
                          task_cat.nama_task_cat,
                          sub_task_cat.nama_sub_cat
                          FROM task
                          INNER JOIN task_cat ON task.task_cat = task_cat.id_task_cat
                          INNER JOIN sub_task_cat ON task.task_desc = sub_task_cat.id_sub_cat");
      $cek=mysqli_num_rows($query);
      $no = 1;
      while($data   = $query->fetch_array()){
        echo"<tr>
              <td>$no</td>
              <td>$data[subject]</td>
              <td> $data[nama_task_cat]</td>
              <td> $data[nama_sub_cat]</td>
              <td> $data[users_create]</td>
              <td> $data[users_finished]</td>
              <td> $data[users_claims]</td>
              <td> $data[users_dept]</td>
              <td> $data[ket]</td>
              <td> $data[tgl_post]</td>
              <td> $data[st_task]</td>
            </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
