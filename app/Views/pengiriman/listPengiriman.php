<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h2 class="mt-3 text-left fw-bold">Riwayat Pengiriman</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success my-2" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row container-card justify-content-start">
        <?php foreach ($pengiriman as $p) : ?>
            <div class="card mx-3 my-3 py-2" style="width: 18rem;">
                <div class="card-header" style="background-color: #c9caca">
                    <?= $p['nama_penerima']; ?>
                </div>
                <div class="card-body">
                    <p class="card-text">Alamat: <?= $p['alamat_tujuan']; ?></p>
                    <p class="card-text">Tanggal: <?= $p['tanggal_pengiriman']; ?></p>
                    <p class="card-text">Status: <strong><?= $p['status']; ?></strong></p>
                </div>
                <a href="/pengiriman/detail/<?= $p['id']; ?>" class="btn btn-outline-primary">Detail</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>