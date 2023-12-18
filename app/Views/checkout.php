<?= $this->extend('admin/layout/link') ?>
<?= $this->section('auth') ?>
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Detail Pembayaran</h1>
        <form action="#">
            <div class="row g-4">
                <!-- Informasi Pembeli -->
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div class="form-item">
                        <label class="form-label my-3">Nama<sup>*</sup></label>
                        <input type="text" class="form-control" value="<?= session('nama_pelanggan') ?>" name="nama_pelanggan">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Alamat Lengkap <sup>*</sup></label>
                        <input type="text" class="form-control" value="<?= session('alamat') ?>" name="alamat">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Nomor Hp<sup>*</sup></label>
                        <input type="text" class="form-control" value="<?= session('nomor_telepon') ?>" name="nomor_telepon">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Alamat Email<sup>*</sup></label>
                        <input type="email" class="form-control" value="<?= session('email') ?>" name="email">
                    </div>
                    <br>
                    <div class="form-item">
                        <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Catatan Pesanan (Opsional)"></textarea>
                    </div>
                </div>

                <!-- Rincian Pembelian -->
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="table-responsive">
                        <!-- Tabel Produk -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah Pembelian</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataToRecord as $record) : ?>
                                    <!-- Product Row -->
                                    <tr class="product-row">
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('public/produk/img/' . $record['foto']); ?>" alt="Product Image" class="flex-shrink-0" style="max-width:125px;">
                                            </div>
                                        </th>
                                        <td>
                                            <p class="mb-0 mt-4"><?= $record['nama_produk'] ?></p>
                                        </td>
                                        <td class="price">
                                            <p class="mb-0 mt-4"><?= 'Rp ' . number_format($record['harga'], 0, ",", "."); ?></p>
                                        </td>
                                        <td>
                                            <div class="input-group quantity mt-4" style="width: 100px;">
                                                <input type="number" class="form-control form-control-sm text-center border-0 quantity-input" value="<?= $record['jumlah_pembelian'] ?>">
                                            </div>
                                        </td>
                                        <td class="total">
                                            <p class="mb-0 mt-4"><?= 'Rp ' . number_format($record['total'], 0, ",", "."); ?></p>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>

                        <!-- Subtotal Section -->
                        <div class="subtotal-section">
                            <h4 class="mt-4">Total: <span id="subtotal"><?= 'Rp ' . number_format(array_sum(array_column($dataToRecord, 'total')), 0, ",", "."); ?></span></h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Buat Pesanan -->
            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Buat
                    Pesanan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>