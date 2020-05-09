<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Data Transaksi</h1>
		</div>

		<div class="card">
			<div class="card-body">

				<?php foreach ($transaksi as $ts) : ?>

					<form action="<?= base_url('admin/transaksi/edit_transaksi_simpan') ?>" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Customer</label>
									<div class="input-group">
										<input type="hidden" name="harga" id="harga" value="<?= $ts->harga ?>">
										<input type="hidden" name="id_transaksi" value="<?= $ts->id_transaksi ?>">
										<input type="hidden" name="id_user" value="<?= $ts->id_user ?>" id="id_user">
										<input type="hidden" name="id_mobil" value="<?= $ts->id_mobil ?>" id="id_mobil">
										<input type="text" name="user" class="form-control" id="nama" value="<?= $ts->nama ?>" required disabled>
										<div class="input-group-append">
											<button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modal-user">
												<i class="fas fa-search"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Mobil</label>
									<div class="input-group">
										<input type="text" name="mobil" class="form-control" id="merk_mobil" value="<?= $ts->merk ?>" required disabled>
										<div class="input-group-append">
											<button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modal-mobil">
												<i class="fas fa-search"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Tanggal Sewa</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-calendar"></i>
											</div>
										</div>
										<input type="date" name="tgl_sewa" class="form-control" value="<?= $ts->tanggal_sewa ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label>Tanggal Kembali</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-calendar"></i>
											</div>
										</div>
										<input type="date" name="tgl_kembali" class="form-control" value="<?= $ts->tanggal_kembali ?>" required>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Status</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-random"></i>
											</div>
										</div>
										<select name="status" class="form-control" disabled required>
											<option <?php if ($ts->status == "1") {
														echo "selected='selected'";
													}
													?> value="1">Disewa</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label>Metode Pickup</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-shipping-fast"></i>
											</div>
										</div>
										<select name="pickup" class="form-control" required>
											<option <?php if ($ts->pickup == "0") {
														echo "selected='selected'";
													}
													?> value="0">Ambil Sendiri</option>
											<option <?php if ($ts->pickup == "1") {
														echo "selected='selected'";
													}
													?> value="1">Pickup Sesuai Alamat</option>
										</select>
									</div>
								</div>

								<button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
								<button type="reset" class="btn btn-danger mt-3"><i class="fas fa-undo"></i> Reset</button>
							</div>
						</div>
					</form>

				<?php endforeach ?>

			</div>
		</div>
	</section>
</div>



<!-- MODAL USER -->

<div class="modal fade" id="modal-user">
	<div class="modal-dialog" style="min-width: 700px; max-height: 80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Pilih User</h4>
				<button type="button" class="close" data-dismiss="modal" arial-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped table-responsive" id="data_table">
					<thead>
						<tr align="center">
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Gender</th>
							<th>No. Telp</th>
							<th>No. KTP</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($user as $ct) : ?>
							<tr align="center">
								<td><?= $no++ ?></td>
								<td><?= $ct->nama ?></td>
								<td><?= $ct->alamat ?></td>
								<td><?= $ct->gender ?></td>
								<td><?= $ct->no_telp ?></td>
								<td><?= $ct->no_ktp ?></td>
								<td>
									<button class="btn btn-xs btn-primary input-group-append" id="select_user" data-id="<?= $ct->id_user ?>" data-nama="<?= $ct->nama ?>">
										<i class="fas fa-check mr-1 mt-1"></i>Select
									</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>


<!-- MODAL MOBIL -->

<div class="modal fade" id="modal-mobil">
	<div class="modal-dialog" style="min-width: 850px; max-height: 95%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Pilih Mobil Tersedia</h4>
				<button type="button" class="close" data-dismiss="modal" arial-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="data_table2">
					<thead>
						<tr align="center">
							<th>No</th>
							<th>Gambar</th>
							<th>Merk</th>
							<th>No. Plat</th>
							<th>Warna</th>
							<th>Tahun</th>
							<th>Harga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($mobil as $mb) : ?>
							<?php if (($mb->status_mobil) == 1) : ?>
								<tr align="center">
									<td><?= $no++ ?></td>
									<td>
										<a href="<?= base_url() . 'assets/upload/mobil/' . $mb->gambar ?>">
											<img width="100px" height="60px" src="<?= base_url() . 'assets/upload/mobil/' . $mb->gambar ?>">
										</a>
									</td>
									<td><?= $mb->merk ?></td>
									<td><?= $mb->no_plat ?></td>
									<td><?= $mb->warna ?></td>
									<td><?= $mb->tahun ?></td>
									<td><?= format_rupiah($mb->harga) ?></td>
									<td>
										<button class="btn btn-xs btn-primary input-group-append" id="select_mobil" data-id="<?= $mb->id_mobil ?>" data-merk="<?= $mb->merk ?>" data-harga="<?= $mb->harga ?>">
											<i class="fas fa-check mr-1 mt-1"></i>Select
										</button>
									</td>
								</tr>
							<?php endif ?>
						<?php endforeach; ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

<script>
	$(document).ready(function() {
		$(document).on('click', '#select_user', function() {
			var nama = $(this).data('nama');
			var id = $(this).data('id');

			$('#nama').val(nama);
			$('#id_user').val(id);

			$('#modal-user').modal('hide');
		});
	});
</script>

<script>
	$(document).ready(function() {
		$(document).on('click', '#select_mobil', function() {
			var merk = $(this).data('merk');
			var id = $(this).data('id');
			var harga = $(this).data('harga');

			$('#merk_mobil').val(merk);
			$('#id_mobil').val(id);
			$('#harga').val(harga);

			$('#modal-mobil').modal('hide');
		});
	});
</script>