<div align="center">
    <h1 align="center">
    <span style="color: white; font-weight: bold;">TUGAS BESAR II3160 Teknolohgi Sistem Terintegrasi</span>
    </h1>
</div>

<div align="center">
    <a href="https://git.io/typing-svg"><img src="https://readme-typing-svg.demolab.com?font=Fira+Code&pause=1000&random=false&width=435&lines=Kelompok+19+Kelas+01+TST" alt="Typing SVG" /></a>
</div>

## **Author**

<p align="center"> 
<table>
    <tr>
        <td colspan=4 align="center">Kelompok 19</td>
    </tr>
    <tr>
        <td>No.</td>
        <td>Nama</td>
        <td>NIM</td>
        <td>Email</td>
    </tr>
    <tr>
        <td>1.</td>
        <td>Ibnu Khairy Algifari</td>
        <td>18221091</td>
        <td><a href="mailto:18221091@std.stei.itb.ac.id">18221091@std.stei.itb.ac.id</a></td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Ken Azizan</td>
        <td>18221105</td>
        <td><a href="mailto:18221107@std.stei.itb.ac.id">18221107@std.stei.itb.ac.id</a></td>
    </tr>
    <tr>
        <td>3.</td>
        <td>Lie, Kevin Sebastian S.T.</td>
        <td>18221133</td>
        <td><a href="mailto:18221143@std.stei.itb.ac.id">18221143@std.stei.itb.ac.id</a></td>
    </tr>
</table>
</p>

<br>

## **App Specification**
<p>
    Aplikasi ini melakukan pengambilan data pesanan dan meminta admin untuk melakkukan <i>assign</i> driver agar produk dapat dikirimkan. Aplikasi ini juga memungkinkan admin untuk meng-<i>update</i> status pengiriman sehingga pengguna dapat melihat statusnya secara dinamis
</p>

<br>

## **Preparation**
1. Open terminal</br>

2. Clone repository ini</br>
```bash
    git clone https://github.com/kevinssheva/delivery-service-tst.git
```

3. Masuk ke local repository folder</br>
```bash
    cd delivery-service-tst
```

4. Install all dependencies dengan telah menginstall composer terlebih dahulu</br>
```bash
    composer update
```

5. Buka xampp</br>

6. Jalankan Apache dan mySQL</br>

7. Buka VSCode jika belum</br>

8. Buka file env.example dan uncomment 7 konfigurasi terbawah</br>

9. Buka phpMyAdmin</br>

10. Buat database baru dengan nama "delivery_db"

11. Buka terminal baru</br>

12. Migrasi data ke database</br>
```bash
    php spark migrate
```

13. Seed data dengan melakukan</br>
```bash
    php spark db:seed AllSeeder
```
<br>
14. Selesai

## **How To Run**
1. Buka terminal</br>

2. Jalankan Aplikasi</br>
```bash
    php spark serve --port 8081
```

## **Akun Untuk melakukan login**
<p align="center"> 
<table>
    <tr>
        <td colspan=3 align="center">Kelompok 19</td>
    </tr>
    <tr>
        <td>No.</td>
        <td>Username</td>
        <td>Password</td>
    </tr>
    <tr>
        <td>1.</td>
        <td>admin1</td>
        <td>admin1</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>admin2</td>
        <td>admin2</td>
    </tr>
</table>
</p>

