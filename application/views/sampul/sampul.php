<!-- Main Content -->
<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= $title?></h1>
        </div>
        <div class="row">
                <!-- DATA BUAT SAMPUL -->
                <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action">
                    </div>
                </div>
                <div class="card-body">
                    <?php foreach ($profil as $p):?>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="hidden" class="form-control" name="id_user" value="<?= $p -> id_user?>">
                        <input type="text" class="form-control" name="nama" value="<?= $p -> nama_user?>" disabled>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pegawai</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nip" value="<?= $p->jenis_pegawai?>" disabled>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan Pegawai</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" disabled  name="jabatan" value="<?=$p->nama_jabatan?>" disabled>
                    </div>
                    </div>
                    <?php endforeach;?>
                    <div class="form-group row mb-4">
                    <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
                    <div class="col-sm-12 col-md-7">
                        <a type="submit" href="<?= base_url('sampul/pdf')?>" class="btn btn-primary">Download Sampul</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </section>
    </div>
