<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Produk</h1>
    <p class="mb-4">Tabel ini merupakan table yang mengelola data produk dengan opsi untuk menambahkan,mengedit dan menghapus data.</p>
    <p>KETERANGAN:</p>
<p><a  class="btn btn-warning"style="margin-right: 10px;">
    <i class="fas fa-pencil-alt"></i>
    </a><span>Digunakan untuk mengubah data</span></p>
    <p><a  class="btn btn-danger" style="margin-right: 10px;">
    <i class="fas fa-trash-alt"></i>
    </a><span>Digunakan untuk menghapus data</span></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold " style="color: #d4a762;">Data Produk</h6>
        </div>
        <div class="card-body">
            <div class="text-weight mb-3">
                <form action="<?= route_to('produktambah') ?>"  enctype="multipart/form-data">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($produk as $pr) : ?>
                                    <tr>
                                        <td><?= $pr['nama_produk']; ?></td>
                                        <td> <img src="<?= base_url('public/produk/img/' . $pr['foto']); ?>" alt="Foto Profil" style="max-width: 100px;"></td>
                                        <td><?= $pr['deskripsi_produk']; ?></td>
                                        <td><?= 'Rp ' . number_format($pr['harga'], 0, ",", "."); ?></td>
                                        <td><?= $pr['status']; ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/produkedit/' . $pr['id_produk']); ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <!-- Tombol untuk membuka modal -->
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $pr['id_produk']; ?>"><i class="fas fa-trash-alt"></i></a>

                                            <!-- Modal Konfirmasi Delete -->
                                            <div class="modal fade" id="confirmDeleteModal<?= $pr['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel<?= $pr['id_produk']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel<?= $pr['id_produk']; ?>">Konfirmasi Penghapusan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus produk ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="<?= site_url('admin/produkdestroy/' . $pr['id_produk']); ?>" class="btn btn-danger">Hapus</a>
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
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection() ?>