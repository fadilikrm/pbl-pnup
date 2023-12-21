<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Manajemen Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="text-weight mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Nomor WhatsApp</th>
                                    <th>Alamat</th>
                                    <th>Total Harga</th>
                                    <th>Status Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Nomor WhatsApp</th>
                                    <th>Alamat</th>
                                    <th>Total Harga</th>
                                    <th>Status Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <td><?= $t['tanggal_transaksi']; ?></td>
                                        <td><?= $t['nama_pelanggan']; ?></td>
                                        <td><?= $t['nomor_telepon']; ?></td>
                                        <td><?= $t['alamat']; ?></td>
                                        <td><?= 'Rp ' . number_format($t['total_harga'], 0, ",", "."); ?></td>
                                        <td><?= $t['status_transaksi']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#lihatModal<?= $t['id_transaksi']; ?>"><i class="fas fa-eye"></i></a>
                                            <div class="modal fade" id="lihatModal<?= $t['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatModalLabel<?= $t['id_transaksi']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document" style="max-width: 540px; width: 100%; margin: 1.75rem auto;">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h3 class="modal-title" id="lihatModalLabel<?= $t['id_transaksi']; ?>"></h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="text-center">Sotang Mangga 3</h4>
                                                            <h5 class="text-center">Jl Poros Mangga 3 Blok B2</h5>
                                                            <h6 class="text-center mb-4"><?= $t['tanggal_transaksi']; ?></h6>
                                                            <p>Nama Pelanggan: <?= $t['nama_pelanggan']; ?></p>
                                                            <p>Nomor Telepon: <?= $t['nomor_telepon']; ?></p>
                                                            <p>Alamat: <?= $t['alamat']; ?></p>
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nama Produk</th>
                                                                        <th>Jumlah Pembelian</th>
                                                                        <th>Harga Satuan</th>
                                                                        <th>Total Harga</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($t['detailTransaksi'] as $detail) : ?>
                                                                        <tr>
                                                                            <td><?= $detail['nama_produk']; ?></td>
                                                                            <td><?= $detail['jumlah_pembelian']; ?></td>
                                                                            <td><?= 'Rp ' . number_format($detail['harga_satuan'], 0, ",", "."); ?></td>
                                                                            <td><?= 'Rp ' . number_format($detail['total_harga_pembelian'], 0, ",", "."); ?></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                            <p>Total Keseluruhan: <?= 'Rp ' . number_format($t['total_harga'], 0, ",", "."); ?></p>
                                                            <p>Catatan Pelanggan: <?= $t['catatan']; ?></p>
                                                            <p>Status Transaksi: <?= $t['status_transaksi']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?= site_url('admin/transaksiedit/' . $t['id_transaksi']); ?>" class="btn btn-warning">Edit</a>
                                            <!-- Tombol untuk membuka modal -->
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $t['id_transaksi']; ?>">Delete</a>

                                            <!-- Modal Konfirmasi Delete -->
                                            <div class="modal fade" id="confirmDeleteModal<?= $t['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel<?= $t['id_transaksi']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel<?= $t['id_transaksi']; ?>">Konfirmasi Penghapusan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus transaksi ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="<?= site_url('admin/transaksidestroy/' . $t['id_transaksi']); ?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
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
<!-- End of Main Content -->
<?= $this->endSection() ?>