 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title?></h1>
          </div>

          <div class="section-body">
            <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4><?= $title?></h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id="table-1">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1; 
                    foreach($jabatan as $item): ?>
                          <tr>
                            <td><?= $no++?></td>
                            <td><?= $item->nama_jabatan?></td>
                            <td>Belum ada data</td>
                            <td><a href="<?php echo site_url('Urtujab/tambahTugas/'.$item->id_role);?>" class="btn btn-primary">Tugas</a></td>
                          </tr>
                      <?php endforeach ; ?>
                      </tbody>
                    </table>
                </div>
                </div>
                <div class="card-footer text-right">
               
                </div>
            </div>
            </div>
        </div>
        </section>
      </div>