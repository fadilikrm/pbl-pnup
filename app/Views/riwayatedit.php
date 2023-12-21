<?= $this->extend('admin/layout/link') ?>
<?= $this->section('auth') ?>
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Edit Pembayaran</h1>
        <form action="<?= route_to('riwayateditstore') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
            <div class="form-item">
                <label class="form-label my-3">Nama<sup>*</sup></label>
                <input type="text" class="form-control" value="<?= $transaksi['nama_pelanggan'] ?>" name="nama_pelanggan">
            </div>
            <div class="form-item">
                <label class="form-label my-3">Alamat Lengkap <sup>*</sup></label>
                <input type="text" class="form-control" value="<?= $transaksi['alamat'] ?>" name="alamat">
            </div>
            <div class="form-item">
                <label class="form-label my-3">Nomor Hp<sup>*</sup></label>
                <input type="text" class="form-control" value="<?= $transaksi['nomor_telepon'] ?>" name="nomor_telepon">
            </div>
            <div class="form-item">
                <label class="form-label my-3">Alamat Email<sup>*</sup></label>
                <input type="email" class="form-control" value="<?= $transaksi['email'] ?>" name="email">
            </div>
            <br>
            <div class="form-item">
                <textarea class="form-control" spellcheck="false" cols="30" rows="11" value="<?= $transaksi['catatan'] ?>" name="catatan"><?= $transaksi['catatan'] ?></textarea>
            </div>

            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Update Pesanan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
