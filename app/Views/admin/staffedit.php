<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data Staff</h1>
                    </div>
                    <form class="user" action="<?= route_to('staffeditstore') ?>" method="post" enctype="multipart/form-data">
                        <!-- Tambahkan input hidden untuk menyimpan ID staff yang diubah -->
                        <input type="hidden" name="id_staff" value="<?= $staff['id_staff'] ?>">

                        <div class="form-group row">
                            <label for="exampleName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data staff yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleName" name="nama" value="<?= $staff['nama'] ?>" placeholder="Masukkan Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputGroupSelect01" class="col-sm-2 col-form-label">Pilih Level</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputGroupSelect01" name="level">
                                    <!-- Pilih opsi sesuai dengan data staff yang ingin diubah -->
                                    <option value="pegawai" <?= ($staff['level'] == 'pegawai') ? 'selected' : '' ?>>Pegawai</option>
                                    <option value="admin" <?= ($staff['level'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data staff yang ingin diubah -->
                                <input type="email" class="form-control" id="exampleEmail" name="email" value="<?= $staff['email'] ?>" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="examplePassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <!-- Biarkan value kosong untuk mempertahankan kata sandi saat ini -->
                                <input type="password" class="form-control" id="exampleEmail" name="password"  placeholder="Abaikan Jika Tidak Ingin Mengganti Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFile" class="col-sm-2 col-form-label">Foto Profil</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data staff yang ingin diubah -->
                                <input style="border: none;" type="file" class="form-control" id="exampleFile" name="foto" value="<?= $staff['foto'] ?>" placeholder="Masukkan Email">
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