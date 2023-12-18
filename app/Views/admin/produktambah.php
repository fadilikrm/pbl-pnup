<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Tambah Data Produk</h1>
                    </div>
                    <form action="<?= route_to('produktambahstore') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group row">
                            <label for="exampleName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_produk" class="form-control" id="exampleName" placeholder="Masukkan Nama Produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" name="deskripsi_produk" class="form-control" id="exampleEmail" placeholder="Masukkan Deskripsi Produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" name="harga" class="form-control" id="exampleEmail" placeholder="Masukkan Harga Produk (Hanya Angka)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputGroupSelect01" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" id="inputGroupSelect01">
                                    <option selected>Pilih Status </option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputFile" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input style="border:none;" type="file" name="foto" class="form-control" id="exampleInputPassword" placeholder="Masukkan Foto Produk">
                            </div>
                        </div>
                        <div class="col-sm-6 offset-sm-3">
                            <button type="submit" class="btn btn-primary btn-user btn-block">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
