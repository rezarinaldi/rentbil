      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-car"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Mobil</h4>
                  </div>
                  <div class="card-body">
                    <?php $query = $this->db->query('select*from mobil');
                    echo $query->num_rows($query) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total User</h4>
                  </div>
                  <div class="card-body">
                    <?php $query = $this->db->query('select*from user');
                    echo $query->num_rows($query) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-handshake"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Transaksi</h4>
                  </div>
                  <div class="card-body">
                    <?php $query = $this->db->query('select*from transaksi');
                    echo $query->num_rows($query) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Dibawah ini masih contoh -->
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Data Transaksi</h4>
                  <div class="card-header-action">
                    <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-dark">Lihat Detail <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped" id="data_table">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>User</th>
                          <th>Mobil</th>
                          <th>Status</th>
                          <th>Status Pembayaran</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksi as $ts) : ?>
                          <tr align="center">
                            <td><?= $no++ ?></td>
                            <td><?= $ts->nama ?></td>
                            <td><?= $ts->merk ?></td>
                            <td><?= $ts->status == 1 ? "<span class='badge badge-warning'>Disewa</span>" : "<span class='badge badge-success'>Selesai</span>" ?></td>
                            <td>
                              <?php if (($ts->status_pembayaran) == 0) {
                                echo "<span class='badge badge-danger'>Belum Dibayar</span>";
                              } elseif (($ts->status_pembayaran) == 1) {
                                echo "<span class='badge badge-info'>Menunggu Konfirmasi</span>";
                              } else {
                                echo "<span class='badge badge-success'>Sudah Dibayar</span>";
                              } ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h4>
                    <?php $query = $this->db->query('select*from pesan');
                    echo $query->num_rows($query) ?>
                  </h4>
                  <div class="card-description">Pesan</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">

                    <?php foreach ($pesan as $psn) : ?>

                      <a href="#" class="ticket-item">
                        <div class="ticket-title">
                          <!-- isi pesan -->
                          <h4><?= $psn->isi_pesan ?></h4>
                        </div>
                        <div class="ticket-info">
                          <!-- nama -->
                          <div><i class="far fa-user"></i> <?= $psn->nama ?></div>
                        </div>
                      </a>

                    <?php endforeach; ?>

                    <a href="<?= base_url('admin/data_pesan') ?>" class="ticket-item ticket-more">
                      Lihat Detail <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>

        </section>
      </div>