-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2022 at 01:24 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_siselov2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl_absen` datetime NOT NULL,
  `m_mapel_id` varchar(30) NOT NULL,
  `absensi_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl_absen`, `m_mapel_id`, `absensi_active`) VALUES
(1, '2022-02-16 12:00:00', 'MTK02220001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `id` int(11) NOT NULL,
  `absen_id` int(11) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `tgl_absen_siswa` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`id`, `absen_id`, `nisn`, `tgl_absen_siswa`, `status`) VALUES
(1, 1, '99999991', 1644984337, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alat_praktikum`
--

CREATE TABLE `alat_praktikum` (
  `id` int(11) NOT NULL,
  `nama_alat` varchar(200) NOT NULL,
  `matpel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `user_id` int(2) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `matpel_id` int(11) NOT NULL,
  `telephoneg` bigint(13) NOT NULL,
  `alamatg` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `user_id`, `nama_guru`, `matpel_id`, `telephoneg`, `alamatg`) VALUES
(1, '0221916110102777', 3, 'Albertus  Didan Yusuf Okta Rizki Akbar', 1, 89712837987, '<p>Pedurungan Tengah<br></p>'),
(2, '89781923', 6, 'Rizki Akbar', 2, 21038013, '<p>Semarang Barat<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `guru_matpel`
--

CREATE TABLE `guru_matpel` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `h_ujian`
--

CREATE TABLE `h_ujian` (
  `id` int(11) NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `jml_benar` int(11) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_bobot` decimal(10,2) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_ujian`
--

INSERT INTO `h_ujian` (`id`, `ujian_id`, `user_Id`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `nilai_bobot`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(1, 1, 2, '1,4,2', '1:C:N,4:D:Y,2:A:N', 0, '0.00', '100.00', '2022-02-18 10:37:22', '2022-02-18 10:57:22', 'N'),
(2, 4, 1, '1,2,4', '1:B:N,2:B:Y,4:B:N', 1, '33.00', '100.00', '2022-03-13 09:25:37', '2022-03-13 09:45:37', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_identitas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_identitas`) VALUES
(1, 'Laninnya'),
(2, 'Nomor Induk Pegawai'),
(3, 'Nomor Induk Siswa Nasional');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_guru`
--

CREATE TABLE `kelas_guru` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_guru`
--

INSERT INTO `kelas_guru` (`id`, `kelas_id`, `guru_id`) VALUES
(18, 1, 1),
(19, 2, 1),
(21, 3, 1),
(24, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_matpel`
--

CREATE TABLE `kelas_matpel` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_matpel`
--

INSERT INTO `kelas_matpel` (`id`, `kelas_id`, `matpel_id`) VALUES
(2, 1, 3),
(3, 1, 2),
(4, 1, 4),
(5, 1, 5),
(9, 1, 6),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 1, 1),
(15, 2, 1),
(16, 2, 101);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id_matpel` int(11) NOT NULL,
  `nama_matpel` varchar(128) NOT NULL,
  `kode_matpel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id_matpel`, `nama_matpel`, `kode_matpel`) VALUES
(1, 'Matematika', 'MTK'),
(2, 'IPA', 'IPA'),
(3, 'Bahasa Inggris', 'ING'),
(4, 'Bahasa Indonesia', 'IND'),
(5, 'Sejarah Indonesia', 'SJI'),
(6, 'Bahasa Jawa', 'BJW'),
(100, 'Ekonomi', 'EKM'),
(101, 'IPS', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `m_mapel`
--

CREATE TABLE `m_mapel` (
  `id` int(11) NOT NULL,
  `id_m_mapel` varchar(30) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `tgl_mapel` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `dokumen` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mapel`
--

INSERT INTO `m_mapel` (`id`, `id_m_mapel`, `judul`, `keterangan`, `mapel_id`, `kelas_id`, `author`, `tgl_mapel`, `status`, `dokumen`) VALUES
(1, 'MTK02220001', 'Matamatika Kalkulus', '<p>Mempelajari tentang matematika array, dimensi dan index</p>\r\n', 1, 2, '0221916110102777', '2022-02-16 10:00:00', 1, '525-Article_Text-1034-1-10-20171227.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `m_ujian`
--

CREATE TABLE `m_ujian` (
  `id_ujian` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `jenis` enum('acak','urut') NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` datetime NOT NULL,
  `token` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ujian`
--

INSERT INTO `m_ujian` (`id_ujian`, `guru_id`, `matpel_id`, `nama_ujian`, `jumlah_soal`, `waktu`, `jenis`, `tgl_mulai`, `terlambat`, `token`) VALUES
(1, 1, 1, 'Jumat air mata', 3, 20, 'acak', '2022-02-18 10:20:30', '2022-02-19 10:20:34', 'NOMJL'),
(4, 1, 1, 'hgjh', 3, 20, 'acak', '2022-03-09 14:48:41', '2022-03-18 14:48:43', 'NZDCF');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `user_id` int(2) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `dokumen` varchar(200) DEFAULT NULL,
  `tgl_pengumuman` datetime NOT NULL,
  `status_pengumuman` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `user_id`, `judul`, `deskripsi`, `dokumen`, `tgl_pengumuman`, `status_pengumuman`) VALUES
(1, 1, 'Pengumuman Sekolah pelaksanaan libur akhir tahun', '<p>Besok Libur</p>\r\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '', '2022-03-10 11:29:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id` int(15) NOT NULL,
  `id_lawan` int(15) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `nisn` bigint(20) NOT NULL,
  `kelas_id` int(2) DEFAULT NULL,
  `telephone` bigint(13) NOT NULL,
  `alamat` longtext NOT NULL,
  `wali_kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `user_id`, `nama_siswa`, `nisn`, `kelas_id`, `telephone`, `alamat`, `wali_kelas`) VALUES
(1, 2, 'Yusuf Fadhil', 99999991, 2, 0, '', 1),
(3, 6, 'Rizki Akbar', 89781923, NULL, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam_alat`
--

CREATE TABLE `tb_pinjam_alat` (
  `id_pinjam` int(11) NOT NULL,
  `alat_id` int(11) NOT NULL,
  `alat_praktikum` varchar(20) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tb_pinjam_alat`
--
DELIMITER $$
CREATE TRIGGER `update_alat` AFTER INSERT ON `tb_pinjam_alat` FOR EACH ROW BEGIN
UPDATE alat_praktikum set stok = stok - NEW.qty WHERE  id= NEW.alat_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `file_a` varchar(255) NOT NULL,
  `file_b` varchar(255) NOT NULL,
  `file_c` varchar(255) NOT NULL,
  `file_d` varchar(255) NOT NULL,
  `file_e` varchar(255) NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `created_on` int(11) NOT NULL,
  `updated_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `guru_id`, `matpel_id`, `bobot`, `file`, `tipe_file`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `file_a`, `file_b`, `file_c`, `file_d`, `file_e`, `jawaban`, `created_on`, `updated_on`) VALUES
(1, 1, 1, 1, '', '', '<p> Langkah – langkah pembuktian apakah <a href=\"https://gencil.news/global/berita-nasional/pernyataan-presiden-soal-perpanjangan-ppkm/\">pernyataan</a> selalu benar untuk setiap nilai n bilangan asli menggunakan prinsip induksi Matematika adalah…</p><p>\r\n\r\n\r\n\r\n</p><p>(1). Buktikan bahwa p(n) benar untuk n = 1<br>(2). Dengan asumsi bahwa p(n) benar untuk n = k, buktikan bahwa juga berlaku p(n) untuk…</p>', '<p>k = n + 1<br></p>', '<p>k = n – 1<br></p>', '<p>n = k – 1<br></p>', '<p>n = k + 1<br></p>', '<p>p = n + k<br></p>', '', '', '', '', '', 'B', 1645151143, 1645151143),
(2, 1, 1, 1, '7dae4c3d9d9245ef1ffcfa029275cc97.png', 'image/png', '<p>Perhatikan gambar berikut!</p><p><br></p><p>Daerah penyelesaian dari <a href=\"https://gencil.news/pendidikan/kunci-jawaban/kunci-jawaban-kelas-5-23/\">sistem </a>pertidaksamaan : 5x + 2y >/ 20, 3x + 4y \\< 24>/ 0. Ditunjukkan oleh daerah…</p>', '<p>I</p>', '<p>II</p>', '<p>III</p>', '<p>IV</p>', '<p>V</p>', '', '', '', '', '', 'D', 1645152061, 1645152061),
(4, 1, 1, 1, '0bda180174d1cdead656bf0309c984ab.png', 'image/png', '', '<p> -3 atau -1<br></p>', '<p>-3 atau 1<br></p>', '<p>3 atau -1<br></p>', '<p>3 atau 1<br></p>', '<p>6 atau -3<br></p>', '', '', '', '', '', 'E', 1645153856, 1645153856);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `deskripsi_tugas` text NOT NULL,
  `m_mapelId` varchar(30) NOT NULL,
  `tgl_tugas` datetime DEFAULT NULL,
  `dokumen_tugas` varchar(240) DEFAULT NULL,
  `tgs_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `deskripsi_tugas`, `m_mapelId`, `tgl_tugas`, `dokumen_tugas`, `tgs_active`) VALUES
(1, 'Tugas Kalkulus 1', 'Silahkan kerjakan tugas ini dengan baik dan tanya bila terdapat permasalahan', 'MTK02220001', '2022-02-16 05:00:00', 'SKB_A22_2019_02733.pdf', 1),
(2, 'Tugas Kalkulus 2', 'askdjhkjasd', 'MTK02220001', '2022-03-19 11:17:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_siswa`
--

CREATE TABLE `tugas_siswa` (
  `id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `deskripsi_hasil` text NOT NULL,
  `dokumen_hasil` varchar(200) DEFAULT NULL,
  `nilai` int(3) NOT NULL,
  `waktu_pengumpulan` int(11) NOT NULL,
  `status_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `f_name` varchar(128) NOT NULL,
  `l_name` varchar(128) NOT NULL,
  `nomor` varchar(25) DEFAULT '0',
  `identitas_id` int(2) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `verifikasi_user` int(2) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `f_name`, `l_name`, `nomor`, `identitas_id`, `email`, `image`, `password`, `role_id`, `is_active`, `verifikasi_user`, `date_created`, `last_login`) VALUES
(1, 'Bagus Akbar', 'Bagus', 'Akbar', '0', 0, 'bagus@gmail.com', 'default.jpg', '$2y$10$9k8bWXRhm62HXZap3mWGl.UbntsaX4MnyjMbhAeqCEqjinu8J2IfK', 1, 1, 3, 1644461320, 1647326515),
(2, 'Yusuf Fadhil', 'Yusuf', 'Fadhil', '99999991', 3, 'yusuf@gmail.com', '99999991.jpg', '$2y$10$/pN/5jlYTSb.YT0dDTGfUOXmNsEEW9ZBNJhMaVACW/Zb4I4cus.pq', 3, 1, 3, 1644461505, 1647244182),
(3, 'Albertus  Didan Yusuf Okta Rizki Akbar', 'Albertus  Didan Yusuf', 'Okta Rizki Akbar', '0221916110102777', 2, 'mix@gmail.com', '0221916110102777.jpg', '$2y$10$a8MD8AzsinZuvMrFXn579O4z/3ZhUZX148hEsRrx9aXJg/Mvos6Ze', 2, 1, 3, 1644546246, 1647405981),
(4, 'graha didan', 'graha', 'didan', '786784563453', 3, 'grahadidan@gmail.com', 'default.jpg', '$2y$10$gnQdZFo397yJoAzYhb2r/OiBbmecPKxjnkgcmYAi78wE452ns.gFS', 4, 1, 2, 1644720082, 0),
(6, 'Rizki Akbar', 'Rizki', 'Akbar', '89781923', 2, 'rizki@gmail.com', 'Rizki-Akbar1.jpg', '$2y$10$oGXFLMff3V9tWqwhgt7LiOg3d6UXs6u.xByAC0JCR9tIXZtGskP5m', 2, 1, 3, 1644804103, 1647566451),
(7, 'Pedro Toyyib', 'Pedro', 'Toyyib', '0', 0, 'pedro@gmail.com', 'default.jpg', '$2y$10$BP5.HxEjyeawrBw54UzLGOQJjuQnV0oo5Qws3JEO7n9FnXC505xHq', 4, 1, 1, 1646882747, 1647566507);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(2, 2, 7),
(6, 1, 1),
(8, 1, 8),
(10, 1, 10),
(11, 1, 5),
(13, 1, 2),
(17, 2, 11),
(18, 2, 12),
(19, 2, 13),
(20, 3, 14),
(21, 2, 9),
(22, 1, 15),
(23, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Tools'),
(4, 'Menu'),
(5, 'Kelas dan MataPelajaran'),
(6, 'Ruang Belajar'),
(9, 'Guru'),
(10, 'Relasi'),
(11, 'MataPelajaran'),
(13, 'Ujian'),
(14, 'Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Siswa'),
(4, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Admin', 'fas fa-fw fa-laptop', 1),
(2, 6, 'Halaman Utama', 'Website', 'fas fa-fw fa-pencil-ruler', 1),
(4, 7, 'Ujian Online', 'Ujian', 'fas fa-fw fa-file-signature', 1),
(6, 4, 'Menu Management', 'Menu', 'fas fa-fw fa-tag', 1),
(7, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-tags', 1),
(11, 3, 'Kajian Nikah', 'Yusuf', 'fab fa-android', 0),
(12, 2, 'Role', 'User', 'fas fa-fw fa-users-cog', 1),
(13, 14, 'Halaman Belajar', 'Kelas', 'fas fa-chalkboard-teacher', 1),
(14, 10, 'MataPelajaran-Kelas', 'relasi', 'fas fa-fw fa-link', 1),
(15, 5, 'Data kelas', 'Mapel/view_kelas', 'fab fa-fw fa-accusoft', 1),
(16, 5, 'Data MataPelajaran', 'mapel/v_mapel', 'fas fa-book-open', 1),
(17, 2, 'User level', 'user/user_level', 'fas fa-fw fa-user-shield', 1),
(18, 11, 'Upload Materi Pelajaran', 'Mapel', 'fas fa-fw fa-book', 1),
(20, 13, 'Bank Soal', 'Soal', 'fas fa-fw fa-file-alt', 1),
(21, 13, 'Ujian Online', 'Ujian/master', 'fas fa-fw fa-cubes', 1),
(22, 13, 'Hasil Ujian', 'Hasilujian', 'fas fa-file-contract', 1),
(23, 15, 'Alat Praktikum', 'praktikum', 'fas fa-fw fa-toolbox', 0),
(24, 1, 'Pengumuman', 'Pengumuman', 'fas fa-fw fa-bullhorn', 1),
(25, 2, 'User Verification', 'User/verifikasi_user', 'fas fa-fw fa-user-check', 1),
(26, 9, 'Dashboard', 'website/guru', 'fas fa-fw fa-laptop-code', 1),
(27, 9, 'Kelas Online', 'guru', 'fas fa-fw fa-book-reader', 1),
(28, 10, 'Guru-kelas', 'relasi/guru', 'fas fa-fw fa-user-graduate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_id` (`absen_id`);

--
-- Indexes for table `alat_praktikum`
--
ALTER TABLE `alat_praktikum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matpel_id` (`matpel_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `matpel_id` (`matpel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `guru_matpel`
--
ALTER TABLE `guru_matpel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `matpel_id` (`matpel_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `h_ujian`
--
ALTER TABLE `h_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujian_id` (`ujian_id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_guru`
--
ALTER TABLE `kelas_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `dosen_id` (`guru_id`);

--
-- Indexes for table `kelas_matpel`
--
ALTER TABLE `kelas_matpel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `matpel_id` (`matpel_id`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `m_mapel`
--
ALTER TABLE `m_mapel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_m_mapel` (`id_m_mapel`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `m_ujian`
--
ALTER TABLE `m_ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `matkul_id` (`matpel_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `wali_kelas` (`wali_kelas`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_pinjam_alat`
--
ALTER TABLE `tb_pinjam_alat`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `alat_id` (`alat_id`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `matpel_id` (`matpel_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `tugas_id` (`tugas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nisn` (`nomor`) USING BTREE,
  ADD KEY `identitas` (`identitas_id`),
  ADD KEY `nomor` (`nomor`),
  ADD KEY `identitas_id` (`identitas_id`),
  ADD KEY `identitas_id_2` (`identitas_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alat_praktikum`
--
ALTER TABLE `alat_praktikum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `h_ujian`
--
ALTER TABLE `h_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas_guru`
--
ALTER TABLE `kelas_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kelas_matpel`
--
ALTER TABLE `kelas_matpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `m_mapel`
--
ALTER TABLE `m_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_ujian`
--
ALTER TABLE `m_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pinjam_alat`
--
ALTER TABLE `tb_pinjam_alat`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
