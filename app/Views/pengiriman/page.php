<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
  <h1 class="mb-3 fw-bold">Order Delivery</h1>
  <div class="row">
    <div class="col col-6">
      <div class="card rounded overflow-hidden">
        <div class="row g-0">
          <div class="col-md-3 bg-black">
            <img src="/img/hp.jpg" class="gambar-produk img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-6 me-auto">
            <div class="card-body d-flex flex-column h-100">
              <h5 class="card-title">HP MANTEP</h5>
              <p class="card-text">Apa Kek Ini Deskripsi</p>
              <p class="card-text mt-auto"><small class="text-body-secondary fw-semibold">2 x <span id="harga" class="fw-normal">Rp.500,00</span></small></p>
            </div>
          </div>
          <div class="col-md-3 justify-content-center d-flex align-items-center pe-3">
            <p>Rp. 1000,00</p>
          </div>
        </div>
      </div>
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between mt-3">
          <p class="text-center fw-bold">Ongkos Kirim</p>
          <p class="pe-4">Rp. 85000.00</p>
        </li>
      </ul>
    </div>
    <div class="col">
      <ul class="list-group">
        <li class="list-group-item bg-secondary bg-opacity-50 fw-semibold">Order Summary</li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Total Price</p>
            <p>Rp. 85000.00</p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Tipe Pengiriman</p>
            <p>Instant</p>
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
            <p>Kevin Sebastian</p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">No Telepon</p>
            <p>085236961165</p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Alamat</p>
            <p>Jl. Contoh 123</p>
          </div>
        </li>
      </ul>
      <ul class="list-group mt-5">
        <li class="list-group-item bg-secondary bg-opacity-50 fw-semibold">Driver</li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Assign Driver</p>
            <select class="form-select" style="width: 50%;" aria-label="Default select example">
              <option selected disabled>Select Driver</option>
              <option value="1">Asep</option>
              <option value="2">Johnson</option>
              <option value="3">James</option>
            </select>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">No Telepon</p>
            <p>-</p>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between">
            <p class="text-center">Plat Nomor</p>
            <p>-</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

</div>
<?= $this->endSection(); ?>