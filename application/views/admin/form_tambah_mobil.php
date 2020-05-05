<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Mobil</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin/data_mobil/tambah_mobil_simpan') ?>" enctype="multipart/form-data" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type Mobil</label>
                                <select name="id_type" class="form-control">
                                    <option value="">Pilih Type Mobil</option>
                                    <?php foreach ($type as $tp) : ?>
                                        <option value="<?= $tp->id_type ?>"><?= $tp->nama_type ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_type', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="merk" class="form-control">
                                <?= form_error('merk', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>No. Plat</label>
                                <input type="text" name="no_plat" class="form-control">
                                <?= form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" name="warna" class="form-control">
                                <?= form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" name="tahun" class="form-control">
                                <?= form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Denda</label>
                                <input type="number" name="denda" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_mobil" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Kosong</option>
                                </select>
                                <?= form_error('status_mobil', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control" required>
                            </div>
                            <h4 class="mb-3">Fasilitas Mobil</h4>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ac" name="ac" value="1">
                                <label class="custom-control-label" for="ac">AC</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="supir" name="supir" value="1">
                                <label class="custom-control-label" for="supir">Supir</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="audio_player" name="audio_player" value="1">
                                <label class="custom-control-label" for="audio_player">Audio Player</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="central_lock" name="central_lock" value="1">
                                <label class="custom-control-label" for="central_lock">Central Lock</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger mt-3"><i class="fas fa-undo"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>