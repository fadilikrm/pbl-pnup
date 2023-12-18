<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data Galeri Foto</h1>
                    </div>
                    <form class="user" action="<?= route_to('galerifotoeditstore') ?>" method="post" enctype="multipart/form-data">
                        <!-- Tambahkan input hidden untuk menyimpan ID galerifoto yang diubah -->
                        <input type="hidden" name="id_foto" value="<?= $galerifoto['id_foto'] ?>">
                        <div class="form-group row">
                            <label for="exampleName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data galerifoto yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleName" name="nama_foto" value="<?= $galerifoto['nama_foto'] ?>" placeholder="Masukkan Nama Foto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data galerifoto yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleEmail" name="deskripsi_foto" value="<?= $galerifoto['deskripsi_foto'] ?>" placeholder="Masukkan Deskripsi Foto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFile" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data galerifoto yang ingin diubah -->
                                <input style="border: none;" type="file" class="form-control" id="exampleFile" name="foto" value="<?= $galerifoto['foto'] ?>" placeholder="Masukkan Foto Anda">
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