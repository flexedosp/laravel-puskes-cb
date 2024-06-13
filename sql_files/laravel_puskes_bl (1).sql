-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 05:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_puskes_bl`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `terbit` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `deletedAt` date DEFAULT NULL,
  `deletedBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `nama`, `deskripsi`, `gambar`, `slug`, `terbit`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`, `created_at`, `updated_at`) VALUES
(1, 'Puskesmas Sukamaju Beri Layanan Gratis', 'Dalam rangka memperingati Hari Kesehatan Nasional, Puskesmas Sukamaju memberikan layanan kesehatan gratis kepada seluruh warga. Acara ini bertujuan untuk meningkatkan kesadaran masyarakat tentang pentingnya menjaga kesehatan dan menyediakan akses mudah bagi mereka yang membutuhkan perawatan. Berbagai layanan yang ditawarkan meliputi pemeriksaan umum, konsultasi dokter, dan penyuluhan kesehatan. Warga sangat antusias dan merasa terbantu dengan adanya layanan ini.', 'default_content.png', 'puskesmas-sukamaju-beri-layanan-gratis', 1, '2024-06-01', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Program Vaksinasi di Puskesmas Harapan', 'Puskesmas Harapan telah memulai program vaksinasi COVID-19 untuk warga lanjut usia di daerah tersebut. Program ini diadakan sebagai langkah untuk melindungi populasi rentan dari virus. Puskesmas bekerja sama dengan pihak berwenang setempat untuk memastikan kelancaran dan keamanan proses vaksinasi. Selain vaksinasi, warga juga diberikan edukasi mengenai pencegahan COVID-19 dan pentingnya menjaga protokol kesehatan. Warga lanjut usia sangat antusias dan berterima kasih atas layanan ini.', 'default_content.png', 'program-vaksinasi-di-puskesmas-harapan', 1, '2024-06-02', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Puskesmas Cendana Lakukan Edukasi Gizi', 'Puskesmas Cendana mengadakan acara edukasi tentang gizi seimbang untuk anak-anak sekolah dasar di wilayahnya. Acara ini bertujuan untuk meningkatkan kesadaran tentang pentingnya pola makan sehat sejak usia dini. Anak-anak diajarkan cara memilih makanan bergizi, pentingnya sarapan, dan bagaimana membuat pilihan makanan yang sehat. Orang tua juga diundang untuk berpartisipasi dan mendukung program ini di rumah. Edukasi ini diharapkan dapat mendorong kebiasaan makan yang baik dan mendukung pertumbuhan anak yang sehat.', 'default_content.png', 'puskesmas-cendana-lakukan-edukasi-gizi', 1, '2024-06-03', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Layanan Kesehatan Ibu dan Anak di Puskesmas Karya', 'Puskesmas Karya memperkenalkan layanan baru yang berfokus pada kesehatan ibu dan anak. Layanan ini mencakup pemeriksaan kesehatan rutin, konseling gizi, dan pendidikan tentang perawatan bayi. Dengan layanan ini, puskesmas berupaya memastikan bahwa ibu dan anak mendapatkan perawatan terbaik selama masa kehamilan dan setelah melahirkan. Program ini juga mencakup penyuluhan tentang pentingnya imunisasi dan kebersihan yang baik. Puskesmas berharap dapat meningkatkan kualitas hidup keluarga melalui inisiatif ini.', 'default_content.png', 'layanan-kesehatan-ibu-dan-anak-di-puskesmas-karya', 1, '2024-06-04', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Puskesmas Pelita Buka Klinik Gigi', 'Puskesmas Pelita kini membuka klinik gigi yang menyediakan layanan konsultasi dan perawatan gigi dasar bagi masyarakat. Klinik ini dilengkapi dengan peralatan modern dan dokter gigi yang berpengalaman. Layanan yang ditawarkan meliputi pemeriksaan gigi rutin, pembersihan, dan perawatan gigi berlubang. Tujuan utama dari klinik ini adalah untuk meningkatkan kesehatan gigi dan mulut masyarakat serta memberikan edukasi tentang pentingnya perawatan gigi yang baik sejak dini. Warga sangat menyambut baik pembukaan klinik ini.', 'default_content.png', 'puskesmas-pelita-buka-klinik-gigi', 1, '2024-06-05', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Puskesmas Sejahtera Gelar Pemeriksaan Kesehatan Gratis', 'Dalam rangka merayakan ulang tahun ke-10, Puskesmas Sejahtera mengadakan pemeriksaan kesehatan gratis untuk semua warga. Pemeriksaan ini mencakup pengecekan tekanan darah, kadar gula darah, kolesterol, serta konsultasi dengan dokter umum. Selain itu, puskesmas juga menyediakan penyuluhan tentang gaya hidup sehat dan pencegahan penyakit. Acara ini bertujuan untuk meningkatkan kesadaran kesehatan di kalangan masyarakat dan mendeteksi masalah kesehatan sejak dini. Partisipasi warga sangat tinggi dan banyak yang mendapatkan manfaat dari pemeriksaan ini.', 'default_content.png', 'puskesmas-sejahtera-gelar-pemeriksaan-kesehatan-gratis', 1, '2024-06-06', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Puskesmas Maju Bersama Tingkatkan Fasilitas', 'Puskesmas Maju Bersama melakukan renovasi besar-besaran untuk meningkatkan fasilitas dan pelayanan kesehatan yang mereka tawarkan. Renovasi ini mencakup perluasan ruang tunggu, peningkatan ruang perawatan, dan penambahan peralatan medis baru. Tujuan utama dari proyek ini adalah untuk memberikan kenyamanan lebih kepada pasien dan memastikan bahwa mereka menerima perawatan yang berkualitas. Selain itu, puskesmas juga memperbarui sistem manajemen pasien untuk mempercepat proses administrasi dan mengurangi waktu tunggu. Warga sangat mengapresiasi upaya ini dan berharap pelayanan puskesmas akan semakin baik.', 'default_content.png', 'puskesmas-maju-bersama-tingkatkan-fasilitas', 1, '2024-06-07', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Puskesmas Kasih Ibu Adakan Lomba Kebersihan', 'Puskesmas Kasih Ibu mengadakan lomba kebersihan antar RW sebagai bagian dari upaya untuk meningkatkan kesadaran tentang pentingnya kebersihan lingkungan. Lomba ini diikuti oleh berbagai RW yang berlomba untuk menunjukkan lingkungan mereka yang paling bersih dan sehat. Puskesmas memberikan edukasi tentang cara menjaga kebersihan lingkungan, termasuk pengelolaan sampah dan pencegahan penyakit. Pemenang lomba akan mendapatkan penghargaan dan hadiah untuk memotivasi mereka dalam menjaga kebersihan. Warga sangat antusias berpartisipasi dan banyak RW yang telah melakukan perubahan positif sebagai hasil dari lomba ini.', 'default_content.png', 'puskesmas-kasih-ibu-adakan-lomba-kebersihan', 1, '2024-06-08', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Puskesmas Bhakti Rakyat Buka Layanan Psikologi', 'Puskesmas Bhakti Rakyat kini menyediakan layanan konsultasi psikologi bagi warga yang membutuhkan. Layanan ini bertujuan untuk membantu warga yang mengalami stres, kecemasan, atau masalah kesehatan mental lainnya. Dengan adanya layanan ini, puskesmas berharap dapat memberikan dukungan yang lebih holistik kepada masyarakat, tidak hanya dalam hal kesehatan fisik tetapi juga mental. Warga dapat berkonsultasi dengan psikolog berpengalaman untuk mendapatkan bantuan dan dukungan. Puskesmas juga mengadakan sesi edukasi tentang kesehatan mental untuk meningkatkan kesadaran dan mengurangi stigma terkait masalah kesehatan mental.', 'default_content.png', 'puskesmas-bhakti-rakyat-buka-layanan-psikologi', 1, '2024-06-09', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Puskesmas Sumber Sehat Adakan Donor Darah', 'Puskesmas Sumber Sehat bekerja sama dengan Palang Merah Indonesia mengadakan acara donor darah bagi masyarakat. Acara ini bertujuan untuk membantu mengisi stok darah yang sering kali menipis dan mendukung mereka yang membutuhkan transfusi darah. Puskesmas menyediakan fasilitas dan tenaga medis untuk memastikan proses donor darah berjalan lancar dan aman. Selain itu, warga juga diberikan edukasi tentang manfaat donor darah bagi kesehatan dan pentingnya kegiatan ini dalam menyelamatkan nyawa. Partisipasi warga sangat tinggi dan banyak yang ingin berkontribusi dalam acara ini.', 'default_content.png', 'puskesmas-sumber-sehat-adakan-donor-darah', 1, '2024-06-10', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '0001_01_01_000000_create_users_table', 1),
(19, '0001_01_01_000001_create_cache_table', 1),
(20, '0001_01_01_000002_create_jobs_table', 1),
(21, '2024_06_12_040032_create_berita', 1),
(22, '2024_06_12_040122_create_modul', 1),
(23, '2024_06_12_040720_create_status_publikasi', 1),
(24, '2024_06_12_040759_create_tingkatan_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `terbit` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `deletedAt` date DEFAULT NULL,
  `deletedBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `nama`, `deskripsi`, `slug`, `gambar`, `terbit`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`, `created_at`, `updated_at`) VALUES
(1, 'Modul Asuh Anak', 'Modul asuh anak memberikan panduan lengkap untuk orang tua dalam merawat dan membesarkan anak-anak mereka. Ini mencakup aspek-aspek penting seperti perawatan fisik, kesehatan emosional, dan perkembangan sosial anak. Dengan pengetahuan yang tepat, orang tua dapat membantu anak-anak mereka tumbuh menjadi individu yang sehat dan bahagia. Modul ini juga mencakup tips praktis dan strategi untuk menghadapi tantangan umum dalam pengasuhan anak, serta cara membangun hubungan yang kuat dan penuh kasih dengan anak.', 'modul-asuh-anak', 'img_asuh_anak.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(2, 'Modul Tumbuh Kembang Anak', 'Modul tumbuh kembang anak menjelaskan tahapan-tahapan penting dalam perkembangan anak mulai dari bayi hingga remaja. Setiap fase perkembangan, dari kemampuan motorik, kognitif, hingga sosial, membutuhkan pendekatan dan perhatian yang berbeda. Modul ini membantu orang tua memahami bagaimana mendukung anak mereka di setiap tahap perkembangan. Informasi tentang perkembangan normal dan tanda-tanda potensial dari masalah perkembangan juga disediakan untuk membantu dalam deteksi dini dan intervensi yang tepat.', 'modul-tumbuh-kembang-anak', 'img_tumbuhkembang_anak.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(3, 'Pentingnya Aktivitas Fisik', 'Aktivitas fisik memainkan peran penting dalam menjaga kesehatan dan kebugaran tubuh. Berolahraga secara teratur dapat membantu menurunkan berat badan, mengurangi risiko penyakit kronis, memperbaiki kesehatan mental, dan meningkatkan energi. Aktivitas fisik juga memperkuat otot dan tulang, serta meningkatkan kualitas tidur. Rekomendasi umum adalah berolahraga setidaknya 30 menit sehari untuk mendapatkan manfaat kesehatan yang optimal.', 'pentingnya-aktivitas-fisik', 'default_content.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(4, 'Pola Tidur yang Sehat', 'Pola tidur yang sehat sangat penting untuk fungsi tubuh yang optimal. Kurang tidur dapat mempengaruhi kesehatan fisik dan mental, termasuk penurunan daya tahan tubuh, penambahan berat badan, dan gangguan mood. Untuk tidur yang berkualitas, disarankan untuk memiliki jadwal tidur yang konsisten, menciptakan lingkungan tidur yang nyaman, dan menghindari stimulasi seperti layar elektronik sebelum tidur. Tidur cukup juga berkontribusi pada kemampuan konsentrasi dan memori yang baik.', 'pola-tidur-yang-sehat', 'default_content.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(5, 'Pentingnya Hidrasi', 'Minum cukup air sangat penting untuk menjaga kesehatan. Tubuh membutuhkan air untuk menjalankan fungsi-fungsi vital seperti menjaga suhu tubuh, melumasi sendi, dan menghilangkan racun. Kekurangan hidrasi dapat menyebabkan dehidrasi, yang dapat mempengaruhi fungsi kognitif dan energi. Dianjurkan untuk minum setidaknya 8 gelas air sehari atau lebih tergantung pada aktivitas dan kondisi lingkungan. Hidrasi yang baik juga penting untuk kesehatan kulit dan pencernaan.', 'pentingnya-hidrasi', 'default_content.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(6, 'Kesehatan Jantung', 'Menjaga kesehatan jantung adalah kunci untuk umur panjang. Penyakit jantung adalah salah satu penyebab kematian utama di dunia. Untuk menjaga jantung yang sehat, penting untuk makan makanan rendah lemak jenuh, berolahraga secara teratur, dan menjaga berat badan yang sehat. Menghindari merokok dan mengontrol tekanan darah dan kolesterol juga sangat penting. Memantau kesehatan jantung secara rutin dapat membantu mendeteksi masalah sejak dini dan mencegah komplikasi lebih lanjut.', 'kesehatan-jantung', 'default_content.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(7, 'Pentingnya Vaksinasi', 'Vaksinasi adalah cara efektif untuk mencegah penyakit menular. Vaksin bekerja dengan membantu tubuh mengenali dan melawan patogen tertentu sebelum menyebabkan infeksi. Vaksinasi yang tepat waktu dan lengkap dapat melindungi individu dan masyarakat dari wabah penyakit seperti influenza, polio, dan COVID-19. Imunisasi juga membantu mengurangi penyebaran penyakit dan melindungi orang yang tidak bisa divaksinasi karena alasan kesehatan. Menjaga jadwal vaksinasi yang direkomendasikan sangat penting.', 'pentingnya-vaksinasi', 'default_content.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(8, 'Kesehatan Gigi dan Mulut', 'Kesehatan gigi dan mulut yang baik penting untuk kualitas hidup secara keseluruhan. Masalah gigi seperti karies dan penyakit gusi dapat menyebabkan nyeri, infeksi, dan masalah lain jika tidak diobati. Menjaga kesehatan mulut meliputi menyikat gigi dua kali sehari, menggunakan benang gigi, dan mengunjungi dokter gigi secara teratur. Makanan yang sehat dan menghindari gula berlebih juga dapat membantu menjaga gigi dan gusi tetap sehat. Pencegahan lebih baik daripada pengobatan dalam hal kesehatan mulut.', 'kesehatan-gigi-dan-mulut', 'default_content.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(9, 'Pentingnya Kesehatan Mental', 'Kesehatan mental sama pentingnya dengan kesehatan fisik. Mengabaikan kesehatan mental dapat menyebabkan gangguan seperti depresi, kecemasan, dan stres kronis. Untuk menjaga kesehatan mental, penting untuk mengenali tanda-tanda gangguan, berbicara dengan profesional kesehatan mental, dan mencari dukungan sosial. Aktivitas fisik, tidur yang cukup, dan pola makan yang sehat juga berkontribusi pada kesejahteraan mental. Membuat waktu untuk relaksasi dan hobi juga dapat membantu menjaga kesehatan mental yang baik.', 'pentingnya-kesehatan-mental', 'default_content.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35'),
(10, 'Panduan Nutrisi Sehat', 'Panduan nutrisi sehat memberikan pedoman untuk mengkonsumsi makanan yang mendukung kesehatan optimal. Ini melibatkan memilih makanan yang kaya nutrisi, seperti buah, sayuran, protein tanpa lemak, dan biji-bijian. Mengurangi asupan garam, gula, dan lemak jenuh juga penting. Nutrisi yang seimbang dapat membantu menjaga berat badan, meningkatkan energi, dan mencegah penyakit kronis. Edukasi tentang nutrisi yang baik dan kebiasaan makan sehat sangat penting untuk kesehatan jangka panjang.', 'panduan-nutrisi-sehat', 'default_content.png', 1, '2024-06-12', 'admin', NULL, NULL, NULL, NULL, '2024-06-12 14:25:35', '2024-06-12 14:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MvECw9a3AbEG4wIJtfDzAL8SVlBKA5k6FeuVuZsm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0M1WDVwVlczeURSSXRCWWZoUEIwcnE1aDBRb3hkUGdONGdaNXkyVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYXlhbmFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718207687);

-- --------------------------------------------------------

--
-- Table structure for table `status_publikasi`
--

CREATE TABLE `status_publikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan_users`
--

CREATE TABLE `tingkatan_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `deletedAt` date DEFAULT NULL,
  `deletedBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `status_publikasi`
--
ALTER TABLE `status_publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkatan_users`
--
ALTER TABLE `tingkatan_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_publikasi`
--
ALTER TABLE `status_publikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tingkatan_users`
--
ALTER TABLE `tingkatan_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
