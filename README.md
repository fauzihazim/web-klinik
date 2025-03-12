# **Web Klinik**
Web Klinik adalah sebuah platform untuk layanan dasar klinik yang memfasilitasi pembuatan resep dan pemeriksaan pasien, registrasi pasien, serta pencatatan masuk obat dan keluar.

## Teknologi
- MySql
- PHP
- HTML
- CSS

## Fitur Utama
1. **Registrasi Pasien**
    - Memungkinkan pendaftaran pasien baru.
2. **Manajemen Obat**
    - Membuat, memperbarui, menghapus data obat, dan pencatatan obat keluar.
3. **Dokumen Resep dan Pemeriksaan Pasien**
    - Membuat dokumen resep dan pemeriksaan pasien.

## Instalasi
> Note :
Pastikan anda sudah menginstall laragon, PHP 8.1.10, dan MySql versi 8.0.30 untuk menghindari compatibility issue.

1. Masuk pada folder laragon/www
2. Clone repository dengan perintah pada CMD atau terminal :
    ```bash
    git clone https://github.com/yourusername/web-klinik.git
3. Menyalakan Laragon
4. Membuat DB
- membuat Database
    ```bash
    CREATE DATABASE webklinik;
- membuat table database
    ```bash
    CREATE TABLE dokter (
        idDokter int NOT NULL AUTO_INCREMENT,
        namaDokter varchar(255) NOT NULL,
        spesialisasi varchar(255) NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        harga int NOT NULL,
        PRIMARY KEY (idDokter),
        UNIQUE KEY namaDokter (namaDokter)
    );
    CREATE TABLE obat (
        idObat int NOT NULL AUTO_INCREMENT,
        namaObat varchar(255) NOT NULL,
        stokObat int NOT NULL,
        harga int NOT NULL,
        PRIMARY KEY (idObat),
        UNIQUE KEY namaObat (namaObat)
    );
    CREATE TABLE obatkeluar (
        idObatKeluar int NOT NULL AUTO_INCREMENT,
        idTransaksi int NOT NULL,
        idObat int NOT NULL,
        PRIMARY KEY (idObatKeluar)
    );
    CREATE TABLE pasien (
        idPasien int NOT NULL AUTO_INCREMENT,
        namaPasien varchar(255) NOT NULL,
        beratBadanPasien int NOT NULL,
        umurPasien int NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (idPasien),
        UNIQUE KEY namaPasien (namaPasien)
    );
    CREATE TABLE transaksi (
        idTransaksi int NOT NULL AUTO_INCREMENT,
        idPasien int NOT NULL,
        idDokter int NOT NULL,
        harga int NOT NULL,
        diagnosa varchar(255) NOT NULL,
        catatan varchar(255) NOT NULL,
        create_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (idTransaksi)
    );


## Penulis
Fauzi Hazim Wibowo: [GitHub Profile](https://github.com/fauzihazim)
