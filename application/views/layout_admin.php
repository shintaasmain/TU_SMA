<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title;?></title>

  <!-- General CSS Files -->  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/assets') ?>/modules/chocolat/dist/css/chocolat.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/modules/datatables/datatables.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css');?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/css/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/css/components.css');?>">
  </head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url('foto_profil/').$user['foto'];?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user['nama_user']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <a href="<?php echo site_url ('profil/')?> " class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a>
              
              <div class="dropdown-divider"></div>
              <a onclick="logoutConfirm('<?php echo site_url('login/logout');?>')" href="#!" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">TU Smanidy</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <p href="index.html"><b>TU Smanidy </b></p>
          </div>

          <ul class="sidebar-menu">
           <!-- QUERY MENU -->
           <?php
                        $id_role = $this->session->userdata('id_role');
                        $queryMenu = "SELECT `user_menu`.`id_menu`,`menu`
                                        FROM `user_menu` JOIN `user_access_menu`
                                        ON `user_menu`.`id_menu` = `user_access_menu`.`id_menu`
                                    WHERE `user_access_menu`.`id_role` = $id_role
                                    ORDER BY `user_access_menu`.`id_menu` ASC
                                    ";

                        $menu = $this->db->query($queryMenu)->result_array();
                        // var_dump($menu);
                        // die;
                        ?>

                      <!-- LOOPING MENU -->

                      <?php foreach ($menu as $m) : ?>

                          <li class="menu-header"><?= $m['menu']; ?></li>
                          <!-- SIAPKAN SUB MENU SESUAI MENU -->
                          <!-- JOIN TABLE MENU DAN SUB MENU -->
                          <?php
                            $menuId = $m['id_menu'];
                            $querySubMenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu`
                            ON `user_sub_menu`.`id_menu` = `user_menu`.`id_menu`
                            WHERE `user_sub_menu`.`id_menu` = $menuId
                            AND `user_sub_menu`.`is_active` = 1";

                            $subMenu = $this->db->query($querySubMenu)->result_array(); ?>
                            <?php foreach ($subMenu as $sm) : ?>
                              <?php if ($title == $sm['title']) : ?>
                                  <li class=" ">
                                  <?php else : ?>
                                  <li class="nav-item">
                                  <?php endif; ?>
                                  <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                                      <i class="<?= $sm['icon']; ?>"></i>
                                      <span><?= $sm['title']; ?></span>
                                  </a>
                                  </li>
                                  </li>
                              <?php endforeach; ?>
                              <!-- SEBETULNYA TIDAK PERLU MENGGUNAKAN JOIN  -->
                              <!-- SELECT * FROM `user_sub_menu` WHERE `id_menu` = $menuId AND `status` = 1" -->

                          <?php endforeach; ?>
                          <br>
              <li class="active"><a class="nav-link"  onclick="logoutConfirm('<?php echo site_url('login/logout');?>')"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <?= $contents ?> 

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Shinta Asma'in
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url('assets/admin/assets/js/stisla.js');?>"></script>

 <!-- JS Libraies -->
 <script src="<?php echo base_url('assets/admin/assets') ?>/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
	<script src="<?= base_url('assets/admin/assets') ?>/modules/jquery-ui/jquery-ui.min.js"></script>
  
  <script src="<?php echo base_url('assets/admin/assets/modules/datatables/datatables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js');?>"></script>
  <script src="<?php echo base_url('assets/admin/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js');?>"></script>
  <script src="<?php echo base_url('assets/admin/assets/modules/jquery-ui/jquery-ui.min.js');?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/admin/assets/js/page/modules-datatables.js');?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/admin/assets/js/page/index.js');?>"></script>
  <!-- Upload Foto -->
  <script>
      $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
  </script>
  <script>
  function logoutConfirm(url){
    $('#btn-logout').attr('href', url);
    $('#logoutModal').modal();
  }
</script>
<!-- Logout MODAL -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah anda yakin ingin keluar?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-logout" class="btn btn-danger" href="#">Keluar</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
