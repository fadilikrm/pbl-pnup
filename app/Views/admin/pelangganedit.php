<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data pelanggan</h1>
                    </div>
                    <form class="user" action="<?= route_to('pelangganeditstore') ?>" method="post" enctype="multipart/form-data">
                        <!-- Tambahkan input hidden untuk menyimpan ID pelanggan yang diubah -->
                        <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">

                        <div class="form-group row">
                            <label for="exampleName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data pelanggan yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleName" name="nama_pelanggan" value="<?= $pelanggan['nama_pelanggan'] ?>" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data pelanggan yang ingin diubah -->
                                <input type="email" class="form-control" id="exampleEmail" name="email" value="<?= $pelanggan['email'] ?>" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data pelanggan yang ingin diubah -->
                                <input type="textarea" class="form-control" id="exampleEmail" name="alamat" value="<?= $pelanggan['alamat'] ?>" placeholder="Masukkan Alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data pelanggan yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleEmail" name="nomor_telepon" value="<?= $pelanggan['nomor_telepon'] ?>" placeholder="Masukkan Nomor Telepon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="examplePassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <!-- Biarkan value kosong untuk mempertahankan kata sandi saat ini -->
                                <input type="password" class="form-control" id="exampleEmail" name="password" placeholder="Abaikan Jika Tidak Ingin Mengganti Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFile" class="col-sm-2 col-form-label">Foto Profil</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data pelanggan yang ingin diubah -->
                                <input style="border: none;" type="file" class="form-control" id="exampleFile" name="foto" value="<?= $pelanggan['foto'] ?>" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="col-sm-6 offset-sm-3">
                            <button type="submit" class="btn btn-primary btn-user btn-block">Simpan Perubahan</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>