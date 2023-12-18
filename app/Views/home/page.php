<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <h2 class="mt-3 text-center">Ini daftar pesanan</h2>
  <div class="row">
    <?php foreach ($pesanan as $p) : ?>
      <div class="card mx-3 my-2 px-0 shadow rounded-3 overflow-hidden border border-0" style="width: 18rem;">
        <div class="card-body">
          <p class="card-title fw-bold">Pesanan <?= $p['id_pesanan']; ?></p>
          <p class="card-text"><?= $p['nama_penerima']; ?></p>
          <p class="card-text"><?= $p['alamat']; ?></p>
          <p class="card-text"><?= $p['jumlah_produk']; ?> buah</p>
          <h5 class="card-title"><?= ucwords($p['tipe_pengiriman']); ?></h5>
        </div>
        <div class="card-footer text-center">
          <a href="/pengiriman/<?= $p['id_pesanan']; ?>" class="btn btn-primary">Detail</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?= $this->endSection(); ?>