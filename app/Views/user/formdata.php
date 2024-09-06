<?= $this->extend('user/layout'); ?>

<?= $this->section('content'); ?>

<?php $validation = service('validation'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Silahkan Lengkapi Data Anda !! </h1>
    </div>

    <!-- content Row -->
    <div class="row">
        <div class="col">

            <div class="row">
                <!-- content start -->
                <div class="col-lg-12">
                    <div class="card shadow mb-3">
                        <div class="card-body">


                            <?= form_open('formdata') ?>
                            <!-- start accordion -->
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Formulir A
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">

                                            <input type="text" name="user_id" value="<?= user()->id ?>" hidden>
                                            <input type="text" name="email" value="<?= user()->email ?>" hidden>
                                            <input type="text" name="fullname" value="<?= user()->fullname ?>" hidden>


                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="form-control" id="jk" name="jenis_kelamin">
                                                    <option>Pilih Salah Satu</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>

                                                </select>
                                                <small class="form-text text-danger"><?= $validation->getError('jenis_kelamin'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="asalSekolah">Asal Sekolah</label>
                                                <input type="text" class="form-control" id="asalSekolah" name="asal_sekolah" value="<?= set_value('asal_sekolah') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('asal_sekolah'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="citaCita">Cita-cita</label>
                                                <input type="text" class="form-control" id="citaCita" name="cita_cita" value="<?= set_value('cita_cita') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('cita_cita'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="motivasi">Motivasi Dalam Mengikuti Training</label>
                                                <textarea class="form-control" id="motivasi" rows="4" name="motivasi" value="<?= set_value('motivasi') ?>"></textarea>
                                                <small class="form-text text-danger"><?= $validation->getError('motivasi'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="ukuranBaju">Ukuran Baju</label>
                                                <select multiple class="form-control" id="ukuranBaju" name="ukuran_baju">
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                </select>
                                                <small class="form-text text-danger"><?= $validation->getError('ukuran_baju'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="telp">Nomor Telp/Whatsapp</label>
                                                <input type="number" class="form-control" id="telp" placeholder="81340xxxxxx" name="nomor_telpon" value="<?= set_value('nomor_telpon') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('nomor_telpon'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="telp2">Nomor Telp Orang Tua</label>
                                                <input type="number" class="form-control" id="telp2" placeholder="81340xxxxxx" name="nomor_telpon_ortu" value="<?= set_value('nomor_telpon_ortu') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="pengalaman">Pengalaman Organisasi</label>
                                                <textarea class="form-control" id="pengalaman" rows="3" name="pengalaman" value="<?= set_value('pengalaman') ?>"></textarea>
                                                <small class="form-text text-danger"><?= $validation->getError('pengalaman'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Aktivitas Sekarang</label>
                                                <input type="text" class="form-control" value="" name="aktivitas" list="datalist">
                                                <datalist id="datalist">
                                                    <option value="Bekerja">Bekerja</option>
                                                    <option value="Sekolah/Kuliah">Sekolah/Kuliah</option>

                                                </datalist>
                                                <small class="form-text text-danger"><?= $validation->getError('aktivitas'); ?></small>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Formulir B
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="1">ORANG YANG PALING BERPENGARUH DALAM HIDUP ANDA?</label>
                                                <input type="text" class="form-control" id="1" name="opbdh" value="<?= set_value('opbdh') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('opbdh'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="2">APA NILAI MORAL/ AKHLAK YANG ORANG TUA AJARKAN SEJAK KECIL
                                                    ?</label>
                                                <input type="text" class="form-control" id="2" name="nm" value="<?= set_value('nm') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('nm'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="3">BIDANG KEILMUAN YANG ANDA SUKAI ?
                                                </label>
                                                <input type="text" class="form-control" id="3" name="bi" value="<?= set_value('bi') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('bi'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="4">SAYA MENDAPAT PENGETAHUAN AGAMA DARI
                                                </label>
                                                <input type="text" class="form-control" id="4" name="smpad" value="<?= set_value('smpad') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('smpad'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="5">SIAPA TOKOH YANG MENGINSPIRASI DALAM KEHIDUPAN ANDA ?
                                                </label>
                                                <input type="text" class="form-control" id="5" name="stmdka" value="<?= set_value('stmdka') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('stmdka'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="6">APA PENGALAMAN YANG PALING BERKESAN DALAM HIDUP ANDA ?
                                                </label>
                                                <input type="text" class="form-control" id="6" name="apypbdha" value="<?= set_value('apypbdha') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('apypbdha'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="7">KEGAGALAN YANG TAK TERLUPAKAN ?
                                                </label>
                                                <input type="text" class="form-control" id="7" name="kytt" value="<?= set_value('kytt') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('kytt'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="8">ANDA MENGETAHUI INFORMASI TRAINING ALBAB DARI ?
                                                </label>
                                                <input type="text" class="form-control" id="8" name="amtad" value="<?= set_value('amtad') ?>">
                                                <small class="form-text text-danger"><?= $validation->getError('amtad'); ?></small>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Formulir C
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Demikian formulir ini saya isi dengan penuh kesungguhan dan saya siap untuk memenuhi semua persyaratan dan mengikuti serangkaian Training ALBAB I Angkatan XIII ?
                                            <hr>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                                <label class="form-check-label" for="exampleCheck1">Ya, Bersedia</label>
                                                <hr>
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>


<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?= $this->endSection(); ?>