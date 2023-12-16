<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
  <form action="/pengiriman/create" method="post">
    <h1 class="mb-3 fw-bold">Order Delivery</h1>
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
              <p class="text-center">Assign Driver</p>
              <select class="form-select" style="width: 50%;" aria-label="Default select example" id="driverSelect" name="id_driver">
                <option selected disabled>Select Driver</option>
                <?php foreach ($driver as $d) : ?>
                  <option value="<?= $d['id']; ?>" data-plate="<?= $d['plat']; ?>" telepon="<?= $d['no_telepon']; ?>"><?= $d['nama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </li>
          <li class="list-group-item">
            <div class="d-flex justify-content-between">
              <p class="text-center">No Telepon</p>
              <p id="phoneNumber">-</p>
            </div>
          </li>
          <li class="list-group-item">
            <div class="d-flex justify-content-between">
              <p class="text-center">Plat Nomor</p>
              <p id="plateNumber">-</p>
            </div>
          </li>
          <li class="list-group-item">
            <div class="d-flex justify-content-end">
              <input type="hidden" name="id_pesanan" value="<?= $pesanan['id_pesanan']; ?>">
              <input type="hidden" name="alamat" id="alamat" value="<?= $pesanan['alamat']; ?>">
              <input type="hidden" name="nama_penerima" id="nama_penerima" value="<?= $pesanan['nama_penerima']; ?>">
              <input type="hidden" name="telepon_penerima" id="telepon_penerima" value="<?= $pesanan['telepon']; ?>">
              <button type="submit" class="btn btn-primary">Assign</button>
            </div>
          </li>
        </ul>
      </div>
  </form>
</div>
<script>
  // Ambil elemen select dan div plat nomor menggunakan JavaScript
  const driverSelect = document.getElementById('driverSelect');
  const plateNumberDiv = document.getElementById('plateNumber');
  const phoneNumberDiv = document.getElementById('phoneNumber');

  // Tambahkan event listener untuk mendeteksi perubahan pada elemen select
  driverSelect.addEventListener('change', function() {
    // Ambil plat nomor dari atribut data-plate
    const selectedOption = this.options[this.selectedIndex];
    const plateNumber = selectedOption.getAttribute('data-plate');
    const phoneNumber = selectedOption.getAttribute('telepon');

    // Tampilkan plat nomor di dalam div
    plateNumberDiv.textContent = `${plateNumber}`;
    phoneNumberDiv.textContent = `${phoneNumber}`;
  });
</script>

</div>
<?= $this->endSection(); ?>