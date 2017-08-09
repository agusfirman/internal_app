<section class="sidebar">
<!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo $pic; ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $username; ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form>
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" >
    <li class="header">MAIN NAVIGATION</li>
   <!-- SESSION MENU -->
   <?php 
      if($_SESSION[level]==1){
        $menu = "
          <li class='treeview' >
            <a href='#'>
            <i class='fa fa-dashboard'></i> <span>Master Data</span> <i class='fa fa-angle-left pull-right'></i>
            </a>
              <ul class='treeview-menu' >
                <li >
                  <a style='font-size:10px' href='index.php?page=". base64_encode('inventori_it')."&ID=".base64_encode('barang_it')."'><i class='fa fa-list'></i> Data Inventori IT</a>
                </li>
                <li >
                  <a style='font-size:10px' href='index.php?page=". base64_encode('users')."&ID=".base64_encode('daftar_users')."'><i class='fa fa-users'></i> Data Users</a>
                </li>
                <li>
                  <a style='font-size:10px' href='index.php?page=". base64_encode('dokter')." '><i class='fa fa-user'></i> Data Dokter</a>
                </li>
                <li><a style='font-size:10px' href='index.php?page=". base64_encode('kamar')." '><i class='fa fa-list'></i> Data Kamar</a></li>
                <li><a style='font-size:10px' href='index.php?page=". base64_encode('task')."&ID=".base64_encode('cat_task')."'><i class='fa fa-list'></i> Data Tugas</a></li>
                <li><a style='font-size:10px' href='index.php?page=". base64_encode('doorprice')."'><i class='fa fa-list'></i> Hadiah Doorprice</a></li>
              </ul>
          </li>
          <li class=''>
              <li class=''>
              <a href='index.php?page=". base64_encode('ams')." '>
              <i class='fa fa-list'></i><span> Asset Management System</span></a></li>
          </li>
          <li class=''>
              <li class=''>
              <a href='index.php?page=". base64_encode('setoran_bank')."&form=". base64_encode('form-bca')." '>
              <i class='fa fa-hospital-o'></i><span>Setoran Bank</span></a></li>
          </li>
          <li>
            <li class=''>
              <a href='index.php?page=". base64_encode('mytask')."&ID=".base64_encode('mytask')."'>
              <i class='fa fa-list'></i><span> MyTask</span></a>
            </li>
          </li>
                    
           <li class=''>
              <li class=''>
              <a href='index.php?page=". base64_encode('kamar-view')."&cat=".base64_encode('K001')." ' target='blank'>
              <i class='fa fa-hospital-o'></i><span>Rooms </span></a></li>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('form-pfb')." '>
              <i class='fa fa-users'></i> <span>Form Photo Bayi</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('e-filling')."&ID=".base64_encode('departement')." '>
              <i class='fa fa-list'></i> <span>E-Filling</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('users-teramedik')." '>
              <i class='fa fa-users'></i> <span>Users Teramedik</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('sms-blast')." '>
              <i class='fa fa-list'></i> <span>SMS Blast</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
              <i class='fa fa-list'></i> <span>E Form</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('buku-tamu')." '>
              <i class='fa fa-list'></i> <span>Buku Tamu</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('resume-medis')." '>
              <i class='fa fa-list'></i> <span>Resume Medis</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('undian-doorprice')."' target='blank'>
              <i class='fa fa-list'></i> <span>Undian Doorprice</span>
            </a>
          </li>"; 
      }else if($_SESSION[level]==2){
          $menu = "
                  <li class=''>
                      <li class=''>
                      <a href='index.php?page=". base64_encode('setoran_bank')."&form=". base64_encode('form-bca')." '>
                      <i class='fa fa-hospital-o'></i> Setoran Bank</a></li>
                  </li>
                  <li>
                    <a href='index.php?page=".base64_encode('dokter')." '>
                      <i class='fa fa-users'></i> <span>Master Data</span>
                    </a>
                  </li><li>
            <a href='index.php?page=".base64_encode('sms-blast')." '>
              <i class='fa fa-list'></i> <span>SMS Blast</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
              <i class='fa fa-list'></i> <span>Disposisi</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('resume-medis')." '>
              <i class='fa fa-list'></i> <span>Resume Medis</span>
            </a>
          </li>";
      }else if($_SESSION[level]==3){
          $menu = "
                    <li>
                      <a href='index.php?page=".base64_encode('form-pfb')." '>
                        <i class='fa fa-users'></i> <span>Form Photo Bayi</span>
                      </a>
                    </li>
                    <li>
                      <a href='index.php?page=".base64_encode('users-teramedik')." '>
                        <i class='fa fa-users'></i> <span>Users Teramedik</span>
                      </a>
                    </li>
                    <li>
                      <a href='index.php?page=".base64_encode('sms-blast')." '>
                        <i class='fa fa-list'></i> <span>SMS Blast</span>
                      </a>
                    </li>
                    <li>
                      <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                        <i class='fa fa-list'></i> <span>Disposisi</span>
                      </a>
                    </li>";
      }else if($_SESSION[level]==4){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('users-teramedik')." '>
                <i class='fa fa-users'></i> <span>Users Teramedik</span>
              </a>
            </li>
             <li>
              <a href='index.php?page=".base64_encode('sms-blast')." '>
                <i class='fa fa-list'></i> <span>SMS Blast</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                <i class='fa fa-list'></i> <span>Disposisi</span>
              </a>
            </li>";
      }else if($_SESSION[level]==5){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('users-teramedik')." '>
                <i class='fa fa-users'></i> <span>Users Teramedik</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=".base64_encode('sms-blast')." '>
                <i class='fa fa-list'></i> <span>SMS Blast</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                <i class='fa fa-list'></i> <span>Disposisi</span>
              </a>
            </li>";
      }else if($_SESSION[level]==6){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('users-teramedik')." '>
                <i class='fa fa-users'></i> <span>Users Teramedik</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=".base64_encode('sms-blast')." '>
                <i class='fa fa-list'></i> <span>SMS Blast</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                <i class='fa fa-list'></i> <span>Disposisi</span>
              </a>
            </li>";
      }else if($_SESSION[level]==7){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('users-teramedik')." '>
                <i class='fa fa-users'></i> <span>Users Teramedik</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=".base64_encode('sms-blast')." '>
                <i class='fa fa-list'></i> <span>SMS Blast</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                <i class='fa fa-list'></i> <span>Disposisi</span>
              </a>
            </li>";
      }else if($_SESSION[level]==8){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('users-teramedik')." '>
                <i class='fa fa-users'></i> <span>Users Teramedik</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=".base64_encode('sms-blast')." '>
                <i class='fa fa-list'></i> <span>SMS Blast</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                <i class='fa fa-list'></i> <span>Disposisi</span>
              </a>
            </li>";
      }else if($_SESSION[level]==9){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('users-teramedik')." '>
                <i class='fa fa-users'></i> <span>Users Teramedik</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=".base64_encode('sms-blast')." '>
                <i class='fa fa-list'></i> <span>SMS Blast</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                <i class='fa fa-list'></i> <span>Disposisi</span>
              </a>
            </li>";
      }else if($_SESSION[level]==10){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('users-teramedik')." '>
                <i class='fa fa-users'></i> <span>Users Teramedik</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=".base64_encode('sms-blast')." '>
                <i class='fa fa-list'></i> <span>SMS Blast</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                <i class='fa fa-list'></i> <span>Disposisi</span>
              </a>
            </li>";
      }else if($_SESSION[level]==11){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('users-teramedik')." '>
                <i class='fa fa-users'></i> <span>Users Teramedik</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=".base64_encode('sms-blast')." '>
                <i class='fa fa-list'></i> <span>SMS Blast</span>
              </a>
            </li>
            <li>
              <a href='index.php?page=". base64_encode('e_form')."&ID=".base64_encode('form_disposisi')."'>
                <i class='fa fa-list'></i> <span>Disposisi</span>
              </a>
            </li>";
      }else if($_SESSION[level]==12){
          $menu = "
            <li>
              <a href='index.php?page=".base64_encode('resume-medis')." '>
                <i class='fa fa-list'></i> <span>Resume Medis</span>
              </a>
            </li>";
      }else if($_SESSION[level]==13){
          $menu = "
            <li class=''>
              <li class=''>
              <a href='index.php?page=". base64_encode('kamar-view')."&cat=".base64_encode('K001')." ' target='blank'>
              <i class='fa fa-hospital-o'></i><span>Rooms </span></a></li>
          </li>
          <li>
            <a href='index.php?page=".base64_encode('users-teramedik')." '>
              <i class='fa fa-users'></i> <span>Users Teramedik</span>
            </a>
          </li>";
      }
                    
           
      echo $menu;
      ?>
  </ul>
</section>
<!-- /.sidebar -->
