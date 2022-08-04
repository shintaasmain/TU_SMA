<!-- Main Content -->
<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= $title?></h1>
        </div>
        <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message')?>
        </div>
        <div class="col-md-8">
                    <!-- Profile Image -->
                    <div class="card card-outline">
                        <div class="card-body">
                            <div class="row no-guitters">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <img class="card-img" src="<?= base_url('foto_profil/') . $user['foto']; ?>" alt="Foto User">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <form>
                                        <?php foreach($profil as $p):?>
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <Label>Nama</Label>
                                            </div>
                                            <div class="col-md-1">
                                                <Label>:</Label>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="card-text"><?= $p->nama_user?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-3">
                                                <Label>Nip</Label>
                                            </div>
                                            <div class="col-1">
                                                <Label>:</Label>
                                            </div>
                                            <div class="col-4">
                                                <p class="card-text"><?= $p->nip?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-3">
                                                <Label>Jabatan</Label>
                                            </div>
                                            <div class="col-1">
                                                <Label>:</Label>
                                            </div>
                                            <div class="col-4">
                                                <p class="card-text"><?= $p->nama_jabatan?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-3">
                                                <Label>Email</Label>
                                            </div>
                                            <div class="col-1">
                                                <Label>:</Label>
                                            </div>
                                            <div class="col-4">
                                                <p class="card-text"><?= $p->email?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-3">
                                                <Label>Alamat</Label>
                                            </div>
                                            <div class="col-1">
                                                <Label>:</Label>
                                            </div>
                                            <div class="col-4">
                                                <p class="card-text"><?= $p->alamat?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-3">
                                                <Label>No Telepon</Label>
                                            </div>
                                            <div class="col-1">
                                                <Label>:</Label>
                                            </div>
                                            <div class="col-4">
                                                <p class="card-text"><?= $p->no_telepon?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-3">
                                                <Label>Username</Label>
                                            </div>
                                            <div class="col-1">
                                                <Label>:</Label>
                                            </div>
                                            <div class="col-4">
                                                <p class="card-text"><?= $p->username?></p>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
      </div>