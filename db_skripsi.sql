-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Agu 2022 pada 12.12
-- Versi server: 10.3.35-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipb8155_db_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nik` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('rt','staff_desa','kepala_desa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`nik`, `nama`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `telepon`, `pekerjaan`, `password`, `level`) VALUES
(313123, 'Aditya', '2022-05-03', 'Laki Laki', 'islam', 'Blok kamis', '3432423', 'Kepala Desa', '1234567', 'kepala_desa'),
(21321312, 'Syarif Maulana', '2022-05-02', 'Laki Laki', 'islam', 'Blok Sabtu', '3223232', 'Staff Desa', '123456', 'staff_desa'),
(23123123, 'Hijaj La Baika', '2022-05-03', 'Laki Laki', 'Islam', 'Blok Jumat', '090009090', 'Mahasiwa', '12345', 'rt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` int(10) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_penduduk`
--

INSERT INTO `data_penduduk` (`id`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `status`, `agama`, `alamat`, `telepon`, `kewarganegaraan`, `pekerjaan`, `password`) VALUES
(21, '3210151110000022', 'Aditya Ramadhan', 'Majalengka', '2000-06-16', 'Laki - Laki', 'Lajang', 'Islam', 'Blok Jumat Rt 02 Desa Jatitujuh', '0876252424245', 'Indonesia', 'Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(22, '3210151110000023', 'Syarif Maulana', 'Majalengka', '2022-07-19', 'Laki - Laki', 'Lajang', 'Islam', 'RT 05', '08767654535', 'Indonesia', 'Pelajar/Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(30, '3210150209000041', 'krisna ardi sugiarto', 'Ciamis', '2022-07-30', 'Laki - Laki', 'Cerai Mati', 'Kristen', 'banjar', '087625242526', 'Irlandia', 'Master Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(31, '3210151110000015', 'Dzikri Maulana', 'Majalengka', '2022-08-02', 'Laki - Laki', 'Lajang', 'Islam', 'Blok Jumat RT 02 RW 01', '087615265276', 'Indonesia', 'Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(32, '3210151110000016', 'Jujun Junaedi', 'Majalengka', '2022-08-05', 'Laki - Laki', 'Lajang', 'Islam', 'Blok Jumat RT 02 RW 01', '0891827363532', 'Indonesia', 'Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(33, '3210151110000021', 'Hijaj La Baika', 'Majalengka', '2000-10-11', 'Laki - Laki', 'Lajang', 'Islam', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', '0891827363532', 'Indonesia', 'Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(34, '3210151110000044', 'Andhika', 'Bekasi', '2022-08-06', 'Laki - Laki', 'Lajang', 'Islam', 'Blok Rabu Rt/Rw 003/001', '081278736873', 'WNI', 'Pelajar/Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(35, '3210151110000050', 'Adam Setiawan', 'Majalengka', '2022-05-09', 'Laki - Laki', 'Kawin', 'Islam', 'Blok Rabu Rt/Rw 003/003', '081278736873', 'WNI', 'Pelajar/Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(36, '3210151110000060', 'Ridho', 'Majalengka', '2002-08-15', 'Laki - Laki', 'Kawin', 'Islam', 'Blok Sabtu Rt/Rw 003/001', '081278736873', 'WNI', 'Pelajar/Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(37, '3210151110000070', 'Imam Maulana', 'Majalengka', '2022-08-20', 'Laki - Laki', 'Lajang', 'Islam', 'Blok Sabtu Rt/Rw 003/001', '081278736873', 'WNI', 'Pelajar/Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(38, '3210151110000080', 'Fajar Maulana', 'Majalengka', '2022-08-27', 'Laki - Laki', 'Lajang', 'Islam', 'Blok Sabtu Rt/Rw 003/001', '081278736873', 'WNI', 'Pelajar/Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b'),
(39, '3210151110000090', 'Lexy sopyan', 'Majalengka', '1999-08-06', 'Laki - Laki', 'Lajang', 'Islam', 'Blok Rabu Rt/Rw 003/001', '081278736873', 'WNI', 'Pelajar/Mahasiswa', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_sip`
--

CREATE TABLE `surat_sip` (
  `sip_id` int(10) NOT NULL,
  `nik_masyarakat_sip` varchar(255) NOT NULL,
  `nama_sip` varchar(255) NOT NULL,
  `alamat_sip` varchar(255) NOT NULL,
  `keperluan_sip` varchar(255) NOT NULL,
  `scan_ktp_sip` varchar(255) NOT NULL,
  `scan_kk_sip` varchar(255) NOT NULL,
  `scan_akta_sip` varchar(255) NOT NULL,
  `tgl_req_sip` datetime NOT NULL,
  `status_sip` enum('acc_rt','acc_staff','belum_acc','acc_desa','selesai','tolak') NOT NULL DEFAULT 'belum_acc',
  `keterangan_sip` varchar(255) NOT NULL DEFAULT 'Pengajuan Anda Sedang Dalam Proses',
  `tanggal_acc` date DEFAULT current_timestamp(),
  `nama_file_sip` varchar(255) NOT NULL,
  `no_surat_sip` varchar(255) NOT NULL,
  `nama_surat_sip` varchar(255) NOT NULL DEFAULT 'SIP',
  `nama_ayah` varchar(255) NOT NULL,
  `nik_ayah` varchar(255) NOT NULL,
  `tempat_lahir_ayah` varchar(255) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `kewarganegaraan_ayah` varchar(255) NOT NULL,
  `agama_ayah` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `alamat_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `nik_ibu` varchar(255) NOT NULL,
  `tempat_lahir_ibu` varchar(255) NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `kewarganegaraan_ibu` varchar(255) NOT NULL,
  `agama_ibu` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `alamat_ibu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_sip`
--

INSERT INTO `surat_sip` (`sip_id`, `nik_masyarakat_sip`, `nama_sip`, `alamat_sip`, `keperluan_sip`, `scan_ktp_sip`, `scan_kk_sip`, `scan_akta_sip`, `tgl_req_sip`, `status_sip`, `keterangan_sip`, `tanggal_acc`, `nama_file_sip`, `no_surat_sip`, `nama_surat_sip`, `nama_ayah`, `nik_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `kewarganegaraan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nik_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `kewarganegaraan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_ibu`) VALUES
(68, '3210151110000022', 'Hijaj La Baika', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Nikah', 'foto ktp.jpg', 'Gambar KK.jpg', 'akta kelahiran.jpg', '2022-07-28 22:35:19', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-07-28', 'SIP - Hijaj La Baika - 427.21_068_DS_VII_2022.pdf', '427.21/068/DS/VII/2022', 'SIP', 'Rosidi', '5414141414141140', 'Majalengka', '2022-07-28', 'Indonesia', 'Islam', 'Konveksi', 'Blok Jumat Jatitujuh', 'Yani Yuliani', '1423524524325765', 'Karawang', '2022-07-28', 'Indonesia', 'Islam', 'Ibu Rumah Tangga', 'Jatitujuh'),
(69, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 05:36:15', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Hijaj La Baika - 427.21_069_DS_VIII_2022.pdf', '427.21/069/DS/VIII/2022', 'SIP', 'Rosidi', '321051245648454', 'Majalengka', '2022-08-06', 'WNI', 'Islam', 'Konveksi', 'Jatitujuh', 'Yani', '32108546481515', 'Karawang', '2022-08-06', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(70, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 05:37:39', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Hijaj La Baika - 427.21_070_DS_VIII_2022.pdf', '427.21/070/DS/VIII/2022', 'SIP', 'Maman', '3216454815464464', 'Majalengka', '2022-08-06', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Wasti', '3210454643181546', 'Tasik', '2022-08-06', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(71, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 05:40:53', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Hijaj La Baika - 427.21_071_DS_VIII_2022.pdf', '427.21/071/DS/VIII/2022', 'SIP', 'Sukari', '3210846451248484', 'Majalengka', '2022-08-06', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Sarkem', '3210846451816434', 'Majalengka', '2022-08-06', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(72, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 05:42:42', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Hijaj La Baika - 427.21_072_DS_VIII_2022.pdf', '427.21/072/DS/VIII/2022', 'SIP', 'Kurnia', '321546484546464', 'Majalengka', '2022-08-11', 'WNI', 'Islam', 'Berdagang', 'Jatitujuh', 'Ros', '32164548464346', 'Karawang', '2022-08-27', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(73, '3210151110000044', 'Andhika', 'Blok Rabu Rt/Rw 003/001', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 06:04:14', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Hijaj La Baika - 427.21_072_DS_VIII_2022.pdf', '427.21/073/DS/VIII/2022', 'SIP', 'Waslim', '321548464649481', 'Majalengka', '2022-08-17', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Susan', '32156494815163', 'Majalengka', '2022-07-12', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(74, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 06:16:35', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Adam Setiawan - 427.21_074_DS_VIII_2022.pdf', '427.21/074/DS/VIII/2022', 'SIP', 'Rasdi', '32156484516188', 'Majalengka', '2022-08-14', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Husni', '321564804846', 'Majalengka', '2022-10-04', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(75, '3210151110000060', 'Ridho', 'Blok Sabtu Rt/Rw 003/001', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 06:28:25', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Ridho - 427.21_075_DS_VIII_2022.pdf', '427.21/075/DS/VIII/2022', 'SIP', 'Dadan', '3216548613484846', 'Majalengka', '2008-08-22', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Opi', '321564948454646', 'Majalengka', '1987-08-20', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(76, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 10:03:51', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Imam Maulana - 427.21_076_DS_VIII_2022.pdf', '427.21/076/DS/VIII/2022', 'SIP', 'Enco', '32156464846131', 'Majalengka', '2022-08-27', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Siti', '321564949161313', 'Majalengka', '2022-08-27', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(77, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 10:06:12', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Imam Maulana - 427.21_077_DS_VIII_2022.pdf', '427.21/077/DS/VIII/2022', 'SIP', 'Enco', '3215161613161661', 'Majalengka', '2022-08-06', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Husni', '3215161616131331', 'Majalengka', '2022-08-20', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(78, '3210151110000080', 'Fajar Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 10:12:57', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Fajar Maulana - 427.21_078_DS_VIII_2022.pdf', '427.21/078/DS/VIII/2022', 'SIP', 'Casmita', '321564364646464', 'Majalengka', '2022-08-27', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Sarkem', '3215613161818161', 'Majalengka', '2022-08-19', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(79, '3210151110000080', 'Fajar Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 14:58:14', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Fajar Maulana - 427.21_079_DS_VIII_2022.pdf', '427.21/079/DS/VIII/2022', 'SIP', 'Novel', '321564984546461', 'Majalengka', '2022-08-17', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Reni', '32154646464644646', 'Majalengka', '2022-08-20', 'WNI', 'Islam', 'IRT', 'Jatitujuh'),
(80, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Menikah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 16:20:05', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-06', 'SIP - Adam Setiawan - 427.21_080_DS_VIII_2022.pdf', '427.21/080/DS/VIII/2022', 'SIP', 'Endi', '3215646481516466', 'Majalengka', '2022-08-25', 'WNI', 'Islam', 'PNS', 'Jatitujuh', 'Lia', '321584646466466', 'Majalengka', '2022-08-20', 'WNI', 'Islam', 'IRT', 'Jatitujuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_sk`
--

CREATE TABLE `surat_sk` (
  `sk_id` int(10) NOT NULL,
  `nik_masyarakat_sk` varchar(255) NOT NULL,
  `nama_sk` varchar(255) NOT NULL,
  `alamat_sk` varchar(255) NOT NULL,
  `keperluan_sk` varchar(255) NOT NULL,
  `scan_suratrs_sk` varchar(255) NOT NULL,
  `scan_kk_sk` varchar(255) NOT NULL,
  `scan_ktp_sk` varchar(255) NOT NULL,
  `tgl_req_sk` datetime NOT NULL,
  `status_sk` enum('acc_rt','acc_staff','belum_acc','acc_desa','selesai','tolak') NOT NULL DEFAULT 'belum_acc',
  `keterangan_sk` varchar(255) NOT NULL DEFAULT 'Pengajuan Anda Sedang Dalam Proses',
  `tanggal_acc_sk` date NOT NULL DEFAULT current_timestamp(),
  `nama_file_sk` varchar(255) NOT NULL,
  `no_surat_sk` varchar(255) NOT NULL,
  `nama_surat_sk` varchar(255) NOT NULL DEFAULT 'SK',
  `nama_anak` varchar(255) NOT NULL,
  `nama_istri` varchar(255) NOT NULL,
  `tgl_lahir_istri` date NOT NULL,
  `agama_istri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_sk`
--

INSERT INTO `surat_sk` (`sk_id`, `nik_masyarakat_sk`, `nama_sk`, `alamat_sk`, `keperluan_sk`, `scan_suratrs_sk`, `scan_kk_sk`, `scan_ktp_sk`, `tgl_req_sk`, `status_sk`, `keterangan_sk`, `tanggal_acc_sk`, `nama_file_sk`, `no_surat_sk`, `nama_surat_sk`, `nama_anak`, `nama_istri`, `tgl_lahir_istri`, `agama_istri`) VALUES
(20, '3210151110000022', 'Hijaj La Baika', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Lahiran', 'suratrs.jpg', 'Gambar KK.jpg', 'foto ktp.jpg', '2022-07-28 22:36:46', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-07-28', 'SK - Hijaj La Baika - 472.11_020_DS_VII_2022.pdf', '472.11/020/DS/VII/2022', 'SK', 'Adel', 'Rizka', '2022-07-28', 'Islam'),
(21, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 05:45:32', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/021/DS/VIII/2022', 'SK', 'Delisha', 'Yuni', '2022-08-15', 'Islam'),
(22, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 05:46:43', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/022/DS/VIII/2022', 'SK', 'Delisha', 'Yuni', '2022-08-06', 'Islam'),
(23, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Ngayun', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 05:50:48', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/023/DS/VIII/2022', 'SK', 'Dika', 'Mia', '2022-08-20', 'Islam'),
(24, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Akta', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 05:51:43', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/024/DS/VIII/2022', 'SK', 'Ainun', 'Delia', '2022-08-02', 'Islam'),
(25, '3210151110000044', 'Andhika', 'Blok Rabu Rt/Rw 003/001', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 06:04:58', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/025/DS/VIII/2022', 'SK', 'Habiba', 'Selda', '2022-08-26', 'Islam'),
(26, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 06:18:08', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/026/DS/VIII/2022', 'SK', 'Monisa', 'Anisa', '2022-08-28', 'Islam'),
(27, '3210151110000060', 'Ridho', 'Blok Sabtu Rt/Rw 003/001', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 06:29:40', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/027/DS/VIII/2022', 'SK', 'Amanda', 'Maimunah', '2022-08-25', 'Islam'),
(28, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 10:05:09', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/028/DS/VIII/2022', 'SK', 'Pujawati', 'Melisa', '2022-08-26', 'Islam'),
(29, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 10:06:49', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/029/DS/VIII/2022', 'SK', 'Anudiyah', 'Nova', '2022-08-26', 'Islam'),
(30, '3210151110000080', 'Fajar Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 10:14:58', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/030/DS/VIII/2022', 'SK', 'Sasa', 'Amanda manopo', '2022-08-27', 'Islam'),
(31, '3210151110000090', 'Lexy sopyan', 'Blok Rabu Rt/Rw 003/001', 'Melahirkan', 'images (8).jpeg', 'images (6).jpeg', 'images (5).jpeg', '2022-08-06 15:04:20', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '472.11/031/DS/VIII/2022', 'SK', 'Neni', 'Uswa', '2022-08-26', 'Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_skck`
--

CREATE TABLE `surat_skck` (
  `skck_id` int(11) NOT NULL,
  `nik_masyarakat_skck` varchar(255) NOT NULL,
  `nama_skck` varchar(255) NOT NULL,
  `alamat_skck` varchar(255) NOT NULL,
  `keperluan_skck` varchar(255) NOT NULL,
  `scan_ktp_skck` varchar(255) NOT NULL,
  `scan_kk_skck` varchar(255) NOT NULL,
  `scan_akta_skck` varchar(255) NOT NULL,
  `tgl_req_skck` datetime NOT NULL,
  `status_skck` enum('acc_rt','acc_staff','belum_acc','acc_desa','selesai','tolak') NOT NULL DEFAULT 'belum_acc',
  `keterangan_skck` varchar(255) NOT NULL DEFAULT 'Pengajuan Anda Sedang Dalam Proses',
  `tanggal_acc_skck` date NOT NULL DEFAULT current_timestamp(),
  `nama_file_skck` varchar(255) NOT NULL,
  `no_surat_skck` varchar(255) NOT NULL,
  `nama_surat_skck` varchar(255) NOT NULL DEFAULT 'SKCK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_skck`
--

INSERT INTO `surat_skck` (`skck_id`, `nik_masyarakat_skck`, `nama_skck`, `alamat_skck`, `keperluan_skck`, `scan_ktp_skck`, `scan_kk_skck`, `scan_akta_skck`, `tgl_req_skck`, `status_skck`, `keterangan_skck`, `tanggal_acc_skck`, `nama_file_skck`, `no_surat_skck`, `nama_surat_skck`) VALUES
(7, '3210151110000022', 'Hijaj La Baika', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Daftar Kerja', 'foto ktp.jpg', 'Gambar KK.jpg', 'akta kelahiran.jpg', '2022-07-28 22:37:25', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-07-28', 'SKCK - Hijaj La Baika - 430_007_DS_VII_2022.pdf', '430/007/DS/VII/2022', 'SKCK'),
(8, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Daftar polisi', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 05:52:29', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/008/DS/VIII/2022', 'SKCK'),
(9, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Daftar Kuliah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 05:52:55', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/009/DS/VIII/2022', 'SKCK'),
(10, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Melamar Kerja', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 05:53:43', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/010/DS/VIII/2022', 'SKCK'),
(11, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Perlombaan', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 05:55:24', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/011/DS/VIII/2022', 'SKCK'),
(12, '3210151110000044', 'Andhika', 'Blok Rabu Rt/Rw 003/001', 'Melamar Kerja', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 06:05:33', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/012/DS/VIII/2022', 'SKCK'),
(13, '3210151110000044', 'Andhika', 'Blok Rabu Rt/Rw 003/001', 'Daftar polisi', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 06:06:02', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/013/DS/VIII/2022', 'SKCK'),
(14, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Daftar Kuliah', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 06:18:40', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/014/DS/VIII/2022', 'SKCK'),
(15, '3210151110000060', 'Ridho', 'Blok Sabtu Rt/Rw 003/001', 'Daftar polisi', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 06:34:09', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/015/DS/VIII/2022', 'SKCK'),
(16, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Daftar polisi', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 10:07:11', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/016/DS/VIII/2022', 'SKCK'),
(17, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Melamar Kerja', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 10:07:34', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/017/DS/VIII/2022', 'SKCK'),
(18, '3210151110000080', 'Fajar Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Melamar Kerja', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 10:15:25', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/018/DS/VIII/2022', 'SKCK'),
(19, '3210151110000090', 'Lexy sopyan', 'Blok Rabu Rt/Rw 003/001', 'Melamar Kerja', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 15:04:43', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/019/DS/VIII/2022', 'SKCK'),
(20, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Daftar polisi', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 15:17:42', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/020/DS/VIII/2022', 'SKCK'),
(21, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Perlombaan', 'images (5).jpeg', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 16:48:57', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '430/021/DS/VIII/2022', 'SKCK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_skd`
--

CREATE TABLE `surat_skd` (
  `skd_id` int(11) NOT NULL,
  `nik_masyarakat_skd` varchar(255) NOT NULL,
  `nama_skd` varchar(255) NOT NULL,
  `alamat_skd` varchar(255) NOT NULL,
  `keperluan_skd` varchar(255) NOT NULL,
  `scan_ktp_skd` varchar(255) NOT NULL,
  `scan_kk_skd` varchar(255) NOT NULL,
  `tgl_req_skd` datetime NOT NULL,
  `status_skd` enum('acc_rt','acc_staff','belum_acc','acc_desa','selesai','tolak') NOT NULL DEFAULT 'belum_acc',
  `keterangan_skd` varchar(255) NOT NULL DEFAULT 'Pengajuan Anda Sedang Dalam Proses',
  `tanggal_acc_skd` date NOT NULL DEFAULT current_timestamp(),
  `nama_file_skd` varchar(255) NOT NULL,
  `no_surat_skd` varchar(255) NOT NULL,
  `nama_surat_skd` varchar(255) NOT NULL DEFAULT 'SKD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_skd`
--

INSERT INTO `surat_skd` (`skd_id`, `nik_masyarakat_skd`, `nama_skd`, `alamat_skd`, `keperluan_skd`, `scan_ktp_skd`, `scan_kk_skd`, `tgl_req_skd`, `status_skd`, `keterangan_skd`, `tanggal_acc_skd`, `nama_file_skd`, `no_surat_skd`, `nama_surat_skd`) VALUES
(7, '3210151110000022', 'Hijaj La Baika', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Pindah', 'foto ktp.jpg', 'Gambar KK.jpg', '2022-07-28 22:38:06', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-07-28', 'SKD - Hijaj La Baika - 400_007_DS_VII_2022.pdf', '400/007/DS/VII/2022', 'SKD'),
(8, '3210151110000015', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01', 'Perpindahan', 'foto ktp.jpg', 'Gambar KK.jpg', '2022-08-02 16:59:04', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-02', 'SKD - Hijaj La Baika - 400_008_DS_VIII_2022.pdf', '400/008/DS/VIII/2022', 'SKD'),
(9, '3210151110000016', 'Jujun Junaedi', 'Blok Jumat RT 02 RW 01', 'Perpindahan', 'foto ktp.jpg', 'Gambar KK.jpg', '2022-08-05 16:34:21', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-05', 'SKD - Jujun Junaedi - 400_009_DS_VIII_2022.pdf', '400/009/DS/VIII/2022', 'SKD'),
(10, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Pindah Kota', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 05:57:07', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/010/DS/VIII/2022', 'SKD'),
(11, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Pindah', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 05:57:36', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/011/DS/VIII/2022', 'SKD'),
(12, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', '-', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 05:59:11', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/012/DS/VIII/2022', 'SKD'),
(13, '3210151110000044', 'Andhika', 'Blok Rabu Rt/Rw 003/001', 'Pindah', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 06:10:26', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/013/DS/VIII/2022', 'SKD'),
(14, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Pindah', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 06:22:17', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/014/DS/VIII/2022', 'SKD'),
(15, '3210151110000060', 'Ridho', 'Blok Sabtu Rt/Rw 003/001', 'Pindah', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 06:34:44', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/015/DS/VIII/2022', 'SKD'),
(16, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Pindah', 'images (6).jpeg', 'images (7).jpeg', '2022-08-06 10:08:06', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/016/DS/VIII/2022', 'SKD'),
(17, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Pindah', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 10:08:27', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/017/DS/VIII/2022', 'SKD'),
(18, '3210151110000090', 'Lexy sopyan', 'Blok Rabu Rt/Rw 003/001', 'Pindah', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 15:05:02', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/018/DS/VIII/2022', 'SKD'),
(19, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Pindah', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 15:17:19', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/019/DS/VIII/2022', 'SKD'),
(20, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Pindah Kota', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 16:46:48', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/020/DS/VIII/2022', 'SKD'),
(21, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Pindah', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 16:47:29', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/021/DS/VIII/2022', 'SKD'),
(22, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Pindah Kota', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 16:49:27', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '400/022/DS/VIII/2022', 'SKD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_sku`
--

CREATE TABLE `surat_sku` (
  `sku_id` int(11) NOT NULL,
  `nik_masyarakat_sku` varchar(255) NOT NULL,
  `nama_sku` varchar(255) NOT NULL,
  `alamat_sku` varchar(255) NOT NULL,
  `keperluan_sku` varchar(255) NOT NULL,
  `scan_ktp_sku` varchar(255) NOT NULL,
  `scan_kk_sku` varchar(255) NOT NULL,
  `tgl_req_sku` datetime NOT NULL,
  `status_sku` enum('acc_rt','acc_staff','belum_acc','acc_desa','selesai','tolak') NOT NULL DEFAULT 'belum_acc',
  `keterangan_sku` varchar(255) NOT NULL DEFAULT 'Pengajuan Anda Sedang Dalam Proses',
  `tanggal_acc_sku` date NOT NULL DEFAULT current_timestamp(),
  `nama_file_sku` varchar(255) NOT NULL,
  `no_surat_sku` varchar(255) NOT NULL,
  `nama_surat_sku` varchar(255) NOT NULL DEFAULT 'SKU',
  `tahun_berdiri` varchar(255) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_sku`
--

INSERT INTO `surat_sku` (`sku_id`, `nik_masyarakat_sku`, `nama_sku`, `alamat_sku`, `keperluan_sku`, `scan_ktp_sku`, `scan_kk_sku`, `tgl_req_sku`, `status_sku`, `keterangan_sku`, `tanggal_acc_sku`, `nama_file_sku`, `no_surat_sku`, `nama_surat_sku`, `tahun_berdiri`, `nama_usaha`) VALUES
(13, '3210151110000022', 'Hijaj La Baika', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Usaha', 'foto ktp.jpg', 'Gambar KK.jpg', '2022-07-25 19:07:12', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-07-25', 'SKU - Hijaj La Baika - 900_013_DS_VII_2022.pdf', '900/013/DS/VII/2022', 'SKU', '2121', 'asdas'),
(14, '3210151110000022', 'Hijaj La Baika', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Usaha', 'foto ktp.jpg', 'Gambar KK.jpg', '2022-07-28 22:38:54', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-07-28', 'SKU - Hijaj La Baika - 900_014_DS_VII_2022.pdf', '900/014/DS/VII/2022', 'SKU', '2020', 'Konveksi La Baika'),
(15, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 06:01:20', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/015/DS/VIII/2022', 'SKU', '2018', 'Clothing'),
(16, '3210151110000044', 'Andhika', 'Blok Rabu Rt/Rw 003/001', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 06:11:17', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/016/DS/VIII/2022', 'SKU', '2015', 'Konveksi'),
(17, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 06:23:54', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/017/DS/VIII/2022', 'SKU', '2012', 'Adam Elektronik'),
(18, '3210151110000060', 'Ridho', 'Blok Sabtu Rt/Rw 003/001', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 06:36:38', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/018/DS/VIII/2022', 'SKU', '2019', 'Toko sembako'),
(19, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 10:09:33', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/019/DS/VIII/2022', 'SKU', '2020', 'Seblak Legit'),
(20, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 10:09:59', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/020/DS/VIII/2022', 'SKU', '2016', 'Labaika sablon'),
(21, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 15:16:56', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/021/DS/VIII/2022', 'SKU', '2021', 'Seblak Legit'),
(22, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 16:18:45', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/022/DS/VIII/2022', 'SKU', '2015', 'Seblak Legit'),
(23, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 16:43:14', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/023/DS/VIII/2022', 'SKU', '2016', 'Seblak Legit'),
(24, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 16:45:02', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/024/DS/VIII/2022', 'SKU', '2016', 'Konveksi'),
(25, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Usaha', 'images (5).jpeg', 'images (6).jpeg', '2022-08-06 16:52:00', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '900/025/DS/VIII/2022', 'SKU', '2015', 'Adam Elektronik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_sppktp`
--

CREATE TABLE `surat_sppktp` (
  `sppktp_id` int(11) NOT NULL,
  `nik_masyarakat_sppktp` varchar(255) NOT NULL,
  `nama_sppktp` varchar(255) NOT NULL,
  `alamat_sppktp` varchar(255) NOT NULL,
  `keperluan_sppktp` varchar(255) NOT NULL,
  `scan_kk_sppktp` varchar(255) NOT NULL,
  `tgl_req_sppktp` datetime NOT NULL,
  `status_sppktp` enum('acc_rt','acc_staff','belum_acc','acc_desa','selesai','tolak') NOT NULL DEFAULT 'belum_acc',
  `keterangan_sppktp` varchar(255) NOT NULL DEFAULT 'Pengajuan Anda Sedang Dalam Proses',
  `tanggal_acc_sppktp` date NOT NULL DEFAULT current_timestamp(),
  `nama_file_sppktp` varchar(255) NOT NULL,
  `no_surat_sppktp` varchar(255) NOT NULL,
  `nama_surat_sppktp` varchar(255) NOT NULL DEFAULT 'SPPKTP',
  `rt_rw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_sppktp`
--

INSERT INTO `surat_sppktp` (`sppktp_id`, `nik_masyarakat_sppktp`, `nama_sppktp`, `alamat_sppktp`, `keperluan_sppktp`, `scan_kk_sppktp`, `tgl_req_sppktp`, `status_sppktp`, `keterangan_sppktp`, `tanggal_acc_sppktp`, `nama_file_sppktp`, `no_surat_sppktp`, `nama_surat_sppktp`, `rt_rw`) VALUES
(8, '3210151110000022', 'Hijaj La Baika', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Kursus Bahasa', 'Gambar KK.jpg', '2022-07-28 22:39:34', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-07-28', 'SPPKTP - Hijaj La Baika - 470_008_DS_VII_2022.pdf', '470/008/DS/VII/2022', 'SPPKTP', '02/01'),
(9, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Pelatihan', 'Gambar KK.jpg', '2022-08-05 20:41:20', 'selesai', 'Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya.', '2022-08-05', 'SPPKTP - Hijaj La Baika - 470_009_DS_VIII_2022.pdf', '470/009/DS/VIII/2022', 'SPPKTP', '002/001'),
(10, '3210151110000021', 'Hijaj La Baika', 'Blok Jumat RT 02 RW 01 Desa Jatitujuh', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 06:01:39', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/010/DS/VIII/2022', 'SPPKTP', '02/01'),
(11, '3210151110000044', 'Andhika', 'Blok Rabu Rt/Rw 003/001', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 06:11:40', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/011/DS/VIII/2022', 'SPPKTP', '006/002'),
(12, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 06:24:13', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/012/DS/VIII/2022', 'SPPKTP', '005/001'),
(13, '3210151110000060', 'Ridho', 'Blok Sabtu Rt/Rw 003/001', 'Kursus Bahasa', 'images (6).jpeg', '2022-08-06 09:59:32', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/013/DS/VIII/2022', 'SPPKTP', '005/002'),
(14, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Kursus Bahasa', 'images (6).jpeg', '2022-08-06 10:10:27', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/014/DS/VIII/2022', 'SPPKTP', '005/002'),
(15, '3210151110000070', 'Imam Maulana', 'Blok Sabtu Rt/Rw 003/001', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 10:10:43', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/015/DS/VIII/2022', 'SPPKTP', '02/01'),
(16, '3210151110000050', 'Adam Setiawan', 'Blok Rabu Rt/Rw 003/003', 'Kursus Bahasa', 'images (6).jpeg', '2022-08-06 15:16:27', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/016/DS/VIII/2022', 'SPPKTP', '005/002'),
(17, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 16:41:24', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/017/DS/VIII/2022', 'SPPKTP', '006/002'),
(18, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Kursus Bahasa', 'images (6).jpeg', '2022-08-06 16:46:08', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/018/DS/VIII/2022', 'SPPKTP', '02/01'),
(19, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Kursus Bahasa', 'images (6).jpeg', '2022-08-06 16:46:23', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/019/DS/VIII/2022', 'SPPKTP', '006/002'),
(20, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 16:47:45', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/020/DS/VIII/2022', 'SPPKTP', '005/001'),
(21, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 16:49:40', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/021/DS/VIII/2022', 'SPPKTP', '005/002'),
(22, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 16:49:59', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/022/DS/VIII/2022', 'SPPKTP', '005/002'),
(23, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 16:50:33', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/023/DS/VIII/2022', 'SPPKTP', '005/002'),
(24, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 16:50:52', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/024/DS/VIII/2022', 'SPPKTP', '02/01'),
(25, '3210151110000022', 'Aditya Ramadhan', 'Blok Jumat Rt 02 Desa Jatitujuh', 'Daftar Kuliah', 'images (6).jpeg', '2022-08-06 16:51:37', 'acc_staff', 'Data lengkap! Surat sedang di proses oleh kepala desa', '2022-08-06', '', '470/025/DS/VIII/2022', 'SPPKTP', '005/002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_sip`
--
ALTER TABLE `surat_sip`
  ADD PRIMARY KEY (`sip_id`);

--
-- Indeks untuk tabel `surat_sk`
--
ALTER TABLE `surat_sk`
  ADD PRIMARY KEY (`sk_id`);

--
-- Indeks untuk tabel `surat_skck`
--
ALTER TABLE `surat_skck`
  ADD PRIMARY KEY (`skck_id`);

--
-- Indeks untuk tabel `surat_skd`
--
ALTER TABLE `surat_skd`
  ADD PRIMARY KEY (`skd_id`);

--
-- Indeks untuk tabel `surat_sku`
--
ALTER TABLE `surat_sku`
  ADD PRIMARY KEY (`sku_id`);

--
-- Indeks untuk tabel `surat_sppktp`
--
ALTER TABLE `surat_sppktp`
  ADD PRIMARY KEY (`sppktp_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `nik` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23123124;

--
-- AUTO_INCREMENT untuk tabel `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `surat_sip`
--
ALTER TABLE `surat_sip`
  MODIFY `sip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `surat_sk`
--
ALTER TABLE `surat_sk`
  MODIFY `sk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `surat_skck`
--
ALTER TABLE `surat_skck`
  MODIFY `skck_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `surat_skd`
--
ALTER TABLE `surat_skd`
  MODIFY `skd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `surat_sku`
--
ALTER TABLE `surat_sku`
  MODIFY `sku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `surat_sppktp`
--
ALTER TABLE `surat_sppktp`
  MODIFY `sppktp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
