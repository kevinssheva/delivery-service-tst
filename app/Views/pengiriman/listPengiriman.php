<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h2 class="mt-3 text-center">Ini daftar pengiriman</h2>
    <div class="row container-card justify-content-center">
        <?php $i = 1; ?>
        <?php foreach ($pengiriman as $p) : ?>
            <div class="card mx-3 my-3" style="width: 18rem;">
                <div class="card-header" style="background-color: #c9caca">
                    <?= $p['nama_penerima']; ?>
                </div>
                <div class="card-body">
                    <p class="card-text">Alamat: <?= $p['alamat_tujuan']; ?></p>
                    <p class="card-text">Tanggal: <?= $p['tanggal_pengiriman']; ?></p>
                    <p class="card-text">Telepon: <?= $p['telepon_penerima']; ?></p>
                </div>
                <div class="card-footer">
                    <?= $p['status']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>