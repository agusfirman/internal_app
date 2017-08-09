<?php 
session_start();
include_once "../../include/koneksi.php";

$username = $_SESSION['username'];
$id_task = $_POST[id_task];
$query= $mysqli->query("SELECT * FROM task where id_task='$id_task' ");
$cek  = mysqli_num_rows($query); 
$data_task = $query->fetch_array(); 
 ?>

<div class="container">
    <div class="row">
    <form id="f_taskdetail" class="form-horizontal" action="" method="post">
    <div class="id_task" data-id="<?php echo $id_task; ?>"></div> 
        <div class="form-group">
            <div class="col-sm-3">
                <textarea name="solv" class="form-control input-sm solv" cols="30" rows="3">
                 <?php echo $data_task[solv]; ?> 
                </textarea>
            </div>
        </div>
        <div class="btn-group col-sm-3" data-toggle="buttons">
            <label class="btn btn-default <?php if($data_task[st_task]=='open'){echo 'active';}  ?>">
                <input name="status" value="open" type="radio" >Open
            </label>
            <label class="btn btn-default <?php if($data_task[st_task]=='process'){echo 'active';}  ?>">
                <input name="status" value="process" type="radio">Process
            </label>
            <label class="btn btn-default <?php if($data_task[st_task]=='done'){echo 'active';}  ?>">
                <input name="status" value="done"  type="radio">Done
            </label>
            <label class="btn btn-default <?php if($data_task[st_task]=='close'){echo 'active';}  ?>">
                <input name="status" value="close"  type="radio">Close
            </label>
        </div>  
    </form>
    </div>  
</div>