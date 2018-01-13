-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2018 at 04:39 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sman4_proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `kode_kelas` int(11) DEFAULT NULL,
  `tanggal` varchar(15) DEFAULT NULL,
  `jam` varchar(20) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `kode_login` char(8) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `nip_guru` char(18) DEFAULT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(15) DEFAULT NULL,
  `golongan_darah` varchar(2) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `email_guru` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `program_studi_guru` varchar(100) DEFAULT NULL,
  `tanggal_masuk` varchar(15) DEFAULT NULL,
  `tanggal_keluar` varchar(15) DEFAULT NULL,
  `alamat_guru` text,
  `telepon_guru` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `kode_login`, `password`, `nip_guru`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `golongan_darah`, `agama`, `email_guru`, `pendidikan`, `program_studi_guru`, `tanggal_masuk`, `tanggal_keluar`, `alamat_guru`, `telepon_guru`) VALUES
(4, '74828123', 'password', '1992040112394819', 'Siapa, S.Pd, M.Pd', 'Perempuan', 'Bekasi', '1992-04-01', 'O', 'Islam', NULL, 'S2', 'Pendidikan Matematika', '2001-02-01', '', '                                                                                                        Di mana saja boleh                                                                                                ', '081380776620'),
(5, '23819320', 'password', '198804272014032001', 'Sundari, S.T', 'Perempuan', 'Magetan', '1988-04-18', 'B', 'Islam', NULL, 'S1', 'Teknik Kimia', '2014-03-03', '', 'Di Magetan pokoknya', '0812xxxxxxx'),
(6, '82342912', 'password', '198207302014032001', 'Yulia Tania Vabelay, S.Pd', 'Perempuan', 'Malang', '1982-07-30', 'A', 'Katolik', NULL, 'S1', 'Pendidikan Sosiologi', '2014-01-20', '', 'Di Malang pokonya', '0813xxxxxxx'),
(8, '61644543', 'password', '197209042008012012', 'Dianawati, S.Pd', 'Perempuan', 'Jakarta', '1972-09-04', 'B', 'Islam', 'raka.flyhigh@gmail.com', 'S1', 'Pendidikan Ekonomi Islam', '2011-07-07', '', 'Di Jakarta', '082919201191');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `kode_kelas` int(11) DEFAULT NULL,
  `hari` varchar(15) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `kode_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `id_tahun_akademik`, `kode_kelas`, `hari`, `jam`, `kode_mapel`, `id_guru`) VALUES
(1, 1, 1, 'Senin', '07:45 - 10:00', 4, 4),
(3, 1, 1, 'Senin', '10:15 - 11:45', 13, 5),
(4, 1, 3, 'Senin', '07:45 - 10:00', 13, 5),
(5, 1, 3, 'Senin', '10:15 - 11:45', 4, 4),
(6, 1, 2, 'Senin', '07:45 - 10:00', 3, NULL),
(8, 1, 2, 'Senin', '07:45 - 10:00', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` int(11) NOT NULL,
  `kelas` varchar(13) DEFAULT NULL,
  `jurusan` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kelas`, `jurusan`) VALUES
(1, 'X MIPA 1', 'MIPA'),
(2, 'X IIS 1', 'IIS'),
(3, 'X MIPA 2', 'MIPA');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama_user`, `username`, `password`, `jabatan`, `id_guru`) VALUES
(2, 'Administrator', 'admin', 'password', 'Admin', NULL),
(3, '', '182391', 'password', 'Guru', 4),
(4, '', '182347', 'password', 'Guru', 6),
(5, '', '182932', 'password', 'Guru', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` int(11) NOT NULL,
  `mata_pelajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `mata_pelajaran`) VALUES
(1, 'Pendidikan Agama dan Budi Pekerti'),
(2, 'Pendidikan Pancasila dan Kewarganegaraan'),
(3, 'Bahasa Indonesia'),
(4, 'Matematika Wajib'),
(5, 'Sejarah Indonesia'),
(6, 'Bahasa Inggris'),
(7, 'Seni Budaya'),
(8, 'Pendidikan Jasmani, Olahraga dan Kesehatan'),
(9, 'Prakarya dan Kewirausahaan'),
(10, 'Matematika Minat'),
(11, 'Biologi'),
(12, 'Fisika'),
(13, 'Kimia'),
(14, 'Geografi'),
(15, 'Sejarah Minat'),
(16, 'Sosiologi'),
(17, 'Ekonomi'),
(18, 'Upacara'),
(19, 'IMTAQ'),
(20, 'SABTU BERSIH'),
(21, 'ISTIRAHAT');

-- --------------------------------------------------------

--
-- Table structure for table `mendapat_jadwal`
--

CREATE TABLE `mendapat_jadwal` (
  `kode_mapel` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menempati`
--

CREATE TABLE `menempati` (
  `kode_kelas` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_tahun_akademik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menempati`
--

INSERT INTO `menempati` (`kode_kelas`, `id_siswa`, `id_tahun_akademik`) VALUES
(1, 3, 1),
(1, 4, 1),
(3, 16, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `kode_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`kode_mapel`, `id_guru`) VALUES
(17, 8),
(4, 4),
(13, 5),
(16, 6);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `kode_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `kode_kelas` int(11) DEFAULT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `nilai_1` int(11) DEFAULT NULL,
  `nilai_2` int(11) DEFAULT NULL,
  `nilai_3` int(11) DEFAULT NULL,
  `nilai_keterampilan_1` int(11) DEFAULT NULL,
  `nilai_keterampilan_2` int(11) DEFAULT NULL,
  `nilai_keterampilan_3` int(11) DEFAULT NULL,
  `nilai_uts` int(11) DEFAULT NULL,
  `nilai_uts_keterampilan` int(11) DEFAULT NULL,
  `nilai_4` int(11) DEFAULT NULL,
  `nilai_5` int(11) DEFAULT NULL,
  `nilai_6` int(11) DEFAULT NULL,
  `nilai_keterampilan_4` int(11) DEFAULT NULL,
  `nilai_keterampilan_5` int(11) DEFAULT NULL,
  `nilai_keterampilan_6` int(11) DEFAULT NULL,
  `nilai_uas` int(11) DEFAULT NULL,
  `nilai_uas_keterampilan` int(11) DEFAULT NULL,
  `sikap_dalam_mapel` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `kode_mapel`, `id_guru`, `kode_kelas`, `id_tahun_akademik`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_keterampilan_1`, `nilai_keterampilan_2`, `nilai_keterampilan_3`, `nilai_uts`, `nilai_uts_keterampilan`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_keterampilan_4`, `nilai_keterampilan_5`, `nilai_keterampilan_6`, `nilai_uas`, `nilai_uas_keterampilan`, `sikap_dalam_mapel`) VALUES
(1, 16, 4, 4, 3, 1, 90, 70, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `kode_login` char(8) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `nisn` char(10) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(12) DEFAULT NULL,
  `golongan_darah` varchar(2) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat_siswa` text,
  `email_siswa` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` text,
  `telepon_ortu` varchar(15) DEFAULT NULL,
  `email_ortu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `alamat_wali` text,
  `telepon_wali` varchar(15) DEFAULT NULL,
  `email_wali` varchar(50) DEFAULT NULL,
  `nama_sekolah_asal` varchar(100) DEFAULT NULL,
  `alamat_sekolah_asal` text,
  `tahun_angkatan` char(4) DEFAULT NULL,
  `diterima_kelas` varchar(10) DEFAULT NULL,
  `diterima_tanggal` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `kode_login`, `password`, `nisn`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `golongan_darah`, `agama`, `alamat_siswa`, `email_siswa`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `alamat_ortu`, `telepon_ortu`, `email_ortu`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`, `telepon_wali`, `email_wali`, `nama_sekolah_asal`, `alamat_sekolah_asal`, `tahun_angkatan`, `diterima_kelas`, `diterima_tanggal`) VALUES
(2, '17180001', 'cobaganti', '', 'Zanuar Hanif Rachmat Adi', 'Laki-Laki', 'Magetan', '1996-01-03', 'O', 'Islam', 'Jalan Muria 17, Kecamatan Barat, Kabupaten Magetan, Jawa Timur', NULL, 'Hadi Hardoso', 'PNS', 'TItin Catur Wulansari', 'Ibu Rumah Tangga', 'Jalan Muria 17, Kecamatan Barat, Kabupaten Magetan, Jawa Timur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2011', 'X MIPA', '2011-08-08'),
(3, '17180002', 'password', '', 'Aditya Kurniawan', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '17180003', 'password', '', 'Nur Maidah Woro Widani', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '17180004', 'password', '9962165809', 'Raka Admiral Abdurrahman', 'Laki-Laki', 'Bekasi', '1996-04-07', 'O', 'Islam', 'Taman Wisma Asri Blok H 54 No. 24. Kelurahan Teluk Pucung, Kecamatan Bekasi Utara, Kota Bekasi, Provinsi Jawa Barat 17121', 'raka.flyhigh@gmail.com', 'Sumardanto', 'Karyawan Swasta', 'Sari Wiji Astuti', 'Ibu Rumah Tangga', 'Taman Wisma Asri Blok H 54 No. 24. Kelurahan Teluk Pucung, Kecamatan Bekasi Utara, Kota Bekasi, Provinsi Jawa Barat 17121', '081380776620', 'matsukaze.rakaflyhigh@gmail.com', '', '', '', '', '', 'SMP Negeri 5 Bekasi', 'Jalan Raya Seroja, Harapan Jaya, Bekasi Utara, Harapan Jaya, Bekasi Utara, Kota Bks, Jawa Barat 17124', '2017', 'X MIPA', '2017-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(15) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `semester`) VALUES
(1, '2017/2018', '1'),
(2, '2017/2018', '2');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `kode_walikelas` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `kode_kelas` int(11) DEFAULT NULL,
  `id_tahun_akademik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`kode_walikelas`, `id_guru`, `kode_kelas`, `id_tahun_akademik`) VALUES
(1, 4, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `mendapat_jadwal`
--
ALTER TABLE `mendapat_jadwal`
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `menempati`
--
ALTER TABLE `menempati`
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`kode_walikelas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `wali_kelas_ibfk_3` (`id_tahun_akademik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `kode_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `kode_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mendapat_jadwal`
--
ALTER TABLE `mendapat_jadwal`
  ADD CONSTRAINT `mendapat_jadwal_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`),
  ADD CONSTRAINT `mendapat_jadwal_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `menempati`
--
ALTER TABLE `menempati`
  ADD CONSTRAINT `menempati_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `menempati_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `menempati_ibfk_3` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`);

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`),
  ADD CONSTRAINT `mengajar_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `nilai_ibfk_5` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `wali_kelas_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `wali_kelas_ibfk_3` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
