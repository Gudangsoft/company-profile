-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 03, 2020 at 05:00 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

DROP TABLE IF EXISTS `acara`;
CREATE TABLE IF NOT EXISTS `acara` (
  `id_acara` int(11) NOT NULL AUTO_INCREMENT,
  `judul_acara` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_acara` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `isi_acara` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `slug_acara` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tgl_acara` date DEFAULT NULL,
  `mulai_acara` time DEFAULT NULL,
  `selesai_acara` time DEFAULT NULL,
  `tempat_acara` varchar(200) DEFAULT NULL,
  `tglinput_acara` datetime DEFAULT NULL,
  PRIMARY KEY (`id_acara`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id_acara`, `judul_acara`, `foto_acara`, `isi_acara`, `slug_acara`, `tgl_acara`, `mulai_acara`, `selesai_acara`, `tempat_acara`, `tglinput_acara`) VALUES
(1, 'Santunan Anak Yatim Ke 12', 'file/acara/1601083150_fc707c4ec72636a79be6.jpg', '<p>Akan diadakan santunan anak yatim yang ke 12 di sekolah kami. Bagi anda yang memiliki saudara anak yatim mohon segera untuk mendaftarkan diri sebagai peserta santunan. Info bisa hubungi 081330707048</p>\r\n', 'santunan-anak-yatim-ke-12.html', '2020-10-01', '08:00:00', '13:30:00', 'Sekolah SMKN 77 Nganjuk', '2020-09-25 08:03:49'),
(2, 'Pemilihan Ketua OSIS Tahun 2020-2021', 'file/acara/1601083129_bd762f3aa84d1458b092.jpg', '<p>Besok akan ada acara pemilihan Ketua Osis yang akan dilaksanakan dengan cara pemungutan suara untuk semua siswa dan guru yang ada. Jangan sampe tidak memilih ya</p>\r\n', 'pemilihan-ketua-osis-tahun-2020-2021.html', '2020-09-26', '09:00:00', '12:00:00', 'Ruangan Osis', '2020-09-25 08:10:49'),
(3, 'Lomba Coding Batch 3 Dibuka', 'file/acara/1601083084_92ecae32acd6b75bf82d.jpg', '<p>Ayo segera daftarkan diri anda khususnya jurusan RPL untuk megikuti lomba Coding Batch 3. Lomba akan diselenggarakan dengan sistem 2 babak yaitu babak penyisihan dan babak final. Hub 0813330707048</p>\r\n', 'lomba-coding-batch-3-dibuka.html', '2020-09-26', '07:00:00', '16:00:00', 'Ruang Praktek Jurusan RPL', '2020-09-25 08:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

DROP TABLE IF EXISTS `aplikasi`;
CREATE TABLE IF NOT EXISTS `aplikasi` (
  `id_app` int(11) NOT NULL AUTO_INCREMENT,
  `nama_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deskripsi_app` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `icon_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `logo_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `widthlogo_app` int(11) DEFAULT NULL,
  `heightlogo_app` int(11) DEFAULT NULL,
  `nohp_app` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat_app` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `atasnamaemail_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamatemail_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `protocol_app` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `smtphost_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `smtpuser_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `smtppass_app` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `smtpport_app` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fb_app` text,
  `ig_app` text,
  `yt_app` text,
  `tw_app` text,
  `gmap_app` text,
  PRIMARY KEY (`id_app`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id_app`, `nama_app`, `deskripsi_app`, `icon_app`, `logo_app`, `widthlogo_app`, `heightlogo_app`, `nohp_app`, `email_app`, `alamat_app`, `atasnamaemail_app`, `alamatemail_app`, `protocol_app`, `smtphost_app`, `smtpuser_app`, `smtppass_app`, `smtpport_app`, `fb_app`, `ig_app`, `yt_app`, `tw_app`, `gmap_app`) VALUES
(1, 'WEBSITE SMK KOSGORO 3', 'SMK KOSGORO 3 Sekolah Terakreditasi A Yang Berkualitas Siap Berdaya Saing Global', 'file/logo/1600646551_b38e1cf007f862f6ae9a.png', 'file/logo/1600945611_d12c940714276ad549f2.png', 130, 30, '6281330707048', 'rinookta1427@gmail.com', 'Jalan Raya Baron RT 02 RW 03 Jawa Timur', 'Admin Website', 'support@rinookta.com', 'smtp', 'mail.rinookta.com', 'support@rinookta.com', 'support1427', '465', 'https://facebook.com/rinookta', 'https://instagram.com/rinookta', 'https://youtube.com/rinookta', 'https://twitter.com/rinookta', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7877151473!2d106.56404911476884!3d-6.159179695540758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ff9133500a9f%3A0xa8952a8765abdd3d!2sJl.%20Kurma%20X%20Blok%20E13A%20No.2%2C%20RT.7%2FRW.4%2C%20Kutabumi%2C%20Kec.%20Ps.%20Kemis%2C%20Tangerang%2C%20Banten%2015560!5e0!3m2!1sid!2sid!4v1573439615257!5m2!1sid!2sid');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_artikel` int(11) DEFAULT NULL,
  `judul_artikel` varchar(100) DEFAULT NULL,
  `foto_artikel` varchar(200) DEFAULT NULL,
  `isi_artikel` text,
  `slug_artikel` text,
  `dilihat_artikel` int(11) NOT NULL,
  `tag_artikel` text,
  `spam_artikel` int(11) NOT NULL COMMENT '0=Ya,1=Tidak',
  `tglinput_artikel` datetime DEFAULT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_kategori_artikel`, `judul_artikel`, `foto_artikel`, `isi_artikel`, `slug_artikel`, `dilihat_artikel`, `tag_artikel`, `spam_artikel`, `tglinput_artikel`) VALUES
(1, 5, 'Si Cantik yang Tersembunyi di Selatan Pulau Jawa', 'file/artikel/1601080670_799b9c733eb2c324c8ee.jpg', '<p>Jawa Timur, seberapa jauh Anda mengeksplorasi daerah ini? Sudahkah merasakan pantainya? Belum lengkap kalau ke Jawa Timur tanpa ke pantai. Demikian cara&nbsp;Sudiyanti Masdi&nbsp;memulai tulisan perjalanannya ke Pantai Serang. Kompasianer yang baru bergabung di Kompasiana Oktober 2014 ini berhasil menggaet pembaca terbanyak di rubrik wisata dengan kisah perjalanannya ke wilayah selatan Malang, berjarak kurang lebih 45 KM arah barat daya dari Kota Blitar.</p>\r\n\r\n<p>Cerita perjalanannya menelusuri pantai dengan keindahan alam yang menakjubkan diposting memeriahkan lomba&nbsp;blog&nbsp;di Kompasianival 2014. Cerita keindahan alam Indonesia yang dilengkapi dengan foto-foto yang memancing keinginan untuk menjelajah destinasi tersebut.</p>\r\n', 'si-cantik-yang-tersembunyi-di-selatan-pulau-jawa.html', 7, 'harian,info,viral', 0, '2020-09-13 08:26:28'),
(2, 5, 'Pengalaman Mendaki Gunung Papandayan', 'file/artikel/1599965377_5f5d88c1b9e77.jpg', '<p>Catatan perjalanan mendaki Gunung Papandayan, di Kabupaten Garut Jawa Barat ini menarik perhatian pembaca sepanjang tahun. Bagaimana tidak, paparan yang sangat rinci dapat menjadi referensi pendakian terutama bagi pemula. Informasi yang disampaikan edukatif dan bermanfaat. Inilah daya tarik tulisan yang berhasil masuk 14 besar sepanjang tahun. Tak hanya itu, penulis,&nbsp;<a href=\"http://www.kompasiana.com/arieanam\" target=\"_blank\">Ari Anam</a>, memanjakan pembaca dengan foto-foto perjalanan yang luar biasa.</p>\r\n', 'pengalaman-mendaki-gunung-papandayan.html', 7, 'traveling,pemandangan', 0, '2020-09-13 08:31:11'),
(3, 1, 'Kebun Raya Mangrove Gunung Anyar Wisata Alam Baru', 'file/artikel/1599965494_5f5d8936025a8.jpg', '<p>Kawasan Kebun Raya Mangrove Gunung Anyar ini terbagi menjadi dua bagian, yaitu sisi kiri dan kanan. Pada sisi kiri adalah bagian sungai dan bagian kanan adalah daerah tempat fasilitas yang bisa digunakan.<br />\r\nTerdapat jogging track sepanjang 20 meter yang terbuat dari bambu dan disusun memanjang melintasi kawasan pohon bakau. Disepanjang jalur jogging ini juga telah dilengkapi tempat foto bagi pengunjung. Tempat foto ini berupa lingkaran bambu yang bisa digunakan untuk beristirahat. Selain itu mushola dan kantor DKPP juga terbuat dari bambu.<br />\r\nDi tempat ini&nbsp;juga ada gazebo yang terletak di tengah kawasan mangrove. Gazebo ini cukup unik karena terbuat dari bambu. Ukurannya sekitar 5x5 meter sehingga cukup nyaman digunakan untuk beristirahat. Pengunjung juga dapat menikmati berbagai acara yang akan disuguhkan serta juga dapat menggelar acara dengan mengantongi izin terlebih dulu</p>\r\n\r\n<p>Pada ujung timur Kebun Raya mangrove di&nbsp;Surabaya&nbsp;ini terdapat menara pandang setinggi 12 meter yang bisa digunakan unuk melihat kawasan mangrove dari ketinggian. Namun, menara ini hanya bisa dinaiki maksimal lima orang.</p>\r\n', 'kebun-raya-mangrove-gunung-anyar-wisata-alam-baru.html', 9, 'travel', 0, '2020-09-13 09:51:34'),
(7, 8, 'Pandemi Masih Ada Sekolah Diliburkan 2 Minggu', 'file/artikel/1601016667_83b96a940f4707b933a3.jpg', '<p>Kembali pandemi masih terus ada. Maka kami imbau kepada semua siswa untuk libur selama 2 minggu.<br />\r\nSemoga pandemi ini lekas selesai dan sekolahan kembali normal. Kita semua sangat merindukan sekolah berkumpul bersama,bermain bersama.</p>\r\n', 'pandemi-masih-ada-sekolah-diliburkan-2-minggu.html', 6, 'sekolah,pengumuman', 0, '2020-09-25 13:51:07'),
(8, 6, 'Akademisi IPB Riset Batang Nyirih Untuk Kecantikan dan Awet Muda', 'file/artikel/1601293202_5f5e88aaa38269c6974e.jpg', '<p>Sejak zaman dulu, masyarakat telah memanfaatkan tanaman tradisional untuk pengobatan. Bahkan dari tanaman itu juga bisa dijadikan sebagai perawatan kulit. Untuk itulah Peneliti IPB University dari Departemen Kimia, Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA) Prof. Dr. Irmanida Batubara berhasil membuat formula anti jerawat dan anti penuaan dini dari tanaman alami. Bahannya ialah dari batang ranting nyirih. Adapun riset hasil kerjasama dengan PT Martina Berto Tbk ini mencari potensi bahan aktif dari batang ranting nyirih untuk kecantikan.</p>\r\n\r\n<p>Dikatakan, ide awal riset ini adanya penggunaan kulit buah nyirih secara tradisional oleh masyarakat di Sulawesi. Masyarakat di Sulawesi Tengah (Desa Ampana, Kepulauan Togean, Tojo Una-Una) telah menggunakan kulit buah nyirih untuk perawatan kulit sehari-hari atau persiapan calon pengantin wanita. Selain itu, masyarakat di daerah Sulawesi Selatan (Luwu) juga memanfaatkan bijinya untuk dimanfaatkan sebagai anti jerawat.</p>\r\n\r\n<p>Ternyata, penelitian awal terhadap tanaman nyirih dilakukan pada 2009. Data hasil skrining pada 2009 itu menyatakan bahwa batang ranting nyirih merupakan sumber antioksidan yang baik. Dari hasil tersebut, penelitian terhadap ranting nyirih dilanjutkan untuk mengetahui manfaatnya lebih dalam sebagai bahan baku untuk produk kosmetik. Untuk kandungan dari batang ranting nyirih, Prof Irma baru mendapatkan informasi adanya kandungan xylocenssin K yang memiliki aktivitas antioksidan dan antiaging melalui mekanisme H2O2 scavenger pada sel khamir. &quot;Hasil uji penelitian secara in vivo terhadap 30 responden menunjukkan adanya peningkatan kelembaban kulit sebesar 30 persen,&quot; ujarnya seperti dikutip dari laman IPB University, Selasa (22/9/2020).</p>\r\n', 'akademisi-ipb-riset-batang-nyirih-untuk-kecantikan-dan-awet-muda.html', 0, 'ekonomi,tanaman', 0, '2020-09-28 18:40:02'),
(9, 8, 'Wacana Masuknya Sekolah dan PPDB', 'file/artikel/1601680348_cb1415182a46b3032caa.jpeg', '<p>Saat ini, wacana akan dilaksanakan kembalinya sekolah pada Juli 2020 tengah menjadi sorotan publik. Memang kalau mengikuti jadwal yang ada, tahun ajaran baru sekolah semester gasal 2020/2021 semestinya dimulai pada 13 Juli 2020. Persoalannya adalah sampai saat ini situasinya tampak belum terlalu kondusif. Para siswa masih belajar di rumah. Masih ditambah lagi, situasi sekarang ini banyak para orangtua lebih berfokus menghadapi dampak pandemi Covid-19, terutama di bidang ekonomi.<br />\r\nNamun, rupanya pandemi Covid-19 tidak membuat Kementerian Pendidikan dan Kebudayaan (Kemendikbud) berniat mengubah jadwal kalender akademik pendidikan tahun ajaran baru 2020/2021 tetap dibuka pada pertengahan Juli dengan tetap memperhatikan protokol kesehatan. Pengumuman Penerimaan Peserta Didik Baru (PPDB) saat inipun telah dimulai. Hal tersebut diatur dalam Peraturan Menteri Pendidikan dan Kebudayaan (Permendikbud) nomor 44 Tahun 2019 dan SE Mendikbud No 4 Tahun 2020, (sindonews.com, 19/5).<br />\r\nSedangkan, aturan sistem zonasi PPDB tercantum pada Permendikbud No. 14 Tahun 2018. Harapannya, sekolah favorit dan non-favorit tidak memiliki sekat. Tahun 2020, kuota yang diberikan untuk jalur zonasi PPDB minimal 50 persen di setiap sekolah. Berbeda pada tahun 2019, kuota siswa untuk jalur zonasi saat itu sebesar 80 persen dari 100 persen. Itu artinya, di tahun 2020 ini, kuota jalur zonasi berkurang menjadi 50 persen setiap sekolah.<br />\r\nOkelah saat ini, mekanisme aturan PPDB 2020 bisa kita terima dan pahami. Persoalannya adalah saat ini banyak para orang tua pada bingung memikirkan masalah perekonomian. Maka sekiranya bisa kita terima kenyataan bahwa kemampuan pendanaan untuk menyekolahkan anak-anak otomatis tidak serta merta para orang tua bisa langsung memiliki kemampuan dana untuk mengikuti jadwal tahun ajaran baru sekolah semester gasal 2020/2021.</p>\r\n\r\n<p>Masyud<br />\r\nPengajar FKIP Universitas Muhammadiyah Malang</p>\r\n', 'wacana-masuknya-sekolah-dan-ppdb.html', 1, 'sekolah,pandemi', 0, '2020-10-03 06:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `ket_galeri` text,
  `foto_galeri` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `ket_galeri`, `foto_galeri`) VALUES
(1, '', 'file/galeri/1601168730_f749a2bbcc88f6acaebe.jpg'),
(2, '', 'file/galeri/1601168747_ba69cd413b922b3ce746.jpg'),
(3, '', 'file/galeri/1601168752_f0545b46b5b6ef792d56.jpg'),
(4, '', 'file/galeri/1601168788_5f31804a23d8970fd7c7.jpg'),
(5, '', 'file/galeri/1601168796_20adbdf9d9269ba98811.jpg'),
(6, '', 'file/galeri/1601168801_ebc7de59d71e230fe901.jpg'),
(7, '', 'file/galeri/1601168805_be915d517e4feecec00a.jpg'),
(8, '', 'file/galeri/1601168811_7f657c3acfeb18c8298e.jpg'),
(9, '', 'file/galeri/1601168816_ef0aea8070c305806862.jpg'),
(10, '', 'file/galeri/1601168821_5ce0e4108b53368eacd9.jpg'),
(11, '', 'file/galeri/1601168825_706e94a2b7077169ee27.jpg'),
(12, 'Saya', 'file/galeri/1601168832_3c49bbe90191baaf2ff3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

DROP TABLE IF EXISTS `halaman`;
CREATE TABLE IF NOT EXISTS `halaman` (
  `id_halaman` int(11) NOT NULL AUTO_INCREMENT,
  `judul_halaman` varchar(200) DEFAULT NULL,
  `isi_halaman` text,
  `slug_halaman` varchar(250) DEFAULT NULL,
  `tglinput_halaman` datetime DEFAULT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `judul_halaman`, `isi_halaman`, `slug_halaman`, `tglinput_halaman`) VALUES
(1, 'Sambutan Kepsek', '<p>Assalamua&#39;aikum Wr Wb</p>\r\n\r\n<p>Puji syukur kehadirat Allah SWT atas rohmatnya SMK KOSGORO 3, semoga dengan adanya SMK KOSGORO 3 menjawab tantangan yang terjadi di kalangan menengah kebawah, yaitu pendidikan yang terjangkau dan kualitas yang tidak kalah tentunya.</p>\r\n\r\n<p>Sesuai dengan letak gografis SMK KOSGORO 3, Kami mempersiapkan diri ditengah perkembangan teknologi dengan segala keterbatan, tapi kami tetap menunjukkan prestasi-prestasi kami dibindang Ternik baik dari tingkat Kecamtan,Kabupaten dan Provinsi. mulai dari mengikuti Lomba Farmasi, Lomba LKS hingga tingkat Nasional.</p>\r\n\r\n<p>Semoga dengan kehadiran Website SMK KOSGORO 3 sebagai salah satu kontribusi Kami untuk pendidikan anak bangsa yang telah memasuki fase pembelajaran secara Online.</p>\r\n\r\n<p><strong>Kepala Sekolah </strong>SMK KOSGORO 3</p>\r\n', 'sambutan-kepsek.html', '2020-08-23 11:49:38'),
(4, 'Visi Misi', '<p><strong>VISI SEKOLAH/MADRASAH</strong></p>\r\n\r\n<ul>\r\n	<li>Mewujudkan generasi penerus bangsa yang sehat, cerdas, kreatif,mandiri, disiplin, dan bertaqwa kepada Tuhan Yang Maha Esa.</li>\r\n	<li>Menjadi pusat pendidikan tenaga kesehatan yang berkualitas&nbsp;&nbsp;serta berdaya saing global.</li>\r\n</ul>\r\n\r\n<p><strong>MISI SEKOLAH/MADRASAH</strong></p>\r\n\r\n<ul>\r\n	<li>Mengembangkan potensi siswa secara optimal, menanamkan&nbsp;kebiasaan hidup yang bersih dan sehat, menciptakan siswa siswi&nbsp;supaya bisa mandiri, menumbuhkan rasa percaya diri untuk berkarya&nbsp;dan disiplin tinggi.</li>\r\n	<li>Menumbuhkan rasa saling menghormati antara&nbsp;orang tua guru dan orang lain, melatih siswa siswi untuk bisa&nbsp;bersosialisasi dengan masyarakat luas.</li>\r\n</ul>\r\n', 'visi-misi.html', '2020-09-13 06:37:42'),
(7, 'Apa Itu Jurusan RPL & Apa Saja Keunggulan Jurusan RPL', '<p><strong>SEVIMA.COM &ndash;</strong>&nbsp;Siapa yang merasa kurang paham dan sering bertanya apa itu RPL? Ada yang mengira jurusan ini sama dengan TKJ padahal sudah jelas jurusan ini beda dengan TKJ. Lalu apa itu jurusan RPL, apa keunggulan jurusan RPL, apa saja yang dipelajari di jurusan RPL, dan nanti jurusan RPL kerja apa?. Yuk kita bahas lebih detail.</p>\r\n\r\n<p><strong>Apa Itu Jurusan RPL?</strong></p>\r\n\r\n<p>RPL adalah singkatan dari Rekayasa Perangkat Lunak dan merupakan sebuah jurusan yang ada di Sekolah Menengah Kejuruan (SMK). RPL adalah sebuah jurusan yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas.</p>\r\n\r\n<p>Bukan hanya itu, RPL juga berkaitan dengan software komputer mulai dari pembuatan website, aplikasi, game dan semua yang berkaitan dengan pemrograman dengan menguasai bahasa pemrograman tersebut. Intinya RPL tidak akan jauh-jauh dari tiga hal yaitu Coding, Desain dan Algoritma yang akan menjadi kunci keberhasilan rekayasa perangkat lunak tersebut.</p>\r\n\r\n<p><strong>Keunggulan Jurusan RPL</strong></p>\r\n\r\n<p>1. Mampu bekerja di berbagai bidang karena sudah dibekali dengan berbagai ilmu dan pengetahuan.</p>\r\n\r\n<p>2. Dalam melakukan kerja lapangan akan lebih mudah karena saat pembelajaran sudah sering melakukan kerja praktek.</p>\r\n\r\n<p>3. Pekerjaan nya yang relatif mudah dan santai, dapat dikerjakan dimanapun dan kapanpun menggunakan koneksi tentunya.</p>\r\n', 'apa-itu-jurusan-rpl-&-apa-saja-keunggulan-jurusan-rpl.html', '2020-10-03 06:24:46'),
(8, 'Mengenal Jurusan TKJ Teknik Komputer Jaringan', '<p>TKJ Adalah singkatan dari Teknik Komputer Jaringan. TKJ merupakan sebuah kejuruan yang mempelajari tentang cara merakit komputer, mengenal dan mempelajari komponen hardware apa saja yang ada di dalam komputer, merakit komputer serta fokus mempelajari jaringan dasar. Tidak hanya itu selama tiga tahun belajar di TKJ anda akan belajar sistem kerja jaringan dan pemograman web serta meng-administrasi komputer jaringan. Kejuruan TKJ hanya ada di STM/SMK,&nbsp;sampai saat ini jurusan TKJ merupakan jurusan yang sangat populer dan banyak diminati selain RPL dan juga jurusan Multimedia.<br />\r\n<br />\r\nJika anda memilih jurusan TKJ maka anda akan belajar Mikrotik, Cisco, Linux dan prangkat jaringan lainnya. Membangun jaringan pada macam-macam topologi, setting ip dasar hingga memecahkan masalah pada jaringan yang error. Merakit komputer hanya bagian dasar saja, setelah itu anda akan mempelajari cara instalasi Sistem Operasi Microsft Windows dan Linux.</p>\r\n\r\n<p>Peluang kerja jurusan TKJ memang sangat banyak, karna banyak perusahaan yang mencari dan ingin menampung karyawan - karyawan yang memiliki kelebihan di bidang teknologi seperti jurusan TKJ, kemampuan yang dicari yaitu seseorang yang mengerti komputer dan jaringan. Banyak siswa TKJ yang serius belajar hingga ilmunya dapat digunakan dalam dunia kerja, hingga siswi smk jurusan tkj banyak yang langsung terjun kedunia kerja tanpa melanjutkan jenjang selanjutnya yaitu kuliah. Beberapa teman saya setelah lulus langsung diminta oleh perusahaan sebagai Network Administrator.</p>\r\n', 'mengenal-jurusan-tkj-teknik-komputer-jaringan.html', '2020-10-03 06:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `slug_kategori` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`) VALUES
(1, 'Traveling', 'traveling.html'),
(5, 'Jurnal Harian', 'jurnal-harian.html'),
(6, 'Ekonomi Bisnis', 'ekonomi-bisnis.html'),
(8, 'Berita Sekolah', 'berita-sekolah.html');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `parent_menu` int(11) NOT NULL COMMENT '1=yes,0=no',
  `parentid_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `url_menu` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `target_menu` varchar(10) DEFAULT NULL,
  `urutan_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `parent_menu`, `parentid_menu`, `nama_menu`, `url_menu`, `target_menu`, `urutan_menu`) VALUES
(1, 1, 0, 'Home', 'http://localhost:8080/', '_self', 1),
(15, 1, 0, 'Artikel', 'http://localhost:8080/artikel', '_self', 3),
(16, 1, 0, 'Tentang Kami', '#', '_self', 4),
(17, 0, 16, 'Visi Misi', 'http://localhost:8080/page/visi-misi.html', '_self', 1),
(18, 0, 16, 'Sambutan Kepsek', 'http://localhost:8080/page/sambutan-kepsek.html', '_self', 2),
(19, 1, 0, 'Kontak', 'http://localhost:8080/kontak', '_self', 6),
(23, 1, 0, 'Galeri', '#', '_self', 5),
(24, 0, 23, 'Galeri Foto', 'http://localhost:8080/foto', '_self', 1),
(25, 0, 23, 'Galeri Video', 'http://localhost:8080/video', '_self', 2),
(26, 1, 0, 'Acara', 'http://localhost:8080/acara', '_self', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ourservice`
--

DROP TABLE IF EXISTS `ourservice`;
CREATE TABLE IF NOT EXISTS `ourservice` (
  `id_ourservice` int(11) NOT NULL AUTO_INCREMENT,
  `judul_ourservice` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `isi_ourservice` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `link_ourservice` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_ourservice` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `urutan_ourservice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ourservice`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ourservice`
--

INSERT INTO `ourservice` (`id_ourservice`, `judul_ourservice`, `isi_ourservice`, `link_ourservice`, `foto_ourservice`, `urutan_ourservice`) VALUES
(1, 'Sistem Smart School', 'Sekolah kami sudah menggunakan sistem yang terbaru yaitu Smart School. Jadi siswa akan lebih kreatif dan aktif dalam proses pembelajaran.', '#', 'file/ourservice/1600990106_a8ebb3391220565cc20d.png', 1),
(5, 'Terakreditasi A', 'Sekolah kami sudah Terakreditasi A memiliki kualitas pembelajaran yang terbaik dan siap bersaing dalam dunia industri modern.', '#', 'file/ourservice/1600990144_c898e4fce25683c2f91c.png', 2),
(6, 'Bebas Biaya SPP', 'Sekolah kami berkomitmen menciptakan pendidikan Gratis untuk semua siswa  dengan membebaskan biaya SPP dan Uang Gedung.', '#', 'file/ourservice/1600990159_ce47a03644fb592678c7.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email_pengguna` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username_pengguna` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password_pengguna` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_pengguna` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `loginip_pengguna` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `loginat_pengguna` datetime DEFAULT NULL,
  `foto_pengguna` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tglinput_pengguna` datetime DEFAULT NULL,
  `role_pengguna` int(1) DEFAULT NULL COMMENT '1=ADMIN,2=OPERATOR',
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email_pengguna`, `username_pengguna`, `password_pengguna`, `p_pengguna`, `loginip_pengguna`, `loginat_pengguna`, `foto_pengguna`, `tglinput_pengguna`, `role_pengguna`) VALUES
(1, 'Rino Oktavianto', 'rinookta1427@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '::1', '2020-10-03 11:13:21', 'file/avatar/1600910425_c1b67553f9d7d3963b6e.jpg', '2020-04-30 08:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

DROP TABLE IF EXISTS `pengunjung`;
CREATE TABLE IF NOT EXISTS `pengunjung` (
  `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT,
  `ip_pengunjung` varchar(100) DEFAULT NULL,
  `tglinput_pengunjung` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pengunjung`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `ip_pengunjung`, `tglinput_pengunjung`) VALUES
(1, '127.0.0.1', '2020-09-14 07:42:53'),
(2, '127.0.0.1', '2020-09-15 07:59:00'),
(3, '127.0.0.2', '2020-09-15 07:59:00'),
(4, '127.0.0.1', '2020-09-19 06:01:51'),
(5, '::1', '2020-09-20 19:02:57'),
(6, '::1', '2020-09-21 07:03:59'),
(7, '::1', '2020-09-22 07:30:24'),
(8, '::1', '2020-09-23 06:36:06'),
(9, '::1', '2020-09-24 07:50:12'),
(10, '::1', '2020-09-25 06:34:00'),
(11, '::1', '2020-09-26 06:39:24'),
(12, '::1', '2020-09-27 07:21:47'),
(13, '::1', '2020-09-28 18:26:13'),
(14, '::1', '2020-09-29 10:46:47'),
(15, '::1', '2020-09-30 07:04:55'),
(16, '::1', '2020-10-01 05:53:48'),
(17, '::1', '2020-10-02 05:36:35'),
(18, '::1', '2020-10-03 05:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `judul_slider` varchar(100) DEFAULT NULL,
  `isi_slider` varchar(200) DEFAULT NULL,
  `link_slider` varchar(300) DEFAULT NULL,
  `foto_slider` varchar(200) DEFAULT NULL,
  `urutan_slider` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul_slider`, `isi_slider`, `link_slider`, `foto_slider`, `urutan_slider`) VALUES
(1, 'ACARA PELATIHAN PROTOKOL KESEHATAN', 'Kali ini sekolah kami sedang bersosialisasi untuk menerapkan protokol kesehatan pencegahan COVID-19. Semua siswa dan guru ikut serta dalam kegiatan ini.', '#', 'file/slider/1600945396_64f9bb989f453976ed2f.jpg', 2),
(2, 'SEKOLAH KAMI SUDAH MENERAPKAN ELEARNING', 'Sekolah kami sudah merilis aplikasi E-Learning untuk menyukseskan pembelajaran secara online. Aplikasi ini juga didevelop oleh siswa kami.', '#', 'file/slider/1600945540_7b6ef3b2d0e492084e69.jpg', 3),
(4, 'SELAMAT DATANG DI SMKN 77 NGANJUK', 'Sekolah keren cocok untuk milenial dengan fasilitas yang lengkap dan didampingi guru berkompeten. Sekolah kami terakreditas A .', '#', 'file/slider/1600992998_3e09d39edf7863a37ea2.jpg', 1),
(5, 'PENERIMAAN PESERTA DIDIK BARU DIBUKA', 'Yee.. PPDB SMK Kosgoro 33 sudah dibuka ayo segera daftarkan diri anda dan pastikan anda akan mendapatkan pendidikan yang unggul dan berkualitas disini.', '#', 'file/slider/1601680893_866112eff752433779a4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `ket_video` varchar(200) DEFAULT NULL,
  `youtube_video` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `ket_video`, `youtube_video`) VALUES
(1, 'Happy Asmara - Los Dol (Official Music Video)', 'https://www.youtube.com/watch?v=_yPMWH8ugn4'),
(4, 'Happy Asmara - Los Dol (Official Music Video)', 'https://www.youtube.com/watch?v=MVF_U0-8dKs'),
(5, 'Happy Asmara - Piye Kabarmu Mantan', 'https://www.youtube.com/watch?v=FSziGFgq_24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
