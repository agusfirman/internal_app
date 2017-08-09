<?php
session_start();
include_once "../../include/koneksi.php";

$username = $_SESSION['username'];
$id_task = $_POST['id_task'];
$query= $mysqli->query("SELECT solv FROM task where id_task='$id_task' ");
$cek  = mysqli_num_rows($query);
$data_solv = $query->fetch_array();
 ?>

<div class="container">
    <div class="row">
    <form id="f_solv" class="form-horizontal" action="" method="post">
    <input type="hidden" name="id_task" value="<?php echo $id_task; ?>">
        <div class="form-group">
            <div class="col-sm-3">
                <textarea name="solv" class="form-control input-sm solv" cols="30" rows="3">
                 <?php echo $data_solv['solv']; ?>
                </textarea>
            </div>
        </div>
    </form>
    </div>
</div>
