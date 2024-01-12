<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Staff</h1>
<p class="mb-4">Tabel ini merupakan table yang mengelola data staff dengan opsi untuk menambahkan, mengedit, dan menghapus data.</p>
<p>KETERANGAN:</p>
<p><a class="btn btn-warning" style="margin-right: 10px;">
    <i class="fas fa-pencil-alt"></i>
    </a><span>Digunakan untuk mengubah data
</span></p>
    <p><a class="btn btn-danger" style="margin-right: 10px;">
    <i class="fas fa-trash-alt"></i>
    </a><span>Digunakan untuk menghapus data</span></p>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold " style="color: #d4a762;">Data Staff</h6>
        </div>
        <div id="successAlert" class="alert alert-success" role="alert" style="display: none;">
    Data berhasil ditambahkan!
  </div>
        
        <div  id="alertH" class="alert alert-danger alertH" role="alert" style="display: none;">
        Data berhasil dihapus!
        </div>
        <div class="card-body">
            <div class="text-weight mb-3">
                <form action="<?= route_to('stafftambah') ?>">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($staff as $s) : ?>
                                    <tr>
                                        <td><?= $s['nama']; ?></td>
                                        <td> <img src="<?= base_url('public/staff/img/' . $s['foto']); ?>" alt="Foto Profil" style="max-width: 100px;"></td>
                                        <td><?= $s['email']; ?></td>
                                        <td><?= $s['level']; ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/staffedit/' . $s['id_staff']); ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <!-- Tombol untuk membuka modal -->
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $s['id_staff']; ?>"><i class="fas fa-trash-alt"></i></a>

                                            <!-- Modal Konfirmasi Delete -->
                                            <div class="modal fade" id="confirmDeleteModal<?= $s['id_staff']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel<?= $s['id_staff']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel<?= $s['id_staff']; ?>">Konfirmasi Penghapusan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus staff ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="<?= site_url('admin/staffdestroy/' . $s['id_staff']); ?>" class="btn btn-danger">Hapus</a>
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