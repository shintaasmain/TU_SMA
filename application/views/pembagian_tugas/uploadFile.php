<!-- Main Content -->
<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= $title?> Pembagian Tugas</h1>
        </div>
        <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message')?>
        </div>
        <div class="col-md-5">
                    <!-- UPLOAD PEMBAGIAN TUGAS -->
                    <div class="card card-outline">
                        <div class="card-body">
                        <!-- APABILA BELUM ADA FILENYA -->
                        <?php if ($cekfile == 0){?>
                            <?= form_open_multipart('pembagiantugas/uploadfile');?>
                            <div class=" form-group col mt-5">
                            <div class="col-md-12 text-center">
                                <em class="text-danger fw-bold mb-0 mt-5" style="font-size: 13px">*Silahkan upload pembagian tugas untuk semua pegawai dalam format : .pdf</h6>
                                <div class="form-group-upload mt-3" >
                                <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="nama_file" name="nama_file">
                                            <label class="custom-file-label text-left" for="nama_file">Pilih file</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center mt-4">
                                    <button href="" class="btn btn-lg btn-primary">Upload</button>
                                    </div>
                            </div>
                            </form>
                        <!-- APABILA SUDAH ADA FILENYA -->
                        <?php } else if ($cekfile >= 1){?>
                            <?= form_open_multipart('pembagiantugas/updatefile');?>
                            <div class=" form-group col mt-5">
                                <div class="col-md-12 text-center">
                                <input type="hidden" id="id_pembagian_tugas" name="id_pembagian_tugas" value="<?= $file['id_pembagian_tugas'];?>">
                                <em class="text-danger fw-bold mb-0 mt-5" style="font-size: 13px">*Silahkan upload pembagian tugas untuk semua pegawai dalam format : .pdf</h6>
                                <!-- TAMPIL PDF -->
                                <div class="class-mt-4">
                                        <iframe src="<?php echo base_url('file_pembagiantugas/').$file['nama_file'];?>" width="80%" height="300px"></iframe>
                                        <a src="<?php echo base_url('file_pembagiantugas/').$file['nama_file'];?>"></a>
                                    </div>
                                <div class="form-group-upload mt-3 mb-5" >
                                <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="nama_file" name="nama_file">
                                            <label class="custom-file-label text-left" for="nama_file">Pilih file</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center mt-5">
                                    <button href="" class="btn btn-lg btn-warning">Update</button>
                                    </div>
                            </div>
                            </form>
                        <?php } ?>
                        
                        </div>
        </div>
        </section>
      </div>