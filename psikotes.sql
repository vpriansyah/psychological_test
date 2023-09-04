-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20230903.99ccb7980a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 09:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psikotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`id`, `nama`, `email`, `keperluan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Joko Nuswantoro', 'Joko@gmail.com', 'Belum memiliki akun', 0, '2023-08-30 09:58:44', '2023-08-30 09:58:44'),
(2, 'Devan', 'Devan@gmail.com', 'Belum memiliki akses akun', 0, '2023-08-30 09:59:10', '2023-08-30 09:59:10'),
(3, 'Devanza Priansyah Putra', 'vpriansyah@student.uns.ac.id', 'Belum memiliki akun', 0, '2023-08-31 09:13:58', '2023-08-31 09:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `alur`
--

CREATE TABLE `alur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alur_pengerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alur`
--

INSERT INTO `alur` (`id`, `alur_pengerjaan`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Persiapkan diri secara fisik dan mental', 1, '2023-08-30 09:43:06', '2023-08-30 09:43:06'),
(2, 'Gunakan perangkat yang sesuai dan mendukung ( PC / Laptop yang Memadai )', 2, '2023-08-30 09:43:23', '2023-08-30 09:43:23'),
(3, 'Baca instruksi dengan cermat sebelum memulai psikotes.', 3, '2023-08-30 09:43:45', '2023-08-30 09:43:45'),
(4, 'Pastikan koneksi internet Anda stabil dan cukup cepat untuk menjalankan psikotes online', 4, '2023-08-30 09:43:55', '2023-08-30 09:43:55'),
(5, 'Kelola waktu dengan bijak', 5, '2023-08-30 09:44:04', '2023-08-30 09:44:04'),
(6, 'Jawab pertanyaan dengan fokus dan sejujur-jujurnya', 6, '2023-08-30 09:44:14', '2023-08-30 09:44:14'),
(7, 'Jika masih ada waktu setelah menyelesaikan semua tes, luangkan waktu untuk me-review kembali jawaban Anda', 7, '2023-08-30 09:44:27', '2023-08-30 09:44:27'),
(8, 'Submit jawaban tepat waktu', 8, '2023-08-30 09:44:38', '2023-08-30 09:44:38'),
(9, 'Tunggu informasi selanjutnya melalui email', 9, '2023-08-30 09:44:49', '2023-08-30 09:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `nama`, `email`, `subject`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'Joko Nuswantoro', 'Joko@gmail.com', 'Pelayanan', 'Pelayanan Kurang Baik', '2023-08-30 22:04:19', '2023-08-30 22:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_test`
--

CREATE TABLE `hasil_test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) NOT NULL,
  `jumlah_poin` int(20) DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tidak Ada',
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_test`
--

INSERT INTO `hasil_test` (`id`, `peserta_id`, `jumlah_poin`, `keterangan`, `otp`, `created_at`, `updated_at`) VALUES
(1, 8, 33, 'Berkas Tidak lengkap', '2817', '2023-08-30 21:29:41', '2023-08-30 21:33:59'),
(2, 10, 170, 'Berkas Kurang', '4314', '2023-08-30 21:41:43', '2023-08-31 09:21:29'),
(3, 11, 66, 'Tidak Ada', '6068', '2023-08-30 21:57:30', '2023-08-30 21:58:23'),
(5, 13, 30, 'Tidak Ada', '6753', '2023-08-31 10:09:07', '2023-08-31 10:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_kategori`
--

CREATE TABLE `informasi_kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `informasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi_kategori`
--

INSERT INTO `informasi_kategori` (`id`, `informasi`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'Nilai Ambang Batas adalah 166', 1, '2023-08-30 10:10:59', '2023-08-30 10:10:59'),
(2, 'Satu sesi dikerjakan selama 45 menit', 1, '2023-08-30 10:11:22', '2023-08-30 10:11:22'),
(3, 'Satu sesi berisi 45 butir soal', 1, '2023-08-30 10:11:53', '2023-08-30 10:11:53'),
(4, 'Quiz berisi pertanyaan mengenai kepribadian dasar dalam bekerja', 1, '2023-08-30 10:12:24', '2023-08-30 10:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tes`
--

CREATE TABLE `kategori_tes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ambang_batas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_tes`
--

INSERT INTO `kategori_tes` (`id`, `kategori`, `ambang_batas`, `created_at`, `updated_at`) VALUES
(1, 'TKP A', 166, '2023-08-30 10:07:58', '2023-08-30 10:07:58'),
(2, 'TKP B', 166, '2023-08-30 10:08:10', '2023-08-30 10:08:10'),
(3, 'Kejujuran', 50, '2023-08-30 10:08:22', '2023-08-30 10:08:22'),
(4, 'Kedisiplinan', 50, '2023-08-31 09:18:16', '2023-08-31 09:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_19_174317_create_role_table', 1),
(6, '2023_05_19_174331_create_kategori_tes_table', 1),
(7, '2023_05_19_174342_create_paket_soal_table', 1),
(8, '2023_05_19_174358_create_sesi_psikotes_table', 1),
(9, '2023_05_19_174410_create_status_table', 1),
(10, '2023_05_19_174421_create_hasil_test_table', 1),
(11, '2023_05_19_174429_create_rules_table', 1),
(12, '2023_05_19_174434_create_alur_table', 1),
(13, '2023_05_19_190139_create_ajuan_table', 1),
(14, '2023_05_23_080006_create_contactus_table', 1),
(15, '2023_06_23_055301_crate_informasi_kategori_table', 1),
(16, '2023_06_23_055446_create_informasi_kategori_table', 1),
(17, '2023_07_13_045608_create_posisi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_soal`
--

CREATE TABLE `paket_soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) NOT NULL,
  `soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_A` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_B` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_C` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_D` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_E` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_A` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_B` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_C` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_D` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_E` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_soal`
--

INSERT INTO `paket_soal` (`id`, `kategori_id`, `soal`, `jawaban_A`, `jawaban_B`, `jawaban_C`, `jawaban_D`, `jawaban_E`, `poin_A`, `poin_B`, `poin_C`, `poin_D`, `poin_E`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saya menggunakan kendaraan di­nas tanpa sepengetahuan Kepala Kendaraan pada hari libur. Secara tidak sengaja, saya menabrakkan kendaraan tersebut. Tindakan saya', 'Mencoba memperbaiki sen­ diri kendaraan tersebut.', 'Melaporkan kejadian tersebut kepada pimpinan dan siap menerima hukuman/petunjuk dari pimpinan.', 'Membawa kendaraan tersebut ke bengkel atas biaya pribadi   dan mengembalikannya de­ngan diam-diam.', 'Diam-diam menyimpan ken­ daraan tersebut karena tidak seorang pegawaipunyangtahu kalau saya menggunakannya.', 'Membawa kendaraan tersebut ke bengkel, melaporkan keja­ dian tersebut kepada pimpinan serta menyerahkan segala ke­ putusan kepada pimpinan.', '2', '4', '3', '1', '5', '2023-08-30 10:54:10', '2023-08-30 10:54:10'),
(2, 1, 'Saya dipercayakan mengelola kegiatan yang belum dipublikasikan  dan  masih  harus  dijaga kasikan  dan  masih  harus  dijagadi antara  teman-teman  dekat  di kantor, saya ...', 'Membatasi  pembicaraan  agar Membatasi  pembicaraan  agar tugas baru saya.', 'Akan merasa gelisah dan kurang   senang   bila   mereka kurang   senang bila mereka baru saya.', 'Akan  mengalihkan  ke pembi caraan lain bila mereka sudah mulai	menyinggung tugas baru saya.', 'Suka menerima masukan demi masukan dalam rangka pengembangan   tugas   baru saya', 'Membicarakan	hal-hal	lain yang tidak ada kaitannya dengan tugas baru saya.', '2', '1', '3', '5', '4', '2023-08-30 11:04:40', '2023-08-30 11:04:40'),
(3, 1, 'Kerja keras dan cermat merupakan wujud upaya untuk menjadi pribadi  yang  bermanfaat  bagi organisasi Berkaitan dengan hal tersebut, saya senang ...', 'Pekerjaan yang menantang.', 'Bekerja tanpa  mengenal lelah dan pamrih.', 'Bekerja dengan standar  hasil yang tinggi.', 'Pekerjaan yang menumbuhkan kreativitas baru', 'Pekerjaan yang rutin.', '2', '4', '3', '5', '1', '2023-08-30 11:07:28', '2023-08-30 11:07:28'),
(4, 1, 'Ketika sedang melakukan presen tasi, saya menerima pesan singkat (SMS)  yang  mengabarkan  bahwa anak saya diopname di rumah sakit Reaksi saya ...', 'Melanjutkan presentasi.', 'Menghentikan  presentasi  dan mencari	tahu	kondisi	anak saya.', 'Menghentikan presentasi dan langsung menuju rumah sakit.', 'Mencari	tahu	kondisi	anak saya   kemudian   memutuskan apakah  tetap  presentasi  atau ke rumah sakit.', 'Membalas SMS dan melanjutkan presentasi', '1', '4', '2', '5', '3', '2023-08-30 11:09:46', '2023-08-30 11:09:46'),
(5, 1, 'Saya baru saja dimutasikan ke unit lain  yang  sama  sekali  baru  bagi saya. Sikap saya ...', 'Berusaha	memahami    meka nisme kerja unit melalui arsip nisme kerja unit melalui arsip', 'Duduk-duduk saja sambil  menunggu perintah atasan', 'Berusaha	mempelajari	dan memahami   mekanisme   kerja unit melalui rekan sejawat.', 'Mengamati  proses  pekerjaan yang dilakukan rekan sejawat.', 'yang dilakukan rekan sejawat jelas apa yang harus dikerjakan', '5', '2', '4', '3', '1', '2023-08-30 11:12:19', '2023-08-30 11:12:19'),
(6, 1, 'Sikap  saya  terhadap  perubahan perubahan,	ide-ide	baru,	dan cara-cara baru dalam melaksanakan  cara-cara baru dalam melaksanakan', 'Dengan	adanya	perubahan kondisi kerja pasti lebih baik.', 'Keberhasilan	pekerjaan	tergantung jenis perubahan, ide dan cara-cara baru tersebut', 'Stabilitas  dalam  bekerja  lebih penting.', 'Perubahan	adalah	sesuatu yang pasti', 'Perubahan bukan jaminan  keberhasilan pekerjaan', '5', '4', '1', '3', '2', '2023-08-30 11:15:04', '2023-08-30 11:15:04'),
(7, 1, 'Terjadi pergantian pimpinan di unit kerja saya. Sikap saya ...', 'Berusaha  mengenal  dan  memahami visi dan misi pimpinan baru', 'Tidak berusaha mendekati pimpinan baru karena takut dicap penjilat', 'Berusaha mengenal pribadi pimpinan  baru.', 'Pergantian pimpinan itu se­ suatu yang biasa', 'Tidak peduli', '5', '2', '3', '4', '1', '2023-08-30 11:16:59', '2023-08-30 11:16:59'),
(8, 1, 'Saya diutus mengikuti suatu diklat. Oleh panitia penyelenggara saya ditempatkan sekamar dengan orang yang tidak saya kenal yang berasal dari kota lain. Sikap saya ....', 'Mengajukan keberatan dan minta ditempatkan dengan minimal orang yang dikenal', 'Menerima  aturan   penitia dan berusaha mengenal dan memahami teman sekamar', 'Mengajukan keberatan tetapi akhirnya menerima aturan panitia', 'Protes keras dan minta ditem­ patkan sendiri saja', 'Menerima aturan panitia', '2', '5', '3', '1', '4', '2023-08-30 11:18:39', '2023-08-30 11:18:39'),
(9, 1, 'Dalam rapat staf dan pimpinan, pendapat saya dikritik keras oleh peserta rapat lainnya. Respons saya', 'Mencoba mempelajari kritik­ an tersebut dan berbalik mengkritik dengan tajam', 'Menerima kritikan tersebut sebagai masukan', 'Mencoba sekuat tenaga mem­ pertahankan pendapat saya', 'Menyerang semua peserta yang mengkritik pendapat saya', 'Diam saja', '3', '5', '4', '1', '2', '2023-08-30 11:21:30', '2023-08-30 11:21:30'),
(10, 1, 'Saya ditugaskan di front office untuk melayani tamu pimpinan. Pada saat pimpinan saya  tidak  berada di tempat dan ada tamu  pimpinan yang	memerlukan keputusan segera, sikap saya adalah ....', 'Mengambil keputusan tanpa petunjuk atasan selama tidak bertentangan dengan kebi­ jakan umum pimpinan', 'Tidak berani mengambil keputusan tanpa petunjuk atasan saya.', 'Ragu-ragu dalam mengambil keputusan tanpa petunjuk atasan saya', 'Menunda-nunda pengambilan keputusan tanpa petunjuk atasan saya', 'Menunda-nunda pengambilan keputusan tanpa petunjuk atasan saya', '5', '1', '2', '3', '4', '2023-08-30 11:23:30', '2023-08-30 11:23:30'),
(11, 1, 'Saya ditawarkan oleh pimpinan untuk melanjutkan studi di provinsi lain atas biaya kantor. Saat ini saya baru saja dikaruniai bayi kembar yang masih membutuhkan perhatian saya. Keputusan saya', 'Menerima tawaran tersebut dengan    permohonan    agar keluarga	dapat ikut saya dengan tambahan biaya hidup', 'Menolak tawaran tersebut namun mohon kebijakan pim­ pinan jika ada kesempatan lagi saya dapat diikutkan', 'Menerima tawaran tersebut dan dengan berat hati mening­ galkan keluarga', 'Menolak tawaran tersebut', 'Menerima tawaran tersebut dengan konsekuensi meng­ ikutkan keluarga merupakan tanggung jawab saya', '4', '2', '3', '1', '5', '2023-08-30 11:26:38', '2023-08-30 11:26:38'),
(12, 1, 'Draft laporan yang dibuat oleh tim kerja saya ditolak oleh atasan karena dianggap kurang visibel (layak). Sikap saya adalah ...', 'Menerima penolakan dan ber­ usaha memperbaiki', 'Menerima penolakan tetapi tidak melakukan tindak lanjut', 'Menerima penolakan tetapi tidak melakukan tindak lanjut', 'Segera melakukan perbaikan atas draft  laporan  dan  meng­ ajukan kembali', 'Menyalahkan rekan sejawat yang sama-sama mengerja­ kannya', '4', '3', '2', '5', '1', '2023-08-30 11:28:32', '2023-08-30 11:28:32'),
(13, 1, 'Saya ditugaskan untuk memimpin tim kerja dengan batas waktu yang sangat ketat. Anggota tim kerja memperlihatkan sikap tidak peduli dengan tugas yang diemban. Sikap saya adalah', 'Bekerja sendiri asalkan  tugas selesai', 'Mengancam anggota yang tidak serius tersebut akan dikeluarkan dari tim', 'Melaporkan pada atasan saya agar diberi sanksi', 'Membagi tugas secara adil dan memotivasi serta menegur anggota untuk menyelesai­ kannya', 'Menasihatinya agar  sadar akan penyelesaian tugas yang diemban', '3', '1', '2', '5', '4', '2023-08-30 11:30:31', '2023-08-30 11:30:31'),
(14, 1, 'Saya sedang mengerjakan peker­ jaan kantor, yang harus selesai besok pagi.Tiba-tiba teman datang dengan wajah cemberut dan tam­ paknya ingin mengeluarkan isi hatinya kepada saya. Atas kejadian itu saya ...', 'Meninggalkan pekerjaan serta memberi berbagai alternatif penyelesaian.', 'Tetap mengerjakan sambil mendengarkan ceritanya', 'Meneruskan pekerjaan dan berusaha untuk tidak meme­ dulikan keinginan teman saya', 'Memohon kepadanya untuk tidak mengganggu saya karena sedang sibuk', 'Meninggalkan pekerjaan saya dan mendengarkan ceritanya dengan penuh perhatian', '2', '5', '3', '4', '1', '2023-08-30 11:31:59', '2023-08-30 11:31:59'),
(15, 1, 'Organisasi sedang mengalami permasalahan interna! seputar manajemen keuangan. Pendapat saya terhadap kondisi ini ...', 'Pastikan bahwa kepala ke­ uangan bertanggung jawab penuh terhadap masalah ini', 'Perlu membeberkan perma­ salahan kepada seluruh jajaran organisasi.', 'Saya akan menjaga kerahasiaan permasalahan yang terjadi dan mencoba memberikan alter­ natif solusi kepada pimpinan', 'Seharusnya pimpinan puncak dapat menindak tegas yang terlibat dalam masalah ini', 'Tidak mempersoalkan masalah tersebut karena bukan bagian tugas saya', '4', '1', '5', '3', '2', '2023-08-30 11:33:32', '2023-08-30 11:33:32'),
(16, 1, 'Andi,teman karib Anda, melakukan kecurangan absensi. Maka Anda ...', 'Menoleransi sebab baru kali ini Andi melakukannya', 'Rekan kerja yang lain juga melakukannya, jadi tidaklah mengapa', 'Mengingatkan dan menegur', 'Menegur dan melaporkan apa adanya kepada atasan', 'Menanyakan kepadanya me­ ngapa dia melakukan hal ter­ sebut', '2', '1', '5', '3', '4', '2023-08-30 11:44:52', '2023-08-30 11:44:52'),
(17, 1, 'Saya ditugaskan pimpinan untuk menjadi notulis dalam Rapat Badan Pertimbangan Jabatan dan Kepangkatan. Respons saya adalah', 'Berusaha menghindari rekan yang membujuk untuk me­ ngetahui hasil keputusan rapat', 'Dengan bangga saya akan menceritakan kepada rekan sejawat saya hasil  keputusan rapat', 'Memberitahukan anggota ke­ luarga tentang hasil keputusan rapat', 'Memberi tahu sahabat saya di kantor tentang hasil keputusan rapat', 'Tidak akan membocorkan hasil keputusan rapat karena bukan wewenang saya', '4', '1', '3', '2', '5', '2023-08-30 11:48:35', '2023-08-30 11:49:11'),
(18, 1, 'Tempat saya bekerja sedang me­ ngalami permasalahan keuang-an berupa kerugian  atau  defisit yang cukup besar. Pendapat saya terhadap kondisi ini adalah ...', 'Saya akan menjaga keraha­ siaan permasalahan yang terjadi dan tidak ingin ikut campur masalah keuangan', 'Seharusnya pimpinan puncak dapat menindak tegas yang terlibat dalam masalah ini', 'Tidak mempersoalkan masalah tersebut karena bukan bagian tugas saya', 'Pastikan bahwa kepala ke­ uangan bertanggung jawab penuh terhadap masalah ini', 'Perlu menjelaskan perma­ salahan kondisi keuangan perusahaan kepada seluruh jajaran organisasi agar dapat mengevaluasi kembali ren­ cana pembelanjaan', '2', '3', '1', '4', '5', '2023-08-30 11:51:11', '2023-08-30 11:51:11'),
(19, 1, 'Bagi saya, bekerja adalah ...', 'Beribadah', 'Tugas', 'Kewajiban', 'Kebutuhan', 'Mencari uang untuk nafkah', '5', '1', '2', '4', '3', '2023-08-30 11:53:57', '2023-08-30 11:53:57'),
(20, 1, 'Dalam suatu pertemuan atau rapat, teman Anda melakukan kecu­ rangan absensi. Yang Anda lakukan adalah ...', 'Membiarkannya saja', 'Melaporkannya	pada	pim­ pinan/ketua rapat', 'Memberitahukan  pada  teman terdekat', 'Diam saja pura-pura tidak lihat', 'lkut-ikutan melakukannya ke­ mudian bolos dari rapat', '3', '5', '4', '2', '1', '2023-08-30 11:55:55', '2023-08-30 11:55:55'),
(21, 1, 'Anda diminta oleh Direktur peru­ sahaan untuk menjadi ketua sekaligus penanggung jawab se­ buah tim di kantor Anda, padahal Anda merasa belum pantas sebab masih ada manajer yang Anda anggap mampu. Sikap yang harus Anda lakukan adalah ...', 'Menolak permintaan direktur tersebut', 'Mempertimbangkan permin­ taan tersebut dan minta saran/ masukan dari manajer Anda', 'Menerima permintaan ter­ sebut dengan senang hati', 'Menolak permintaan dan mengusulkan manajer Anda saja kepada Direktur', 'Menerima tawaran  tersebut agar Anda bisa naik jabatan sejajar manajer Anda', '1', '5', '4', '3', '2', '2023-08-30 11:58:32', '2023-08-30 11:58:32'),
(22, 1, 'Seorang staf HRD di sebuah in­ stansi menawarkan kepada Anda bahwa Anda bisa diterima sebagai karyawan di perusahaan tersebut. Namun, Anda dimintai sejumlah dana agar proses tersebut berjalan lancar. Sikap Anda adalah ...', 'Memberikan dana tersebut asal Anda bisa bekerja di peru­ sahaan itu', 'Menolak tawaran itu dan men­ coba melamar dengan cara yang baik/ikut seleksi', 'Mempertimbangkan tawaran itu', 'Melaporkan ulah HRD itu kepada pimpinan perusahaan', 'Menerima tawaran itu, toh tidak ada orang yang tahu', '1', '5', '3', '4', '2', '2023-08-30 12:01:01', '2023-08-30 12:01:01'),
(23, 1, 'Sebagian rekan Anda pulang lebih awal sekitar 30 menit dari jadwal kantor. Sikap Anda ...', 'lkut pulang saja', 'Membiarkan mereka pulang dulu karena pekerjaan Anda belum selesai.', 'Tetap  pulang  sesuai  jadwal yang ditetapkan', 'Segera  menyelesaikan  peker­ jaan dan menyusul pulang', 'Melaporkannya	pada  atasan keesokan harinya', '1', '3', '5', '2', '4', '2023-08-30 12:02:54', '2023-08-30 12:02:54'),
(24, 1, 'Dalam suatu diskusi, pendapat Anda ditolak oleh  atasan. Sikap Anda adalah ...', 'Menerima dengan tenang', 'Tidak terima dan minta penje­ lasan atasan', 'Kecewa dan lain kali tidak akan menyampaikan pendapat lagi', 'Menerima dan minta penje­ lasan kenapa pendapat itu ditolak', 'Menerima dan minta penje­ lasan kenapa pendapat itu ditolak', '4', '1', '2', '5', '3', '2023-08-30 12:04:18', '2023-08-30 12:04:18'),
(25, 1, 'Di suatu supermarket, Anda melihat seorang   kasir   yang   melakukan kecurangan terhadap pembeli tunanetra. Yang sebaiknya Anda lakukan adalah ...', 'Membiarkannya', 'Menegur dan mengingatkan kasir agar tidak berlaku curang', 'Cuek saja karena bukan urusan Anda', 'Memberitahukan pada pem­ beli bahwa ia dicurangi', 'Melaporkan kasir pada atasan/ pemilik supermarket', '2', '5', '1', '4', '3', '2023-08-30 12:08:55', '2023-08-30 12:08:55'),
(26, 1, 'Saya sering mengingatkan bawah­ an saya untuk tidak melakukan kekeliruan pekerjaan kantor ...', 'Saya pun tidak boleh mela­ kukan kekeliruan tersebut', 'Karena saya atasannya, pera­ turan tersebut tidak berlaku bagi saya sendiri', 'Saya sesekali melakukan keke­ liruan tersebut', 'Peraturan tersebut khusus untuk pegawai setingkat dia', 'Lebih baiksayatidakmelakukan kekeliruan tersebut', '5', '2', '1', '3', '4', '2023-08-30 12:10:33', '2023-08-30 12:10:33'),
(27, 1, 'Ketika di kantor, saya tiba-tiba ingin mem-print tiga lembar data-data pribadi yang tidak ada hubungannya dengan pekerjaan ...', 'Maka saya langsung saja mem­ print di kantor', 'Saya mem-print di kantor na­ mun dengan memakai kertas saya sendiri', 'Saya mem-print di kantor namun menunggu setelah jam kerja selesai.', 'Saya mem-print di rumah saja memakai printer sendiri', 'Saya mem-print di kantor pada saat printer tidak dipakai', '1', '4', '2', '5', '3', '2023-08-30 12:11:54', '2023-08-30 12:11:54'),
(28, 1, 'Ketika banyak pegawai di kantor saya tidak mematuhi peraturan tentang    larangan    penggunaan fasilitas	internet	kantor	untuk keperluan pribadi,pendapat saya ...', 'Saya pun tidak akan mematuhi peraturan yang sangat sulit untuk dipatuhi itu', 'Jika hanya saya yang mematuhi peraturan tersebut, maka perB.	Jika hanya saya yang mematuhi peraturan tersebut, maka perB.	Jika hanya saya yang mematuhi peraturan tersebut, maka percuma saja', 'Saya akan terus mematuhi peraturan tersebut meskipun sebagian besar melanggarnya', 'Saya mematuhi peraturan ter­ sebut dan berusaha meng­ ajak pegawai lain untuk turut mematuhinya', 'Sebaiknya peraturan yang sulit seperti itu harus diubah', '1', '3', '4', '5', '2', '2023-08-30 12:14:08', '2023-08-30 12:14:08'),
(29, 1, 'Ketika seseorang memotong da­ lam antrean, apa yang akan Anda lakukan?', 'Selalu mengabaikannya begitu saja', 'Lebih sering saya abaikan saja karena tidak terlalu penting', 'Tergantung situasi, terkadang saya abaikan terkadang saya tegur', 'Lebih sering saya tegur karena hal tersebut bukanlah hal yang semestinya', 'Selalu saya tegur karena semua harus sesuai dan adil', '1', '2', '3', '4', '5', '2023-08-30 12:15:37', '2023-08-30 12:15:37'),
(30, 1, 'Apakah Anda merasa sulit meminta tolong pada seorang teman untuk melakukan sesuatu untuk Anda?', 'Saya merasa sulit karena saya tidak  ingin  memberatkan orang lain atas tugas saya', 'Jika dalam kondisi benar-benar mendesak maka saya akan minta tolong orang lain', 'Tergantung situasi dan urgensi, terkadang saya meminta to­ long terkadang tidak jika tidak dibutuhkan', 'Saya jarang meminta tolong karena saya merasa itu tugas saya dan saya berusaha me­ nyelesaikannya sendiri', 'Saya tidak pernah merasa sulit karena menurut saya meminta tolong adalah hal yang sopan dan baik', '1', '2', '5', '4', '3', '2023-08-30 12:17:49', '2023-08-30 12:17:49'),
(31, 1, 'Jika atasan Anda meminta suatu permintaan yang  tidak  masuk akal, apakah Anda sulit untuk mengatakan tidak?', 'Jika tugas tersebut memang tidak dapat dikerjakan, me­ ngapa harus memaksa diker­ jakan', 'Jika tugas tersebut dalam proses hanya dapat dise­ lesaikan sedikit maka kemung­ kinan saya tolak', 'Terkadang saya tolak, terka­ dang saya terima, tergantung bagaimana tugas tersebut dan apakah saya dapat menye­ lesaikan', 'Saya jarang menolak perintah atasan kecuali jika hal tersebut benar-benar tidak mungkin', 'Saya akan menerima karena walau  bagaimanapun   juga hal tersebut adalah perintah atasan', '2', '3', '5', '4', '1', '2023-08-30 12:19:27', '2023-08-30 12:19:27'),
(32, 1, 'Apa yang Anda rasakan dan laku­ kan saat menerima pujian dari atasan Anda?', 'Saya merasa sulit menerima pujian tersebut karena menu­ rut saya itu berlebihan', 'Saya merasa sedikit tersipu karena hal tersebut', 'Saya merasa biasa saja', 'Saya merasa bersyukur dan puas atas hasil kerja saya', 'Saya merasa senang dan bangga atas pencapaian saya', '1', '3', '2', '5', '4', '2023-08-30 12:20:47', '2023-08-30 12:20:47'),
(33, 1, 'Apakah Anda secara sukarela memberikan informasi ataupun opini dalam diskusi dengan orang­ orang yang tidak Anda kenal baik?', 'Ya, karena mereka adalah orang terdekat saya dan saya percaya', 'Tergantung seberapa dekat, mungkin untuk keluarga dan sahabat saja', 'Melihat kondisi terlebih da­ hulu, seberapa dekat dan seberapa penting informasi tersebut', 'Saya jarang memberikan infor­ masi kepada orang lain karena takut disalahgunakan', 'Saya selalu menyimpan opini dan informasi tersebut karena untuk profesionalisme', '1', '2', '5', '3', '4', '2023-08-30 12:21:56', '2023-08-30 12:21:56'),
(34, 1, 'Jika ada seorang public figure yang sangat Anda kagumi dan  hormati di  sebuah  event  besar, apa  yang akan Anda lakukan?', 'Saya akan memperkenalkan diri, mengajak ngobrol dan bertukar kartu nama', 'Saya akan cukup bertukar kartu nama, jika saya merasa siap,saya akan berkenalan', 'Tergantung kesiapan saya, terkadang saya tidak berkenalan dan terkadang berkenalan', 'Saya jarang memperkenalkan diri kepada orang penting, biasanya hanya meminta foto', 'Saya tidak pernah berani berkenalan dengan public figure', '5', '4', '3', '2', '1', '2023-08-30 12:23:53', '2023-08-30 12:23:53'),
(35, 1, 'Jika	kolega Anda membatalkan janjinya secara tiba-tiba  untuk suatu keperluan penting,apa yang akan Anda lakukan?', 'Saya akan menunjukkan beta­ pa kecewanya saya', 'Jika hal tersebut bukanlah hal yang cukup penting maka saya tidak akan menunjukkan sikap kecewa', 'Jika hal tersebut dapat di­ toleransi dan dia dapat meng­ atakan dengan jelas maka saya akan biasa saja', 'Jika saya  sangat  kecewa, saya tidak dapat menyem­ bunyikannya', 'Saya selalu dapat menyem­ bunyikan rasa kecewa dan sedih karena tidak ingin orang lain tahu', '1', '4', '5', '2', '3', '2023-08-30 12:26:33', '2023-08-30 12:27:02'),
(36, 1, 'Jika Anda dalam situasi terburu- buru, sedangkan keadaan mem­ butuhkan Anda mendapatkan se- suatu secara cepat, apa yang akan Anda lakukan?', 'Saya akan memaksa dan berusaha keras agar tetap mendapatkan apa yang saya butuhkan', 'Saya akan berusaha keras tetapijika tidak bisa maka saya akan menerimanya', 'Saya berusaha sebisa mungkin untuk mendapatkannya', 'Saya akan berusaha sewa­ jarnya, jika memang tidak mungkin apa boleh buat', 'Jika secara logis tidak mung­ kin, saya tidak akan meng­ usahakan lagi', '1', '5', '2', '4', '3', '2023-08-30 12:28:26', '2023-08-30 12:28:26'),
(37, 1, 'Apakah  Anda  merasa  sulit  untuk menolak permintaan orang lain?', 'Saya sulit menolak karena saya takut orang tersebut tersinggung', 'Sebisa mungkin saya mene­ rima permintaan orang lain jika memang bisa', 'Jika bisa maka saya terima, jika tidak maka tidak saya terima.', 'Saya jarang menerima permin­ taan orang lain yang menurut saya tidak terlalu penting', 'Saya selalu menolak per­ mintaan orang lain jika tidak penting', '1', '4', '5', '3', '2', '2023-08-30 12:30:18', '2023-08-30 12:30:18'),
(38, 1, 'Jika atasan Anda mengungkapkan pendapat yang sangat tidak Anda setujui, apa yang akan Anda lakukan?', 'Saya akan menyatakan penda­ pat saya sejujurnya', 'Saya akan menyatakan pen­ dapat saya secara tersirat', 'Saya akan menyatakan secara tersirat dan memberi solusi tanpa terlihat mengarahkan', 'Saya jarang berani meng­ ungkapkan opini yang ber­ tentangan', 'Saya akan menyetujui walau­ pun  bertentangan  dengan opini karena beliau adalah atasan  yang  harus  saya  hormati', '3', '4', '5', '1', '2', '2023-08-30 12:31:54', '2023-08-30 12:31:54'),
(39, 1, 'Apakah Anda bersikeras agar orang lain melakukan pembagian secara adil?', 'Jelas, karena keadilan adalah utama dan mutlak.', 'Tergantung apakah hal ters­ ebut dapat ditoleransi atau tidak', 'Melihat kondisi, jika kedua pihak puas walaupun bukan pada posisi yang adil maka tidak masalah', 'Walaupun tidak adil, jika pro­ porsinya cukup dan dapat berjalan baik tidak masalah', 'Saya tidak pernah memaksa harus dibagi secara adil', '5', '2', '4', '3', '1', '2023-08-30 12:33:27', '2023-08-30 12:33:27'),
(40, 1, 'Apa  yang  Anda	lakukan   dalam sebuah  diskusi  dengan  kelompok kecil dari teman-teman Anda?', 'Saya adalah pendengar dan pengamat yang baik dalam diskusi.', 'Saya lebih banyak mendengar dan berbicara sekadarnya', 'Jika  perlu  bicara  maka  saya utarakan,jika tidak maka saya cukup mendengar', 'Saya menjadi pengamat seje­ nak lalu aktif berpendapat', 'Saya selalu aktif berpendapat dan mengarahkan teman­ teman untuk  berpendapat juga', '1', '2', '3', '5', '4', '2023-08-30 12:35:11', '2023-08-30 12:35:11'),
(41, 1, 'Bagaimana perasaan Anda jika memiliki pendapat yang berbeda dengan orang lain?', 'Saya merasa aman karena memang sudah seharusnya ada banyak pendapat tentang suatu hal', 'Saya akan mendengarkan dan memperhatikan lalu memi­ kirkannya kembali, mungkin saya dapat mene-rimanya', 'Terkadang saya memikirkan ulang pendapat tersebut dan mencari jalan tengahnya.', 'Saya akan memikirkannya lalu mempertimbangkan pendapat yang lebih baik', 'Saya akan bersikeras memper­ tahankan argumen saya', '2', '3', '5', '4', '1', '2023-08-30 12:36:32', '2023-08-30 12:36:32'),
(42, 1, 'Apakah Anda menunjukkan insiatif dan berusaha untuk mengejar prestasi kinerja?', 'Saya selalu menunjukkan ini­ siatif dalam bekerja', 'Terkadang jika terpikirkan ide, saya akan berinisiatif mela­ kukan sesuatu', 'Tergantung mood dan kondisi pribadi saya', 'Saya jarang menunjukkan inisiatif, tetapi saya pernah melakukannya', 'Saya tidak pernah berinisiatif, tetapi saya melakukan tugas yang ada sebaik mungkin', '5', '4', '3', '2', '1', '2023-08-30 12:38:04', '2023-08-30 12:38:04'),
(43, 1, 'Dalam suatu kelompok, apa yang selalu Anda tampilkan tentang diri Anda?', 'Saya memiliki percaya diri yang tinggi dan berkelas', 'Saya	ingin	menjadi	pusat perhatian dantampil menonjol', 'Saya   menjadi   pihak   tengah yang biasa saja', 'Saya ingin menjadi pengamat dan pendengar yang baik', 'Saya mengikuti alur yang telah ada', '5', '1', '3', '2', '4', '2023-08-30 12:39:21', '2023-08-30 12:39:21'),
(44, 1, 'Sistem bekerja yang paling nyaman bagi Anda adalah ...', 'Saya selalu senang bekerja sendiri', 'Saya dapat bekerja berkelom­ pok, tetapi lebih senang be­ kerja sendiri', 'Saya orang yang dapat be­ kerja berkelompok maupun individu', 'Saya lebih senang bekerja ber­ kelompok namun saya dapat bekerja sendiri', 'Saya selalu senang bekerja dengan  kelompok', '1', '2', '5', '4', '3', '2023-08-30 12:40:39', '2023-08-30 12:40:39'),
(45, 1, 'Apa peran Anda dalam menye­ lesaikan masalah pada suatu kelompok?', 'Saya selalu menjadi tim kreatif yang menghasilkan ide', 'Saya selalu manjadi pemimpin yang memberikan solusi,tetapi pendengar yang baik', 'Saya selalu menjadi pengamat dan menyatukan semua ma­ sukan.', 'Saya selalu mencari jalan te­ ngah', 'Saya akan mengikuti kepu­ tusan terbaik', '4', '5', '3', '2', '1', '2023-08-30 12:42:00', '2023-08-30 12:42:00'),
(46, 1, 'Bagaimana  Anda  membagi  tugas kepada rekan dan bawahan Anda?', 'Saya membaginya sesuai ke­ pribadian dan sifat', 'Saya membaginya sesuai minat dan keinginan', 'Saya  membaginya sesuai ke­ ahlian dan keterampilan', 'Saya membaginya dengan pertimbangan minat dan ke­ mampuannya', 'Saya membaginya sesuai posisi masing-masing', '1', '3', '4', '5', '2', '2023-08-30 12:43:04', '2023-08-30 12:43:04'),
(47, 1, 'Apa	pendapat	Anda	tentang waktu?', 'Tepat waktu adalah segalanya', 'Tepat waktu adalah cara menghargai orang lain, maka membuat perencanaan se­ baiknya selalu dilakukan', 'Harus dapat memanfaatkan waktu semaksimal mungkin secara otomatis', 'Berusaha sebaik mungkin me­ manfaatkan waktu', 'Santai dan berusaha sebaik mungkin', '4', '5', '2', '3', '1', '2023-08-30 12:44:12', '2023-08-30 12:44:12'),
(48, 1, 'Bagaimanakah Anda dalam  me­ ngemukakan pendapat?', 'Saya senang mengemukakan pendapat  walaupun jika  nanti berbeda dengan yang lain', 'Saya  berusaha keras menge­ mukakan pendapat, satu kali tapi  penting.', 'Saya selalu mengutarakan semua yang saya pikirkan', 'Saya hanya mengutarakan pendapat dalam hati.', 'Saya tidak pernah berminat untuk mengutarakan perdapat dan berdebat', '5', '4', '3', '2', '1', '2023-08-30 12:45:20', '2023-08-30 12:45:20'),
(49, 1, 'Bagaimana  Anda  menilai  sebuah permasalahan?', 'Just do it! Lakukan saja untuk menyelesaikannya', 'Mempertimbangkan terlebih dahulu dengan memikir- kannya', 'Meminta pendapat untuk mencari solusi', 'Menambah informasi, mem- pertimbangkan, kemudian eksekusi.', 'Melakukan sebisa mungkin sambil berpikir cara terbaik', '1', '3', '2', '5', '4', '2023-08-30 12:46:35', '2023-08-30 12:46:35'),
(50, 1, 'Bagaimana  pribadi  Anda  menye­ lesaikan sebuah masalah?', 'Menyelesaikannya sendiri', 'Berusaha sebisa mungkin diselesaikan sendiri dan jarang meminta tolong orang lain', 'Saya berusaha menyelesaikan sendiri sambil meminta tolong orang lain', 'Meminta pertolongan untuk bersama-sama menyelesaikan namun terkadang menyelesai­ kan sendiri', 'Selalu meminta bantuan orang lain', '2', '5', '4', '3', '1', '2023-08-30 12:48:05', '2023-08-30 12:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `posisi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quality Assurance', 0, '2023-08-30 09:03:22', '2023-08-31 09:28:37'),
(2, 'FrontEnd Developer', 1, '2023-08-30 09:03:42', '2023-08-30 09:04:04'),
(3, 'BackEnd Developer', 0, '2023-08-30 09:03:51', '2023-08-31 09:28:41'),
(4, 'Administrator', 1, '2023-08-30 09:04:02', '2023-08-30 09:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'hrd', NULL, NULL),
(3, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rules_pengerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `rules_pengerjaan`, `created_at`, `updated_at`) VALUES
(1, 'Gunakan perangkat yang sesuai dan mendukung ( PC / Laptop )', '2023-08-30 09:27:17', '2023-08-30 09:27:17'),
(2, 'Tidak boleh meninggalkan tempat / device saat tes berlangsung', '2023-08-30 09:34:58', '2023-08-30 09:34:58'),
(3, 'Hindari melanggar aturan yang telah ditetapkan oleh penyelenggara tes', '2023-08-30 09:35:27', '2023-08-30 09:35:27'),
(4, 'Fokuslah pada tugas yang ada dan berikan perhatian penuh pada setiap pertanyaan', '2023-08-30 09:35:46', '2023-08-30 09:35:46'),
(5, 'Jangan mencoba mengakses atau menyebarkan informasi tes atau pertanyaan yang dilindungi hak cipta', '2023-08-30 09:35:54', '2023-08-30 09:35:54'),
(6, 'Pastikan perangkat Anda memiliki koneksi internet yang stabil', '2023-08-30 09:36:02', '2023-08-30 09:36:02'),
(7, 'Patuhi batas waktu yang ditentukan untuk setiap tes', '2023-08-30 09:36:11', '2023-08-30 09:36:11'),
(8, 'Pastikan Anda menjalankan psikotes dengan jujur dan tidak menggunkan bantuan eksternal', '2023-08-30 09:36:20', '2023-08-30 09:36:20'),
(9, 'tidak boleh melakukan kecurangan', '2023-08-31 09:29:17', '2023-08-31 09:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `sesi_psikotes`
--

CREATE TABLE `sesi_psikotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paket_soal_id` bigint(20) NOT NULL,
  `peserta_id` bigint(20) NOT NULL,
  `waktu_pengerjaan` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posisi_pilihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `nama_lengkap`, `gender`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `posisi_pilihan`, `role_id`, `status`, `images`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'admin', 'admin@gmail.com', NULL, '$2y$10$Eh1jR53pEONFToKyMA4/P.tpPT2i2OatKV2LwIdzgTyGh70xaRHSO', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, '2023-08-30 08:56:31', '2023-08-30 08:56:31'),
(7, 'hrd', 'hrd@gmail.com', NULL, '$2y$10$alm7Oa/LgYHpSsRy0CNWQeUdPvCgKLlh2ts5m0uvvuOF5aXk.DqzG', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, '2023-08-30 09:01:20', '2023-08-30 09:01:20'),
(8, 'deyantra', 'deyantraa@gmail.com', NULL, '$2y$10$HAtfKBHYD7lJzKEaLJiILuUPpNWgaDbbYCwkb84ZtkAPsnueG0Z/K', 'Deyantra Putra', 'Laki - laki', 'Jombang', 'Kediri', '2003-07-17', 'Quality Assurance', 1, 0, NULL, NULL, '2023-08-30 21:15:23', '2023-08-30 22:03:12'),
(10, 'arjun', 'harjunosetyawan@gmail.com', NULL, '$2y$10$4nDp6boFp2lSUHP2grP65Orbe3ehwkfh/X.lBGg5Y4isAhaOwBtX2', 'Harjuno Setyawan', 'Laki - laki', 'Mojosongo', 'Solo', '2000-11-23', 'FrontEnd Developer', 1, 1, NULL, NULL, '2023-08-30 21:37:29', '2023-08-30 21:39:12'),
(11, 'vnz', 'vnzansyah@gmail.com', NULL, '$2y$10$0DpA70pB3jbM/48DTYDPWuSL0qu7UBjiK6mPUbR0kjFIJefAaiAWy', 'Putra Nusantara', 'Laki - laki', 'Jebres', 'Kediri', '2002-07-18', 'Administrator', 1, 1, NULL, NULL, '2023-08-30 21:52:59', '2023-08-30 21:57:23'),
(12, 'dev', 'vpriansyah@gmail.com', NULL, '$2y$10$tJzNaaIbT9TYDbpctnKOZe9WFxZPUCaOsnsQM8LkY3T5feahU0VRS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-08-30 22:01:37', '2023-08-30 22:01:37'),
(13, 'vpriansyah', 'vpriansyah@student.uns.ac.id', NULL, '$2y$10$sQfmZs3V9cYMVA9lmEMCuOTeqgpd2J3yW8B5rkCKcT9lg1C1p8Omm', 'Devanza Priansyah Putra', 'Laki - laki', 'Kediri', 'Kediri', '2003-03-08', 'BackEnd Developer', 1, 1, NULL, NULL, '2023-08-31 09:16:25', '2023-08-31 09:24:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alur`
--
ALTER TABLE `alur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasil_test`
--
ALTER TABLE `hasil_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_id` (`peserta_id`);

--
-- Indexes for table `informasi_kategori`
--
ALTER TABLE `informasi_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_tes`
--
ALTER TABLE `kategori_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_soal`
--
ALTER TABLE `paket_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paket_soal_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesi_psikotes`
--
ALTER TABLE `sesi_psikotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sesi_psikotes_paket_soal_id_unique` (`paket_soal_id`),
  ADD UNIQUE KEY `sesi_psikotes_peserta_id_unique` (`peserta_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`),
  ADD KEY `users_status_index` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alur`
--
ALTER TABLE `alur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_test`
--
ALTER TABLE `hasil_test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `informasi_kategori`
--
ALTER TABLE `informasi_kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_tes`
--
ALTER TABLE `kategori_tes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paket_soal`
--
ALTER TABLE `paket_soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sesi_psikotes`
--
ALTER TABLE `sesi_psikotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
