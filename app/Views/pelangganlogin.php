<?= $this->extend('admin/layout/link') ?>
<?= $this->section('auth') ?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-7 col-lg-10 col-md-12">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="display-5 mb-4" style="color: #d4a762;">Login!</h1>
                        </div>

                        <form action="<?php echo base_url('/postlogin') ?>" class="user" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="uil uil-at"></i></span>
                                    </div>
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder=" Masukkan Alamat Email Anda">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="uil uil-lock-alt"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder=" Masukkan Password Anda ">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="save" style="background-color: #d4a762; border-color: #d4a762;">
                                Login
                            </button>
                            <hr>
                            <div class="text-center">
                                <a style="color: #d4a762;" class="small" href="<?= route_to('pelangganregister') ?>">Tidak Punya Akun? Klik disini</a>
                            </div>
                            <div class="text-center">
                                <a style="color: #d4a762;" class="small" href="<?= route_to('index') ?>">Home</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

</div>
<?= $this->endSection() ?>