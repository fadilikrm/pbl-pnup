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
            <h6 class="m-0 font-weight-bold text-primary">DataTables Manajemen Omset</h6>
        </div>
        <div class="card-body">
            <div class="text-weight mb-3">
                <form action="<?= route_to('omsettambah') ?>" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Pembelian</th>
                                    <th>Total Harga Produk</th>
                                    <th>Total Harga Keseluruhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Pembelian</th>
                                    <th>Total Harga Produk</th>
                                    <th>Total Harga Keseluruhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $currentDate = null;
                                $rowCount = 1;
                                foreach ($omset as $index => $o) {
                                    if ($currentDate !== $o['date']) {
                                        $currentDate = $o['date'];
                                        $rowCount = 1;
                                        foreach ($omset as $countingIndex => $countingItem) {
                                            if ($countingIndex > $index && $countingItem['date'] === $currentDate) {
                                                $rowCount++;
                                            }
                                        }
                                        echo "<tr>";
                                        echo "<td rowspan='{$rowCount}'>{$o['date']}</td>";
                                        echo "<td>{$o['nama_produk']}</td>";
                                        echo "<td>{$o['jumlah_beli_produk']}</td>";
                                        echo "<td>Rp " . number_format($o['total_harga_produk'], 0, ",", ".") . "</td>";
                                        echo "<td rowspan='{$rowCount}'>Rp " . number_format($o['total_keseluruhan'], 0, ",", ".") . "</td>";

                                        echo "<td>";
                                        echo "<a href='" . site_url('admin/omsetedit/' . $o['id_omset']) . "' class='btn btn-warning btn-sm'>Edit</a> ";
                                        echo "<a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirmDeleteModal{$o['id_omset']}'>Delete</a>";
                                        // Modal Konfirmasi Delete
                                        echo "<div class='modal fade' id='confirmDeleteModal{$o['id_omset']}' tabindex='-1' role='dialog' aria-labelledby='confirmDeleteModalLabel{$o['id_omset']}' aria-hidden='true'>";
                                        echo "<div class='modal-dialog' role='document'>";
                                        echo "<div class='modal-content'>";
                                        echo "<div class='modal-header'>";
                                        echo "<h5 class='modal-title' id='confirmDeleteModalLabel{$o['id_omset']}'>Konfirmasi Penghapusan</h5>";
                                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                        echo "<span aria-hidden='true'>×</span>";
                                        echo "</button>";
                                        echo "</div>";
                                        echo "<div class='modal-body'>";
                                        echo "Apakah Anda yakin ingin menghapus data ini?";
                                        echo "</div>";
                                        echo "<div class='modal-footer'>";
                                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>";
                                        echo "<a href='" . site_url('admin/omsetdestroy/' . $o['id_omset']) . "' class='btn btn-danger'>Hapus</a>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>";
                                    } else {
                                        echo "<tr>";
                                        echo "<td>{$o['nama_produk']}</td>";
                                        echo "<td>{$o['jumlah_beli_produk']}</td>";
                                        echo "<td>Rp " . number_format($o['total_harga_produk'], 0, ",", ".") . "</td>";
                                        echo "<td>";
                                        echo "<a href='" . site_url('admin/omsetedit/' . $o['id_omset']) . "' class='btn btn-warning btn-sm'>Edit</a> ";
                                        echo "<a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirmDeleteModal{$o['id_omset']}'>Delete</a>";
                                        // Modal Konfirmasi Delete
                                        echo "<div class='modal fade' id='confirmDeleteModal{$o['id_omset']}' tabindex='-1' role='dialog' aria-labelledby='confirmDeleteModalLabel{$o['id_omset']}' aria-hidden='true'>";
                                        echo "<div class='modal-dialog' role='document'>";
                                        echo "<div class='modal-content'>";
                                        echo "<div class='modal-header'>";
                                        echo "<h5 class='modal-title' id='confirmDeleteModalLabel{$o['id_omset']}'>Konfirmasi Penghapusan</h5>";
                                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                        echo "<span aria-hidden='true'>×</span>";
                                        echo "</button>";
                                        echo "</div>";
                                        echo "<div class='modal-body'>";
                                        echo "Apakah Anda yakin ingin menghapus data ini?";
                                        echo "</div>";
                                        echo "<div class='modal-footer'>";
                                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>";
                                        echo "<a href='" . site_url('admin/omsetdestroy/' . $o['id_omset']) . "' class='btn btn-danger'>Hapus</a>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>