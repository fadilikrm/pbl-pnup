<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data Transaksi</h1>
                    </div>
                    <form class="user" action="<?= route_to('transaksieditstore') ?>" method="post" enctype="multipart/form-data">
                        <!-- Tambahkan input hidden untuk menyimpan ID transaksi yang diubah -->
                        <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
                        <div class="form-group row">
                            <label for="exampleName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data transaksi yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleName" name="nama_pelanggan" value="<?= $transaksi['nama_pelanggan'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data transaksi yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleEmail" name="nomor_telepon" value="<?= $transaksi['nomor_telepon'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data transaksi yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleEmail" name="alamat" value="<?= $transaksi['alamat'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="examplePassword" class="col-sm-2 col-form-label">Total Harga</label>
                            <div class="col-sm-10">
                                <!-- Biarkan value kosong untuk mempertahankan kata sandi saat ini -->
                                <input type="text" class="form-control" id="exampleEmail" name="total_harga"  value="<?= 'Rp ' . number_format($transaksi['total_harga'], 0, ",", "."); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputGroupSelect01" class="col-sm-2 col-form-label">Status Transaksi</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputGroupSelect01" name="status_transaksi">
                                    <!-- Pilih opsi sesuai dengan data transaksi yang ingin diubah -->
                                    <option value="Belum Diproses" <?= ($transaksi['status_transaksi'] == 'belum diproses') ? 'selected' : '' ?>>Belum Diproses</option>
                                    <option value="Diproses" <?= ($transaksi['status_transaksi'] == 'diproses') ? 'selected' : '' ?>>Diproses</option>
                                    <option value="Selesai" <?= ($transaksi['status_transaksi'] == 'selesai') ? 'selected' : '' ?>>Selesai</option>
                                </select>
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