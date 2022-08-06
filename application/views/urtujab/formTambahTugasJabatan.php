<!-- Main Content -->
<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= $title?> <?= $jabatan['nama_jabatan']?></h1>
        </div>
        <div class="row">
     				<div class="col-12">
     					<div class="card">
     						<?php if($count<1){ ?>
     						<div class="card-header">
     							<a href="#" class="btn btn-primary">
     								Tambah Ikhtisiar</a>
     						</div>
     						<?php } else { ?>
     						<div class="card-header">
     							<em class="text-danger">*Jumlah ikhtisiar hanya satu</em>
     						</div>
     						<?php } ?>


     						<div class="card-body">
     							<div class="table-responsive">
     								<table class="table table-striped table-md" id="table-1">
										<thead>
											<tr>
     										<th>Ikhtisiar Jabatan</th>
     										<th>Action</th>
     									</tr>
										</thead>
										<tbody>
                                        <?php foreach($tugas as $item):?>
     									<tr>
     										<td width="70%"><?= $item->ikhtisiar_jabatan?></td>
     										<td><a href="#"class="btn btn-warning">Edit</a>
     										    <a href="#"class="btn btn-primary">Detail</a>
     											<a href="#"class="btn btn-danger">Hapus</a></td>
     									</tr>
                                        <?php endforeach;?>
										</tbody>
     									
     								
     								</table>
     							</div>
     						</div>
     					</div>
     				</div>
     			</div>
        </section>
    </div>