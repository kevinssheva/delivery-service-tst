<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <h2 class="mt-3 text-center">Ini daftar pesanan</h2>
  <div class="row">
    <?php foreach ($produk as $p) : ?>
      <div class="card mx-3 my-1" style="width: 18rem;">
        <img src="/img/<?= $p['gambarFileName']; ?>" alt="<?= $p['id_pesanan']; ?>" style="width: 100%; aspect-ratio: 3/2; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title"><?= $p['total_harga']; ?></h5>
          <p class="card-text"><?= $p['nama_penerima']; ?></p>
          <p class="card-text"><?= $p['alamat']; ?></p>
          <p class="card-text"><?= $p['jumlah_produk']; ?> buah</p>
        </div>
        <div class="card-footer text-center">
          <a href="/pengiriman/<?= $p['id_pesanan']; ?>" class="btn btn-primary">Detail</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?= $this->endSection(); ?>