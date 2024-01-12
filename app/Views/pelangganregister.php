<?= $this->extend('admin/layout/link') ?>
<?= $this->section('auth') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
        <div class="text-center">
                    <img class="custom-logo" src="img/logo.png" style="width: 150px; margin-top: 2rem">
                </div>
            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="display-5 mb-4" style="color: #d4a762;">Registrasi Pelanggan</h1>
                        </div>
                        <form action="<?php echo base_url('/simpanregister') ?>" method="POST" class="user" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="color: #d4a762;"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-user" name="nama_pelanggan" placeholder="Masukkan Nama Anda">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="color: #d4a762;"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                    <input type="textarea" class="form-control form-control-user" name="alamat" placeholder="Masukkan Alamat Anda">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="color: #d4a762;"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-user" name="nomor_telepon" placeholder="Masukkan Nomor Telepon Anda">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="color: #d4a762;"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Masukkan Email Anda">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="color: #d4a762;"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password Anda">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Masukkan Foto " class="col-sm-6 col-form-label">Masukkan Foto </label>
                                <div class="col-sm-6">
                                    <input type="file" style="border: none;" class="form-control" name="foto" placeholder="Masukkan Foto Anda">
                                </div>
                            </div>

                            <button class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="save" style="background-color: #d4a762; border-color: #d4a762;">
                                Register
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                          <span class="small">Sudah punya akun? <a style="color: #d4a762;" href="<?= route_to('pelangganlogin') ?>">klik disini</a></span>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?= $this->endSection() ?>