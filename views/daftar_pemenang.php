<?php 
$cek_data = mysqli_num_rows($mysqli->query("select * from win_doorprize"));
if($cek_data){
  ?>
<h4>Daftar Pemenang</h4>
         <hr/>
         <marquee behavior="scroll" direction="up" height="20%" >
          <table class="table table-hover">
             <tr>
                 <th>NO Undian</th>
                 <th>Nama</th>
             </tr>
             <tr>
                 <tbody>
                <?php 
                  $query=$mysqli->query("select doorprize.nama,win_doorprize.no_win
                                      from doorprize inner join win_doorprize
                                      on doorprize.id = win_doorprize.id_door order by doorprize.id asc");
                  while($data = $query->fetch_array()){
                    echo"<tr>
                      <td> $data[no_win]</td>
                      <td>$data[nama]</td>
                    </tr>";
                    $no++;
                  }
                  ?>
                </tbody>
             </tr>
         </table>
        </marquee>
  <?php 
  }
 ?>