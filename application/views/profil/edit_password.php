   <!-- Main Content -->
   <div class="main-content">
   <section class="section">
          <div class="section-header">
            <h1><?= $title?></h1>
          </div>
          <div class="row">
              <!-- UBAH PASSWORD -->
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card" id="sample-login">
                <form method="post" enctype="multipart/form-data" action="<?php echo site_url('profil/ubahPassword');?>">
                    <div class="card-header">
                      <h4>Ubah Password</h4>
                    </div>
                    <div class="card-body pb-0">
                    <?= $this->session->flashdata('message'); ?>
                    <?php foreach ($profil as $p):?>
                      <div class="form-group">
                        <label>Password Lama</label>
                        <div class="input-group">
                          <input type="password" name="password_lama" class="form-control" placeholder="Masukkan password lama ...">
                        </div>
                        <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label>Password Baru</label>
                        <div class="input-group">
                          <input type="password" name="password_baru" class="form-control" placeholder="Masukkan password baru ...">
                        </div>
                        <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <div class="input-group">
                          <input type="password" name="konfirmasi_password" class="form-control" placeholder="Masukkan konfirmasi password...">
                        </div>
                        <?= form_error('konfirmasi_password', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <?php endforeach?>
                    <div class="card-footer">
                      <button type="submit" onclick="#" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </section>
      </div>