<!-- Main Content -->
<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= $title?></h1>
        </div>
        <div class="row">
                <!-- UBAH PROFIL -->
                <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                <div class="card-header">
                    <?= form_open_multipart('profil/ubahProfil');?>
                    <h4>Ubah Profil</h4>
                    <div class="card-header-action">
                    </div>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <?php foreach ($profil as $p):?>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="hidden" class="form-control" name="id_user" value="<?= $p -> id_user?>">
                        <input type="text" class="form-control" name="nama" value="<?= $p -> nama_user?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nip</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nip" value="<?= $p->nip?>">
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" disabled  name="jabatan" value="<?=$p->nama_jabatan?>">
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="email" value="<?= $p->email?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="alamat" value="<?= $p->alamat?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telepon</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="no_telepon" value="<?= $p->no_telepon?>">
                        <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="username" value="<?= $p->username?>" disabled>
                    </div>
                    </div>
                    <div class=" form-group row">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</div>
                        <div class="col-sm-12 col-md-7">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img src="<?= base_url('foto_profil/') . $user['foto'] ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto">
                                        <label class="custom-file-label" for="foto">Pilih file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="form-group row mb-4">
                    <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
                    <div class="col-sm-12 col-md-7">
                        <button type="submit" onclick="#" class="btn btn-primary">Simpan</button>
                    </div>
                    </div>
                    <?= form_close(); ?>
                </div>
                </div>
            </div>
        </div>
        </section>
    </div>
