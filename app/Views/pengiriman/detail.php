<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
  <h1 class="mb-3 fw-bold">Order Detail</h1>
  <div class="row">
    <div class="col col-6">
      <div class="card rounded overflow-hidden">
        <div class="row g-0">
          <div class="col-md-3 bg-black">
            <img src="/img/<?= $produk['gambar']; ?>" class="gambar-produk img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-6 me-auto">
            <div class="card-body d-flex flex-column h-100">
              <h5 class="card-title"><?= $produk['nama']; ?></h5>
              <p class="card-text"><?= $produk['deskripsi']; ?></p>
              <p class="card-text mt-auto"><small class="text-body-secondary fw-semibold"><?= $pesanan['jumlah_produk']; ?> x <span id="harga" class="fw-normal">Rp. <?= $produk['harga']; ?></span></small></p>
            </div>
          </div>
          <div class="col-md-3 justify-content-center d-flex align-items-center pe-3">
            <?php
            // Mengganti Rp. 1000,00 dengan hasil perkalian harga dan jumlah produk
            $totalHarga = $produk['harga'] * $pesanan['jumlah_produk'];
            ?>
            <p>Rp. <?= number_format($totalHarga, 2, ',', '.'); ?></p>
          </div>
        </div>
      </div>
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between mt-3">
          <p class="text-center fw-bold">Ongkos Kirim</p>
          <?php
          $biayaPengiriman = 0;
          if ($pesanan['tipe_pengiriman'] == 'instant') {
            $biayaPengiriman = 20000;
          } elseif ($pesanan['tipe_pengiriman'] == 'next-day') {
            $biayaPengiriman = 15000;
          } elseif ($pesanan['tipe_pengiriman'] == 'regular') {
            $biayaPengiriman = 5000;
          } ?>
          <p class="pe-4">Rp. <?= number_format($biayaPengiriman, 2, ',', '.'); ?> </p>
        </li>
      </ul>
      <ul class="list-group mt-3">
        <li class="list-group-item bg-secondary bg-opacity-50 fw-semibold">Ganti Status</li>
        <li class="list-group-item">
          <form action="/pengiriman/update" method="post">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div class="d-flex flex-column align-items-end">
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="status">
                  <option value="dikirim">Dikirim</option>
                  <option value="diterima">Diterima</option>
                  <option value="diselesaikan">Diselesaikan</option>
                </select>
              </div>
              <input type="hidden" name="id" value="<?= $pengiriman['id']; ?>">
              <button type="submit" class="btn btn-primary">Change</button>
            </div>
          </form>
        </li>
      </ul>
    </div>
    <div class="col">
      <ul class="list-group">
        <li class="list-group-item bg-secondary bg-opacity-50 fw-semibold">Order Summary</li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Total Price</p>
            <p>Rp. <?= $pesanan['total_harga']; ?></p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Tipe Pengiriman</p>
            <p><?= ucwords(str_replace("-", " ", $pesanan['tipe_pengiriman'])); ?></p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Estimasi Tiba</p>
            <p>28 Desember 2023</p>
          </div>
        </li>
      </ul>
      <ul class="list-group mt-5">
        <li class="list-group-item bg-secondary bg-opacity-50 fw-semibold">Customer Information</li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Nama</p>
            <p><?= $pesanan['nama_penerima']; ?></p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">No Telepon</p>
            <p><?= $pesanan['telepon']; ?></p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Alamat</p>
            <p><?= $pesanan['alamat']; ?></p>
          </div>
        </li>
      </ul>
      <ul class="list-group mt-5">
        <li class="list-group-item bg-secondary bg-opacity-50 fw-semibold">Driver</li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Name</p>
            <p><?= $pengiriman['nama']; ?></p>

          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">No Telepon</p>
            <p id="phoneNumber"><?= $pengiriman['no_telepon']; ?></p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Plat Kendaraan</p>
            <p id="plateNumber"><?= $pengiriman['plat']; ?></p>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <script>

  </script>

</div>
<?= $this->endSection(); ?>