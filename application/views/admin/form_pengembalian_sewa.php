<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Pengembalian Sewa</h1>
        </div>

        <div class="card">
            <div class="card-body">

                <?php foreach ($transaksi as $ts) : ?>

                    <form action="<?= base_url('admin/transaksi/pengembalian_aksi') ?>" enctype="multipart/form-data" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-3">

                                <input type="hidden" name="id_transaksi" value="<?= $ts->id_transaksi ?>">
                                <input type="hidden" name="id_mobil" value="<?= $ts->id_mobil ?>">
                                <input type="hidden" name="tanggal_kembali" value="<?= $ts->tanggal_kembali ?>">
                                <input type="hidden" name="denda" value="<?= $ts->denda ?>">

                                <div class="form-group">
                                    <label>Tanggal Pengembalian</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="date" name="tanggal_pengembalian" class="form-control" value="<?= $ts->tanggal_pengembalian ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-random"></i>
                                            </div>
                                        </div>
                                        <select name="status" class="form-control" required>
                                            <option <?php if ($ts->status == "1") {
                                                        echo "selected='selected'";
                                                    }
                                                    ?> value="1">Disewa</option>
                                            <option <?php if ($ts->status == "2") {
                                                        echo "selected='selected'";
                                                    }
                                                    ?> value="2">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger"><i class="fas fa-undo"></i> Reset</button>
                    </form>

                <?php endforeach; ?>

            </div>
        </div>
    </section>
</div>