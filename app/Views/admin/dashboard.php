<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>

<!-- Omset Harian -->
<div class="row">
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card" style="border-left: 4px solid #d4a762; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); height: 100%; padding: 0.5rem;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4a762;">Omset Harian</div>
                        <?php foreach ($total_harian as $row) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= 'Rp ' . number_format($row->total_harian, 0, ',', '.') ?>
                            </div>
                        <?php endforeach; ?>
                        <a href="<?= route_to('dashboardomsetharian') ?>" style="background-color: #d4a762; border-color: #d4a762; color: white;" class="btn btn-primary mt-3">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Omset Bulanan -->
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card" style="border-left: 4px solid #d4a762; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); height: 100%; padding: 0.5rem;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4a762;">Omset Bulanan</div>
                        <?php foreach ($total_bulanan as $row) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= 'Rp ' . number_format($row->total_bulanan, 0, ',', '.') ?>
                            </div>
                        <?php endforeach; ?>
                        <a href="<?= route_to('dashboardomsetbulanan') ?>" style="background-color: #d4a762; border-color: #d4a762; color: white;" class="btn btn-primary mt-3">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Omset Tahunan -->
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card" style="border-left: 4px solid #d4a762; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); height: 100%; padding: 0.5rem;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4a762;">Omset Tahunan</div>
                        <?php foreach ($total_tahunan as $row) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= 'Rp ' . number_format($row->total_tahunan, 0, ',', '.') ?>
                            </div>
                        <?php endforeach; ?>
                        <a href="<?= route_to('dashboardomsettahunan') ?>" style="background-color: #d4a762; border-color: #d4a762; color: white;" class="btn btn-primary mt-3">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Harian -->
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card" style="border-left: 4px solid #d4a762; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); height: 100%; padding: 0.5rem;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4a762;">Produk Terlaris Harian</div>
                        <?php foreach ($produk_terlaris_harian as $row) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $row->nama_produk . ' : ' . $row->jumlah_beli_produk . ' Terjual' ?>
                            </div>
                        <?php endforeach; ?>
                        <!-- Detail Link -->
                        <a href="<?= route_to('dashboardprodukharian') ?>" style="background-color: #d4a762; border-color: #d4a762; color: white;" class="btn btn-primary mt-3">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk bulanan -->
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card" style="border-left: 4px solid #d4a762; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); height: 100%; padding: 0.5rem;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4a762;">Produk Terlaris Bulanan</div>
                        <?php foreach ($produk_terlaris_bulanan as $row) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $row->nama_produk . ' : ' . $row->jumlah_beli_produk . ' Terjual' ?>
                            </div>
                        <?php endforeach; ?>
                        <!-- Detail Link -->
                        <a href="<?= route_to('dashboardprodukbulanan') ?>" style="background-color: #d4a762; border-color: #d4a762; color: white;" class="btn btn-primary mt-3">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk tahunan -->
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card" style="border-left: 4px solid #d4a762; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); height: 100%; padding: 0.5rem;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4a762;">Produk Terlaris Tahunan</div>
                        <?php foreach ($produk_terlaris_tahunan as $row) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $row->nama_produk . ' : ' . $row->jumlah_beli_produk . ' Terjual' ?>
                            </div>
                        <?php endforeach; ?>
                        <!-- Detail Link -->
                        <a href="<?= route_to('dashboardproduktahunan') ?>" style="background-color: #d4a762; border-color: #d4a762; color: white;" class="btn btn-primary mt-3">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?= $this->endSection() ?>