<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modul')->insert([
            [
                'id' => 1,
                'nama' => 'Modul Asuh Anak',
                'deskripsi' => 'Anak usia dini merupakan pondasi awal menjadi manusia unggul. Dengan modul pengasuhan positif, Ayah Ibu dapat melewati berbagai fase yang menantang. Modul asuh anak memberikan panduan lengkap untuk orang tua dalam merawat dan membesarkan anak-anak mereka. Ini mencakup aspek-aspek penting seperti perawatan fisik, kesehatan emosional, dan perkembangan sosial anak. Dengan pengetahuan yang tepat, orang tua dapat membantu anak-anak mereka tumbuh menjadi individu yang sehat dan bahagia. Modul ini juga mencakup tips praktis dan strategi untuk menghadapi tantangan umum dalam pengasuhan anak, serta cara membangun hubungan yang kuat dan penuh kasih dengan anak.',
                'slug' => 'modul-asuh-anak',
                'gambar' => 'img_asuh_anak.png',
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
                'nama' => 'Modul Tumbuh Kembang Anak',
                'deskripsi' => 'Modul tumbuh kembang anak menjelaskan tahapan-tahapan penting dalam perkembangan anak mulai dari bayi hingga remaja. Setiap fase perkembangan, dari kemampuan motorik, kognitif, hingga sosial, membutuhkan pendekatan dan perhatian yang berbeda. Modul ini membantu orang tua memahami bagaimana mendukung anak mereka di setiap tahap perkembangan. Informasi tentang perkembangan normal dan tanda-tanda potensial dari masalah perkembangan juga disediakan untuk membantu dalam deteksi dini dan intervensi yang tepat. Temukan potensi anak dengan stimulasi ragam permainan yang dapat diterapkan dengan mudah dan murah dari rumah. Dengan stimulasi ini, anak akan tumbuh menjadi pembelajar sepanjang hayat yang Bahagia.',
                'slug' => 'modul-tumbuh-kembang-anak',
                'gambar' => 'img_tumbuhkembang_anak.png',
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
                'nama' => 'Pentingnya Aktivitas Fisik',
                'deskripsi' => 'Aktivitas fisik memainkan peran penting dalam menjaga kesehatan dan kebugaran tubuh. Berolahraga secara teratur dapat membantu menurunkan berat badan, mengurangi risiko penyakit kronis, memperbaiki kesehatan mental, dan meningkatkan energi. Aktivitas fisik juga memperkuat otot dan tulang, serta meningkatkan kualitas tidur. Rekomendasi umum adalah berolahraga setidaknya 30 menit sehari untuk mendapatkan manfaat kesehatan yang optimal.',
                'slug' => 'pentingnya-aktivitas-fisik',
                'gambar' => 'default_content.png',
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
                'nama' => 'Pola Tidur yang Sehat',
                'deskripsi' => 'Pola tidur yang sehat sangat penting untuk fungsi tubuh yang optimal. Kurang tidur dapat mempengaruhi kesehatan fisik dan mental, termasuk penurunan daya tahan tubuh, penambahan berat badan, dan gangguan mood. Untuk tidur yang berkualitas, disarankan untuk memiliki jadwal tidur yang konsisten, menciptakan lingkungan tidur yang nyaman, dan menghindari stimulasi seperti layar elektronik sebelum tidur. Tidur cukup juga berkontribusi pada kemampuan konsentrasi dan memori yang baik.',
                'slug' => 'pola-tidur-yang-sehat',
                'gambar' => 'default_content.png',
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
                'nama' => 'Pentingnya Hidrasi',
                'deskripsi' => 'Minum cukup air sangat penting untuk menjaga kesehatan. Tubuh membutuhkan air untuk menjalankan fungsi-fungsi vital seperti menjaga suhu tubuh, melumasi sendi, dan menghilangkan racun. Kekurangan hidrasi dapat menyebabkan dehidrasi, yang dapat mempengaruhi fungsi kognitif dan energi. Dianjurkan untuk minum setidaknya 8 gelas air sehari atau lebih tergantung pada aktivitas dan kondisi lingkungan. Hidrasi yang baik juga penting untuk kesehatan kulit dan pencernaan.',
                'slug' => 'pentingnya-hidrasi',
                'gambar' => 'default_content.png',
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
                'nama' => 'Kesehatan Jantung',
                'deskripsi' => 'Menjaga kesehatan jantung adalah kunci untuk umur panjang. Penyakit jantung adalah salah satu penyebab kematian utama di dunia. Untuk menjaga jantung yang sehat, penting untuk makan makanan rendah lemak jenuh, berolahraga secara teratur, dan menjaga berat badan yang sehat. Menghindari merokok dan mengontrol tekanan darah dan kolesterol juga sangat penting. Memantau kesehatan jantung secara rutin dapat membantu mendeteksi masalah sejak dini dan mencegah komplikasi lebih lanjut.',
                'slug' => 'kesehatan-jantung',
                'gambar' => 'default_content.png',
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
                'nama' => 'Pentingnya Vaksinasi',
                'deskripsi' => 'Vaksinasi adalah cara efektif untuk mencegah penyakit menular. Vaksin bekerja dengan membantu tubuh mengenali dan melawan patogen tertentu sebelum menyebabkan infeksi. Vaksinasi yang tepat waktu dan lengkap dapat melindungi individu dan masyarakat dari wabah penyakit seperti influenza, polio, dan COVID-19. Imunisasi juga membantu mengurangi penyebaran penyakit dan melindungi orang yang tidak bisa divaksinasi karena alasan kesehatan. Menjaga jadwal vaksinasi yang direkomendasikan sangat penting.',
                'slug' => 'pentingnya-vaksinasi',
                'gambar' => 'default_content.png',
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
                'nama' => 'Kesehatan Gigi dan Mulut',
                'deskripsi' => 'Kesehatan gigi dan mulut yang baik penting untuk kualitas hidup secara keseluruhan. Masalah gigi seperti karies dan penyakit gusi dapat menyebabkan nyeri, infeksi, dan masalah lain jika tidak diobati. Menjaga kesehatan mulut meliputi menyikat gigi dua kali sehari, menggunakan benang gigi, dan mengunjungi dokter gigi secara teratur. Makanan yang sehat dan menghindari gula berlebih juga dapat membantu menjaga gigi dan gusi tetap sehat. Pencegahan lebih baik daripada pengobatan dalam hal kesehatan mulut.',
                'slug' => 'kesehatan-gigi-dan-mulut',
                'gambar' => 'default_content.png',
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
                'nama' => 'Pentingnya Kesehatan Mental',
                'deskripsi' => 'Kesehatan mental sama pentingnya dengan kesehatan fisik. Mengabaikan kesehatan mental dapat menyebabkan gangguan seperti depresi, kecemasan, dan stres kronis. Untuk menjaga kesehatan mental, penting untuk mengenali tanda-tanda gangguan, berbicara dengan profesional kesehatan mental, dan mencari dukungan sosial. Aktivitas fisik, tidur yang cukup, dan pola makan yang sehat juga berkontribusi pada kesejahteraan mental. Membuat waktu untuk relaksasi dan hobi juga dapat membantu menjaga kesehatan mental yang baik.',
                'slug' => 'pentingnya-kesehatan-mental',
                'gambar' => 'default_content.png',
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
                'nama' => 'Panduan Nutrisi Sehat',
                'deskripsi' => 'Panduan nutrisi sehat memberikan pedoman untuk mengkonsumsi makanan yang mendukung kesehatan optimal. Ini melibatkan memilih makanan yang kaya nutrisi, seperti buah, sayuran, protein tanpa lemak, dan biji-bijian. Mengurangi asupan garam, gula, dan lemak jenuh juga penting. Nutrisi yang seimbang dapat membantu menjaga berat badan, meningkatkan energi, dan mencegah penyakit kronis. Edukasi tentang nutrisi yang baik dan kebiasaan makan sehat sangat penting untuk kesehatan jangka panjang.',
                'slug' => 'panduan-nutrisi-sehat',
                'gambar' => 'default_content.png',
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
