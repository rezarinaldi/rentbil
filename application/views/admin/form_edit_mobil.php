<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Mobil</h1>
        </div>

        <div class="card">
            <div class="card-body">

                <?php foreach ($mobil as $mb) : ?>

                    <form action="<?= base_url('admin/data_mobil/edit_mobil_simpan') ?>" enctype="multipart/form-data" autocomplete="off" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type Mobil</label>
                                    <input type="hidden" name="id_mobil" value="<?= $mb->id_mobil ?>">
                                    <select name="id_type" class="form-control">
                                        <option value="<?= $mb->id_type ?>"><?= $mb->nama_type ?></option>
                                        <?php foreach ($type as $tp) : ?>
                                            <option value="<?= $tp->id_type ?>"><?= $tp->nama_type ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_type', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" name="merk" class="form-control" value="<?= $mb->merk ?>">
                                    <?= form_error('merk', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>No. Plat</label>
                                    <input type="text" name="no_plat" class="form-control" value="<?= $mb->no_plat ?>">
                                    <?= form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" name="warna" class="form-control" value="<?= $mb->warna ?>">
                                    <?= form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="<?= $mb->tahun ?>">
                                    <?= form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control" value="<?= $mb->harga ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Denda</label>
                                    <input type="text" name="denda" class="form-control" value="<?= $mb->denda ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status_mobil" class="form-control">
                                        <option <?php if ($mb->status_mobil == "1") {
                                                    echo "selected='selected'";
                                                }
                                                echo $mb->status_mobil; ?> value="1">Tersedia</option>
                                        <option <?php if ($mb->status_mobil == "0") {
                                                    echo "selected='selected'";
                                                }
                                                echo $mb->status_mobil; ?> value="0">Kosong</option>
                                    </select>
                                    <?= form_error('status_mobil', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <br>
                                    <a href="<?= base_url() . 'assets/upload/mobil/' . $mb->gambar ?>">
                                        <img src="<?= base_url() . 'assets/upload/mobil/' . $mb->gambar ?>" width="150px">
                                    </a>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                                <h4 class="mb-3">Fasilitas Mobil</h4>
                                <?php if ($mb->ac == "1") { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ac" name="ac" checked value="1">
                                        <label class="custom-control-label" for="ac">AC</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ac" name="ac" value="1">
                                        <label class="custom-control-label" for="ac">AC</label>
                                    </div>
                                <?php } ?>
                                <?php if ($mb->supir == "1") { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="supir" name="supir" checked value="1">
                                        <label class="custom-control-label" for="supir">Supir</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="supir" name="supir" value="1">
                                        <label class="custom-control-label" for="supir">Supir</label>
                                    </div>
                                <?php } ?>
                                <?php if ($mb->audio_player == "1") { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="audio_player" name="audio_player" checked value="1">
                                        <label class="custom-control-label" for="audio_player">Audio Player</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="audio_player" name="audio_player" value="1">
                                        <label class="custom-control-label" for="audio_player">Audio Player</label>
                                    </div>
                                <?php } ?>
                                <?php if ($mb->central_lock == "1") { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="central_lock" name="central_lock" checked value="1">
                                        <label class="custom-control-label" for="central_lock">Central Lock</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="central_lock" name="central_lock" value="1">
                                        <label class="custom-control-label" for="central_lock">Central Lock</label>
                                    </div>
                                <?php } ?>
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