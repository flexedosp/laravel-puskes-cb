<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('berita')->insert([
            [
                'id' => 1,
                'nama' => 'Puskesmas Sukamaju Beri Layanan Gratis',
                'deskripsi' => 'Dalam rangka memperingati Hari Kesehatan Nasional, Puskesmas Sukamaju memberikan layanan kesehatan gratis kepada seluruh warga. Acara ini bertujuan untuk meningkatkan kesadaran masyarakat tentang pentingnya menjaga kesehatan dan menyediakan akses mudah bagi mereka yang membutuhkan perawatan. Berbagai layanan yang ditawarkan meliputi pemeriksaan umum, konsultasi dokter, dan penyuluhan kesehatan. Warga sangat antusias dan merasa terbantu dengan adanya layanan ini.',
                'gambar' => 'default_content.png',
                'slug' => 'puskesmas-sukamaju-beri-layanan-gratis',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 2,
                'nama' => 'Program Vaksinasi di Puskesmas Harapan',
                'deskripsi' => 'Puskesmas Harapan telah memulai program vaksinasi COVID-19 untuk warga lanjut usia di daerah tersebut. Program ini diadakan sebagai langkah untuk melindungi populasi rentan dari virus. Puskesmas bekerja sama dengan pihak berwenang setempat untuk memastikan kelancaran dan keamanan proses vaksinasi. Selain vaksinasi, warga juga diberikan edukasi mengenai pencegahan COVID-19 dan pentingnya menjaga protokol kesehatan. Warga lanjut usia sangat antusias dan berterima kasih atas layanan ini.',
                'gambar' => 'default_content.png',
                'slug' => 'program-vaksinasi-di-puskesmas-harapan',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 3,
                'nama' => 'Puskesmas Cendana Lakukan Edukasi Gizi',
                'deskripsi' => 'Puskesmas Cendana mengadakan acara edukasi tentang gizi seimbang untuk anak-anak sekolah dasar di wilayahnya. Acara ini bertujuan untuk meningkatkan kesadaran tentang pentingnya pola makan sehat sejak usia dini. Anak-anak diajarkan cara memilih makanan bergizi, pentingnya sarapan, dan bagaimana membuat pilihan makanan yang sehat. Orang tua juga diundang untuk berpartisipasi dan mendukung program ini di rumah. Edukasi ini diharapkan dapat mendorong kebiasaan makan yang baik dan mendukung pertumbuhan anak yang sehat.',
                'gambar' => 'default_content.png',
                'slug' => 'puskesmas-cendana-lakukan-edukasi-gizi',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 4,
                'nama' => 'Layanan Kesehatan Ibu dan Anak di Puskesmas Karya',
                'deskripsi' => 'Puskesmas Karya memperkenalkan layanan baru yang berfokus pada kesehatan ibu dan anak. Layanan ini mencakup pemeriksaan kesehatan rutin, konseling gizi, dan pendidikan tentang perawatan bayi. Dengan layanan ini, puskesmas berupaya memastikan bahwa ibu dan anak mendapatkan perawatan terbaik selama masa kehamilan dan setelah melahirkan. Program ini juga mencakup penyuluhan tentang pentingnya imunisasi dan kebersihan yang baik. Puskesmas berharap dapat meningkatkan kualitas hidup keluarga melalui inisiatif ini.',
                'gambar' => 'default_content.png',
                'slug' => 'layanan-kesehatan-ibu-dan-anak-di-puskesmas-karya',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 5,
                'nama' => 'Puskesmas Pelita Buka Klinik Gigi',
                'deskripsi' => 'Puskesmas Pelita kini membuka klinik gigi yang menyediakan layanan konsultasi dan perawatan gigi dasar bagi masyarakat. Klinik ini dilengkapi dengan peralatan modern dan dokter gigi yang berpengalaman. Layanan yang ditawarkan meliputi pemeriksaan gigi rutin, pembersihan, dan perawatan gigi berlubang. Tujuan utama dari klinik ini adalah untuk meningkatkan kesehatan gigi dan mulut masyarakat serta memberikan edukasi tentang pentingnya perawatan gigi yang baik sejak dini. Warga sangat menyambut baik pembukaan klinik ini.',
                'gambar' => 'default_content.png',
                'slug' => 'puskesmas-pelita-buka-klinik-gigi',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 6,
                'nama' => 'Puskesmas Sejahtera Gelar Pemeriksaan Kesehatan Gratis',
                'deskripsi' => 'Dalam rangka merayakan ulang tahun ke-10, Puskesmas Sejahtera mengadakan pemeriksaan kesehatan gratis untuk semua warga. Pemeriksaan ini mencakup pengecekan tekanan darah, kadar gula darah, kolesterol, serta konsultasi dengan dokter umum. Selain itu, puskesmas juga menyediakan penyuluhan tentang gaya hidup sehat dan pencegahan penyakit. Acara ini bertujuan untuk meningkatkan kesadaran kesehatan di kalangan masyarakat dan mendeteksi masalah kesehatan sejak dini. Partisipasi warga sangat tinggi dan banyak yang mendapatkan manfaat dari pemeriksaan ini.',
                'gambar' => 'default_content.png',
                'slug' => 'puskesmas-sejahtera-gelar-pemeriksaan-kesehatan-gratis',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 7,
                'nama' => 'Puskesmas Maju Bersama Tingkatkan Fasilitas',
                'deskripsi' => 'Puskesmas Maju Bersama melakukan renovasi besar-besaran untuk meningkatkan fasilitas dan pelayanan kesehatan yang mereka tawarkan. Renovasi ini mencakup perluasan ruang tunggu, peningkatan ruang perawatan, dan penambahan peralatan medis baru. Tujuan utama dari proyek ini adalah untuk memberikan kenyamanan lebih kepada pasien dan memastikan bahwa mereka menerima perawatan yang berkualitas. Selain itu, puskesmas juga memperbarui sistem manajemen pasien untuk mempercepat proses administrasi dan mengurangi waktu tunggu. Warga sangat mengapresiasi upaya ini dan berharap pelayanan puskesmas akan semakin baik.',
                'gambar' => 'default_content.png',
                'slug' => 'puskesmas-maju-bersama-tingkatkan-fasilitas',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 8,
                'nama' => 'Puskesmas Kasih Ibu Adakan Lomba Kebersihan',
                'deskripsi' => 'Puskesmas Kasih Ibu mengadakan lomba kebersihan antar RW sebagai bagian dari upaya untuk meningkatkan kesadaran tentang pentingnya kebersihan lingkungan. Lomba ini diikuti oleh berbagai RW yang berlomba untuk menunjukkan lingkungan mereka yang paling bersih dan sehat. Puskesmas memberikan edukasi tentang cara menjaga kebersihan lingkungan, termasuk pengelolaan sampah dan pencegahan penyakit. Pemenang lomba akan mendapatkan penghargaan dan hadiah untuk memotivasi mereka dalam menjaga kebersihan. Warga sangat antusias berpartisipasi dan banyak RW yang telah melakukan perubahan positif sebagai hasil dari lomba ini.',
                'gambar' => 'default_content.png',
                'slug' => 'puskesmas-kasih-ibu-adakan-lomba-kebersihan',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 9,
                'nama' => 'Puskesmas Bhakti Rakyat Buka Layanan Psikologi',
                'deskripsi' => 'Puskesmas Bhakti Rakyat kini menyediakan layanan konsultasi psikologi bagi warga yang membutuhkan. Layanan ini bertujuan untuk membantu warga yang mengalami stres, kecemasan, atau masalah kesehatan mental lainnya. Dengan adanya layanan ini, puskesmas berharap dapat memberikan dukungan yang lebih holistik kepada masyarakat, tidak hanya dalam hal kesehatan fisik tetapi juga mental. Warga dapat berkonsultasi dengan psikolog berpengalaman untuk mendapatkan bantuan dan dukungan. Puskesmas juga mengadakan sesi edukasi tentang kesehatan mental untuk meningkatkan kesadaran dan mengurangi stigma terkait masalah kesehatan mental.',
                'gambar' => 'default_content.png',
                'slug' => 'puskesmas-bhakti-rakyat-buka-layanan-psikologi',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
            [
                'id' => 10,
                'nama' => 'Puskesmas Sumber Sehat Adakan Donor Darah',
                'deskripsi' => 'Puskesmas Sumber Sehat bekerja sama dengan Palang Merah Indonesia mengadakan acara donor darah bagi masyarakat. Acara ini bertujuan untuk membantu mengisi stok darah yang sering kali menipis dan mendukung mereka yang membutuhkan transfusi darah. Puskesmas menyediakan fasilitas dan tenaga medis untuk memastikan proses donor darah berjalan lancar dan aman. Selain itu, warga juga diberikan edukasi tentang manfaat donor darah bagi kesehatan dan pentingnya kegiatan ini dalam menyelamatkan nyawa. Partisipasi warga sangat tinggi dan banyak yang ingin berkontribusi dalam acara ini.',
                'gambar' => 'default_content.png',
                'slug' => 'puskesmas-sumber-sehat-adakan-donor-darah',
                'terbit' => 2,
                'created_at' => Carbon::now(),
                'created_by' => 'admin',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL
            ],
        ]);
    }
}
