<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::table('users')->insert([
        //     [
        //         'email' => 'syaharanibilla1@gmail.com',
        //         'email_verified_at' => now(),
        //         'password' => Hash::make('123456'), // Password terenkripsi
        //         'status' => 1, // Status aktif
        //         'remember_token' => \Str::random(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        // DB::table('mst_ruangan')->insert([
        //     [
        //         'nama_ruangan' => 'Plataran',
        //         'kapasitas' => '45',
        //         'lokasi' => 'Lantai 1',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Plataran artinya serambi atau halaman rumah. 
        //         Plataran merupakan ruang terbuka (outdoor) yang hijau dan sejuk, 
        //         berlokasi di halaman Rumah Anindhaloka. Plataran sangat sesuai untuk 
        //         kegiatan kumpul keluarga, komunitas, maupun bisnis, seperti ulang tahun, 
        //         peluncuran produk, pertunjukan musik, dan office gathering.',
        //         'image' => 'Plataran.jpg',
        //         'harga' => '2000000',
        //     ],
        //     [
        //         'nama_ruangan' => 'Sangita',
        //         'kapasitas' => '15',
        //         'lokasi' => 'Lantai 1',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Sangita bermakna musik. Sangita adalah studio musik tempat para pemusik 
        //         mengekspresikan diri. Sangita dapat digunakan untuk latihan musik, rekaman, 
        //         dan podcast. Ketika dipadukan bersama Ruang Plataran, Sangita 
        //         bertransformasi menjadi panggung pertunjukan musik untuk berbagai acara kumpul keluarga dan bisnis.',
        //         'image' => 'Sangita.jpg',
        //         'harga' => '3000000',
        //     ],
        //     [
        //         'nama_ruangan' => 'Nirnaya',
        //         'kapasitas' => '20',
        //         'lokasi' => 'Lantai 1',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Nirnaya bermakna pengetahuan. Nirnaya merupakan ruang terbuka (outdoor) 
        //         sejuk dan tenang, diharapkan menjadi tempat lahirnya ide-ide cemerlang dan 
        //         kreatif. Nirnaya dirancang sebagai tempat bertukar fikiran dan berdiskusi yang 
        //         nyaman dalam bentuk talk show, dialog, atau rapat kecil yang rileks. Dipadu 
        //         dengan Bramara, Nirnaya menjadi ruang makan yang akrab.',
        //         'image' => 'Nirnaya.jpg',
        //         'harga' => '1500000',
        //     ],
        //     [
        //         'nama_ruangan' => 'Bramara',
        //         'kapasitas' => '30',
        //         'lokasi' => 'Lantai 1',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Bramara bermakna lebah. Lebah memiliki karakteristik pekerja keras, tulus, 
        //         mandiri, dan bermanfaat bagi sesama. Bramara dirancang untuk kegiatan 
        //         seminar, webinar, lokakarya, workshop, dan pameran. Namun Bramara juga
        //         dapat digunakan untuk acara keluarga, seperti ulang tahun dan reuni.',
        //         'image' => 'Bramara.jpg',
        //         'harga' => '2500000',
        //     ],
        //     [
        //         'nama_ruangan' => 'Panata',
        //         'kapasitas' => '15',
        //         'lokasi' => 'Lantai 2',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Panata bermakna penata atau aturan. Orang-orang yang bekerja di ruang ini 
        //         diharapkan mampu menjadi penata bagi dirinya dan sesama. Ruang Panata 
        //         dirancang menjadi kantor atau tempat bekerja bagi organisasi ataupun komunitas.',
        //         'image' => 'Panata.jpg',
        //         'harga' => '4000000',
        //     ],
        //     [
        //         'nama_ruangan' => 'Karya',
        //         'kapasitas' => '25',
        //         'lokasi' => 'Lantai 2',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Karya bermakna hasil atau buah dari pekerjaan. Ruang Karya merupakan tempat 
        //         untuk menghasilkan dan menampilkan buah pekerjaan. Karya dirancang untuk 
        //         kegiatan lokakarya, dialog, talkshow, pameran karya, hingga pemutaran film.',
        //         'image' => 'Karya.jpg',
        //         'harga' => '3000000',
        //     ],
        //     [
        //         'nama_ruangan' => 'Arupadatu',
        //         'kapasitas' => '40',
        //         'lokasi' => 'Lantai 3',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Arupadhatu bermakna alam tertinggi, alam atas, atau nirwana, tempat dimana 
        //         manusia terbebas dari keterikatan manusiawinya. Ruang Arupadhatu 
        //         diharapkan menjadi tempat bagi setiap orang untuk berproses menjadi manusia 
        //         yang lebih baik. Arupadhatu dirancang untuk berbagai kegiatan, seperti seminar, 
        //         pameran, lokakarya, pemutaran film, office and community gathering, hingga 
        //         acara-acara keluarga seperti ulang tahun dan reuni.',
        //         'image' => 'Arupadatu.jpg',
        //         'harga' => '4500000',
        //     ],
        //     [
        //         'nama_ruangan' => 'Nirmana',
        //         'kapasitas' => '40',
        //         'lokasi' => 'Lantai 3',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Nirmana bermakna tidak berbentuk atau tidak bermakna. Ruang Nirmana 
        //         menjadi tempat menghadirkan berbagai komposisi bentuk sehingga menjadi bermakna. 
        //         Ruang Nirmana merupakan area outdoor yang dirancang untuk beragam aktivitas, baik formal 
        //         maupun informal, seperti gathering, perayaan, latihan seni tari atau senam.',
        //         'image' => 'Nirmana.jpg',
        //         'harga' => '2000000',
        //     ],
        //     [
        //         'nama_ruangan' => 'Nirwana',
        //         'kapasitas' => '25',
        //         'lokasi' => 'Lantai 3',
        //         'panjang_ruangan' => '10',
        //         'lebar_ruangan' => '15',
        //         'deskripsi' => 'Nirmana bermakna tidak berbentuk atau tidak bermakna. Ruang Nirmana 
        //         menjadi tempat menghadirkan berbagai komposisi bentuk sehingga menjadi bermakna. 
        //         Ruang Nirmana merupakan area outdoor yang dirancang untuk beragam aktivitas, baik formal 
        //         maupun informal, seperti gathering, perayaan, latihan seni tari atau senam.',
        //         'image' => 'Nirwana.jpg',
        //         'harga' => '2000000',
        //     ],
        // ]);

        DB::table('informasi')->insert([
            [
                'nama' => 'Pasar Bahagia Vol. 02 Kembali ke Akar',
                'deskripsi' => 'Pasar Bahagia Vol. 02 Kembali ke Akar',
                'image' => 'Pasar Bahagia (1).jpg'
            ],
            [
                'nama' => 'Pasar Bahagia Memanggil Kreator Bahagia',
                'deskripsi' => 'Pasar Bahagia Vol. 02 Kembali ke Akar Memanggil Kreator Bahagia',
                'image' => 'Pasar Bahagia (2).jpg'
            ],
            [
                'nama' => 'Workshop Membuat Es Cincau dari Pekarangan Dapur',
                'deskripsi' => 'Workshop Membuat Es Cincau dari Pekarangan Dapur Bersama Wilma Chrysanti',
                'image' => 'Pasar Bahagia (3).jpg'
            ],
            [
                'nama' => 'Workshop Reparasi Baju Juga Lucu',
                'deskripsi' => 'Workshop Reparasi Baju Juga Lucu Bersama Velie Kurniawan',
                'image' => 'Pasar Bahagia (4).jpg'
            ],
            [
                'nama' => 'Workshop Ramu Pangan Sirkular: Oleh Oleh Nanas',
                'deskripsi' => 'Workshop Ramu Pangan Sirkular: Oleh Oleh Nanas Bersama Nia Nurdiansyah',
                'image' => 'Pasar Bahagia (5).jpg'
            ],
        ]);
    }
}