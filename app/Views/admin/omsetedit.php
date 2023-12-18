<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Omset</h1>
    <p class="mb-4">Gunakan form di bawah ini untuk mengedit data omset.</p>
    <div class="table-responsive">
        <form action="<?= route_to('omseteditstore') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_omset" value="<?= $omset['id_omset']; ?>">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Produk Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="date" class="form-control form-control-sm text-center border-0" name="date" value="<?= $omset['date']; ?>">
                        </td>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url('public/produk/img/' . $omset['foto']); ?>" alt="Foto Produk" style="max-width: 100px;">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4"><?= $omset['nama_produk']; ?></p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4"><?= 'Rp ' . number_format($omset['harga'], 0, ",", "."); ?></p>
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <input type="number" class="form-control form-control-sm text-center border-0" name="jumlah_beli_produk" value="<?= $omset['jumlah_beli_produk']; ?>">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <div class="row">
                    <!-- Right Section -->
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>