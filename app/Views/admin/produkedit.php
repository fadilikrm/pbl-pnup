<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data Produk</h1>
                    </div>
                    <form class="user" action="<?= route_to('produkeditstore') ?>" method="post" enctype="multipart/form-data">
                        <!-- Tambahkan input hidden untuk menyimpan ID produk yang diubah -->
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                        <div class="form-group row">
                            <label for="exampleName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data produk yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleName" name="nama_produk" value="<?= $produk['nama_produk'] ?>" placeholder="Masukkan Nama Produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data produk yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleEmail" name="deskripsi_produk" value="<?= $produk['deskripsi_produk'] ?>" placeholder="Masukkan Deskripsi Produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data produk yang ingin diubah -->
                                <input type="number" class="form-control" id="exampleEmail" name="harga" value="<?= $produk['harga'] ?>" placeholder="Masukkan Harga Produk (Hanya Angka)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputGroupSelect01" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputGroupSelect01" name="status">
                                    <!-- Pilih opsi sesuai dengan data produk yang ingin diubah -->
                                    <option value="Tersedia" <?= ($produk['status'] == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
                                    <option value="Tidak tersedia" <?= ($produk['status'] == 'Tidak Tersedia') ? 'selected' : '' ?>>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFile" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data produk yang ingin diubah -->
                                <input style="border: none;" type="file" class="form-control" id="exampleFile" name="foto" value="<?= $produk['foto'] ?>" placeholder="Masukkan Foto Anda">
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