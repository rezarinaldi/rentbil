<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Kotak Pesan</h2>
                    <span class="title-line"><i class="fa fa-car"></i></span>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Contact Page Area Start ==-->
<div class="contact-page-wrao section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <h4 class="mb-4">Ketik Pesan Anda</h4>
                <?= $this->session->flashdata('pesan') ?>
                <div class="contact-form mt-4">
                    <form action="<?= base_url('customer/rental/kirim_pesan') ?>" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <label for="">Nama</label>
                                <div class="name-input">
                                    <input type="text" name="nama" value="<?= $this->session->userdata('nama') ?>" readonly>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <label for="">Email</label>
                                <div class="email-input">
                                    <input type="email" name="email" value="<?= $this->session->userdata('email') ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="website-input">
                                    <label for="">Subjek</label>
                                    <input type="text" name="subjek" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="message-input">
                                    <label for="">Isi Pesan</label>
                                    <textarea name="isi_pesan" cols="30" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="input-submit float-right ml-3">
                            <button class="bg-warning" type="reset"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                        <div class="input-submit float-right">
                            <button class="bg-warning" type="submit"><i class="fa fa-send"></i> Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Contact Page Area End ==-->