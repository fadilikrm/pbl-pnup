<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tabel Produk Terlaris Tahunan</h1>
    <p class="mb-4">Tabel ini merupakan table yang menampilkan data produk terlaris tahunan</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #d4a762;">Data Produk Terlaris Tahunan</h6>
        </div>
        <div class="card-body">
            <div class="text-weight mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detail_produk_terlaris_tahunan as $row) : ?>
                                    <tr>
                                        <td><?= $row->date; ?></td>
                                        <td> <?= $row->nama_produk . ' : ' . $row->jumlah_beli_produk . ' Terjual' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>