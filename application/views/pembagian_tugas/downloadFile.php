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
                            <div class=" form-group col mt-5">
                            <div class="col-md-12 text-center">
                                <!-- TAMPIL INFO BELUM ADA FILE -->
                                <div class="mt-5">
                                    <h3 class="fw-bold">Maaf belum ada file pembagian tugas</h3>
                                </div>
                        <!-- APABILA SUDAH ADA FILENYA -->
                        <?php } else if ($cekfile >= 1){?>
                            <div class=" form-group col mt-5">
                                <div class="col-md-12 text-center">
                                <input type="hidden" id="id_pembagian_tugas" name="id_pembagian_tugas" value="<?= $file['id_pembagian_tugas'];?>">
                                <em class="text-danger fw-bold mb-0 mt-5" style="font-size: 13px">*Silahkan download pembagian tugas dibawah ini</em>
                                <!-- TAMPIL PDF -->
                                <div class="mt-5">
                                        <iframe src="<?php echo base_url('file_pembagiantugas/').$file['nama_file'];?>" width="80%" height="300px"></iframe>
                                        <a src="<?php echo base_url('file_pembagiantugas/').$file['nama_file'];?>"></a>
                                    </div>
                                    <div class="col-md-12 text-center mt-5">
                                    <a href="<?php echo base_url().'pembagiantugas/download/'.$file['id_pembagian_tugas']; ?>" class="btn btn-success">Download</a> 
                                    </div>
                        <?php } ?>
                        
                        </div>
        </div>
        </section>
      </div>