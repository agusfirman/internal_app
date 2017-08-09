<?php 
session_start();
include_once "../../include/koneksi.php";
$username = $_SESSION['username'];
$id_resume_medis = $_POST[id];
$query= $mysqli->query("SELECT status FROM trace_resume_medis where id_resume_medis='$id_resume_medis' ");
$cek  = mysqli_num_rows($query); 
$data_resume = $query->fetch_array(); 
 ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
             <form id="f_resumedetail" class="form-horizontal" action="" method="post">
            <div class="id_resume_medis" data-id="<?php echo $id_resume_medis; ?>"></div> 
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default <?php if($data_resume[status]=='open'){echo 'active';}  ?>">
                        <input name="status" value="open" type="radio" >Open
                    </label>
                    <label class="btn btn-default <?php if($data_resume[status]=='process'){echo 'active';}  ?>">
                        <input name="status" value="process" type="radio" >Process
                    </label>
                    <label class="btn btn-default <?php if($data_resume[status]=='ready'){echo 'active';}  ?>">
                        <input name="status" value="ready" type="radio">Ready
                    </label>
                    <label class="btn btn-default <?php if($data_resume[status]=='done'){echo 'active';}  ?>">
                        <input name="status" value="done"  type="radio">Done
                    </label>
                    <label class="btn btn-default <?php if($data_resume[status]=='close'){echo 'active';}  ?>">
                        <input name="status" value="close"  type="radio">Close
                    </label>
                </div>  
            </form>
        </div>
    </div>  
</div>