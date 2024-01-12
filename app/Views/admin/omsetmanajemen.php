<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Table Omset</h1>
    <p class="mb-4">Tabel ini merupakan table yang mengelola data omset dengan opsi untuk menambahkan, mengedit, dan menghapus data.</p>
    <p>KETERANGAN:</p>
    <p><a class="btn btn-warning" style="margin-right: 10px;">
            <i class="fas fa-pencil-alt"></i>
        </a><span>Digunakan untuk mengubah data</span></p>
    <p><a class="btn btn-danger" style="margin-right: 10px;">
            <i class="fas fa-trash-alt"></i>
        </a><span>Digunakan untuk menghapus data</span></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #d4a762;">Data Omset</h6>
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
                                $datesProcessed = [];
                                foreach ($omset as $index => $o) {
                                    if (!in_array($o['date'], $datesProcessed)) {
                                        $datesProcessed[] = $o['date'];
                                        $productsOnDate = array_filter($omset, function ($item) use ($o) {
                                            return $item['date'] === $o['date'];
                                        });

                                        $rowCount = count($productsOnDate);

                                        foreach ($detail_harian as $omsetHarian) {
                                            if ($omsetHarian->date === $o['date']) {
                                                $totalHarian = $omsetHarian->detail_harian;
                                                break;
                                            }
                                        }
                                        foreach ($productsOnDate as $product) {
                                            echo "<tr>";
                                            if ($product === reset($productsOnDate)) { 
                                                echo "<td rowspan='{$rowCount}'>{$o['date']}</td>";
                                            }
                                            echo "<td>{$product['nama_produk']}</td>";
                                            echo "<td>{$product['jumlah_beli_produk']}</td>";
                                            echo "<td>Rp " . number_format($product['total_harga_produk'], 0, ",", ".") . "</td>";
                                            if ($product === reset($productsOnDate)) { // Check if it's the first product for the date
                                                echo "<td rowspan='{$rowCount}'>Rp " . number_format($totalHarian, 0, ",", ".") . "</td>";
                                            }
                                            echo "<td>";
                                            echo "<a href='" . site_url('admin/omsetedit/' . $product['id_omset']) . "' class='btn btn-warning btn-sm'><i class='fas fa-pencil-alt'></i></a> ";
                                            echo "<a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirmDeleteModal{$o['id_omset']}'><i class='fas fa-trash-alt'></i></a>";
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