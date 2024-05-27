CREATE DATABASE db_sibarang2;

USE db_sibarang2;

CREATE TABLE admin (
    id_admin CHAR(10) PRIMARY KEY,
    nama_admin VARCHAR(50),
    alamat_admin VARCHAR(255),
    posisi_admin VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE karyawan (
    id_karyawan CHAR(10) PRIMARY KEY,
    nama_karyawan VARCHAR(50),
    alamat_karyawan VARCHAR(255),
    posisi_karyawan VARCHAR(50)
);

CREATE TABLE barang (
    kode_barang CHAR(6) PRIMARY KEY,
    nama_barang VARCHAR(50),
    jumlah INT(10)
);

CREATE TABLE profile (
    id INT(10) PRIMARY KEY  AUTO_INCREMENT,
    appName VARCHAR(50),
    companyName VARCHAR(100)
);

CREATE TABLE peminjaman (
    kode_peminjaman CHAR(12) PRIMARY KEY,
    id_admin CHAR(10),
    id_karyawan CHAR(10),
    status VARCHAR(25),
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_karyawan) REFERENCES karyawan(id_karyawan) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE detail_peminjaman (
    id_detail_peminjaman INT(10) PRIMARY KEY AUTO_INCREMENT,
    kode_peminjaman CHAR(12),
    kode_barang CHAR(6),
    tgl DATE,
    FOREIGN KEY (kode_peminjaman) REFERENCES peminjaman (kode_peminjaman) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (kode_barang) REFERENCES barang(kode_barang) ON DELETE CASCADE ON UPDATE CASCADE
);



-- Tabel admin
INSERT INTO admin (id_admin, nama_admin, alamat_admin, posisi_admin, password) VALUES
('K202405001', 'Chitos', 'Denpasar, bali', 'Posisi 2', 'ch1');

-- Tabel karyawan
INSERT INTO karyawan (id_karyawan, nama_karyawan, alamat_karyawan, posisi_karyawan) VALUES
('K202405011', 'Karyawan 1', 'Denpasar, Bali', 'Posisi 1'),
('K202405012', 'Karyawan 2', 'Denpasar, Bali', 'Posisi 2');

-- Tabel barang
INSERT INTO barang (kode_barang, nama_barang, jumlah) VALUES
('BRG001', 'Barang 1', 10),
('BRG002', 'Barang 2', 20),
('BRG003', 'Barang 3', 20),
('BRG004', 'Barang 4', 20),
('BRG005', 'Barang 5', 20),
('BRG006', 'Barang 6', 20);

-- Tabel profile
INSERT INTO profile (appName, companyName) VALUES
('SIBARANG', 'PT. MABUK KODING');



