<?php

namespace Database\Seeders;

use App\Http\Controllers\Beasiswa;
use App\Models\admin;
use App\Models\Instansi;
use App\Models\Tingkatan;
use App\Models\Status;
use App\Models\Beasiswa as dbBeasiswa;
use App\Models\CategoryPrestasi;
use App\Models\Jurusan;
use App\Models\Lomba;
use App\Models\mahasiswa;
use App\Models\MahasiswaPrestasi;
use App\Models\Prestasi;
use App\Models\Prodi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        admin::create([
            'username' => 'root',
            'password' => 'root',
        ]);
        Tingkatan::create([
            'tingkatan' => 'Lokal',
        ]);
        Tingkatan::create([
            'tingkatan' => 'Internasional',
        ]);
        Status::create([
            'status' => 'Aktif',
        ]);
        Status::create([
            'status' => 'Nonaktif',
        ]);
        Instansi::create([
            'nama_instansi' => 'Bank Mandiri KCP Banyuwangi',
            'no_telephone' => '08118414000',
            'alamat' => 'Jalan Doktor Wahidin Sudiro Husodo No.2, Kepatihan, Kec. Banyuwangi, Kabupaten Banyuwangi',
            'email' => 'mandiricare@mandiri.co.id',
            'foto_profile' => '\Instansi\MandiriProfile.png',
            'account_admin_id' => 1,
        ]);
        dbBeasiswa::create([
            'nama_Beasiswa' => 'Beasiswa Nasional Asia',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/RegisterBeasiswaNasionalAsia',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_beasiswa' => '\Beasiswa\14a-01.03.2023.14.51.50.jpg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);
        dbBeasiswa::create([
            'nama_Beasiswa' => 'Beasiswa Nasional Amerika',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/RegisterBeasiswaNasionalAmerika',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_beasiswa' => '\Beasiswa\b9cc4a75e436b2dff5dfbbe27ecdeab6.jpg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);
        dbBeasiswa::create([
            'nama_Beasiswa' => 'Beasiswa Nasional China',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/RegisterBeasiswaNasionalChina',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_beasiswa' => '\Beasiswa\bea1.jpg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);
        dbBeasiswa::create([
            'nama_Beasiswa' => 'Beasiswa Nasional Afrika',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/RegisterBeasiswaNasionalAfrika',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_beasiswa' => '\Beasiswa\IMG-20220315-WA0096.jpg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);
        dbBeasiswa::create([
            'nama_Beasiswa' => 'Beasiswa Nasional Mandarin',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/RegisterBeasiswaNasionalMandarin',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_beasiswa' => '\Beasiswa\poster-beasiswa-s1-online-scholarship-competition-osc.jpg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);
        Lomba::create([
            'nama_perlombaan' => 'Lomba MLBB Se-Jawa timur',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/LombaMLBB',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_lomba' => '\Lomba\Turnamen-2021-Mercu-Buana-Mobile-Lengend-894x1264.jpg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);
        Lomba::create([
            'nama_perlombaan' => 'Lomba Riset Techno',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/LombaRisetTechno',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_lomba' => '\Lomba\20180731032204-5-0-Pamflet_Lomba_Riset_2018.jpeg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);
        Lomba::create([
            'nama_perlombaan' => 'Kompetisi Adu Bakat',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/kompetisiadubakat',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_lomba' => '\Lomba\19008c5f005e2da98b70a7ddd430aee2.jpg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);
        Lomba::create([
            'nama_perlombaan' => 'Kompetisi Cover Lagu Se-Jabodetabek',
            'instansi_id' => 1,
            'link_pendaftaran' => 'Https://bit.ly/coversongcompetition',
            'persyaratan' => 'Bebas Tanpa Di Pungut Biaya',
            'tanggal_pendaftaran' => '2024-05-10',
            'tanggal_penutupan' => '2024-05-20',
            'foto_lomba' => '\Lomba\E2rliE_VUAcykNM.jpg',
            'tingkatan_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Jurusan Bisnis dan Informatika'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Jurusan Teknik Sipil'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Jurusan Teknik Mesin'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Jurusan Teknik Pertanian'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Jurusan Teknik Pariwisata'
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknologi Rekayasa Perangkat Lunak',
            'jurusan_id' => 1,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Bisnis Digital',
            'jurusan_id' => 1,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknologi Rekayasa Komputer',
            'jurusan_id' => 1,
        ]);

        Prodi::create([
            'nama_prodi' => 'D3 Teknik Sipil',
            'jurusan_id' => 2,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknologi Rekayasa Konstruksi Jalan & Jembatan',
            'jurusan_id' => 2,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknologi Rekayasa Manufaktur',
            'jurusan_id' => 3,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknik Manufaktur Kapal',
            'jurusan_id' => 3,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Agribisnis',
            'jurusan_id' => 4,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknologi Pengolahan Hasil Ternak',
            'jurusan_id' => 4,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Pengembangan Produk Agroindustri',
            'jurusan_id' => 4,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknologi Budi aya Perikanan',
            'jurusan_id' => 4,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknologi Produksi Tanaman Pangan',
            'jurusan_id' => 4,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Teknologi Produksi Ternak',
            'jurusan_id' => 4,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Manajemen Bisnis Pariwisata',
            'jurusan_id' => 5,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Terapan Destinasi Pariwisata',
            'jurusan_id' => 5,
        ]);

        Prodi::create([
            'nama_prodi' => 'S1 Pengelolaan Perhotelan',
            'jurusan_id' => 5,
        ]);

        mahasiswa::create([
            'nim' => '3622583187',
            'nama_mahasiswa' => 'Rizki Firmansyah',
            'foto_mahasiswa' => '\Mahasiswa\mahasiswa1.jpg',
            'password' => '3622583180',
            'prodi_id' => 2
        ]);

        mahasiswa::create([
            'nim' => '3622583198',
            'nama_mahasiswa' => 'Ilham Malana',
            'foto_mahasiswa' => '\Mahasiswa\mahasiswa2.jpg',
            'password' => '3622583190',
            'prodi_id' => 5,
        ]);

        mahasiswa::create([
            'nim' => '3622583244',
            'nama_mahasiswa' => 'Andika Subiantoro',
            'foto_mahasiswa' => '\Mahasiswa\mahasiswa3.jpg',
            'password' => '3622583240',
            'prodi_id' => 6,
        ]);

        CategoryPrestasi::create([
            'category' => 'Individu',
        ]);

        CategoryPrestasi::create([
            'category' => 'Team',
        ]);

        Prestasi::create([
            'nama_perlombaan' => 'Lomba Aitec 2024',
            'foto_bukti_prestasi' => '/Prestasi/47103-timnas-indonesia-juara-easian-cup-2023.jpg',
            'tingkatan_id' => 2,
            'tanggal_perlombaan' => '2024-05-10',
            'category_prestasi_id' => 2,
        ]);

        MahasiswaPrestasi::create([
            'mahasiswa_id' => 2,
            'prestasi_id' => 1,
            'posisi_juara' => 'Juara 1',
            'admin_id' => 1,
        ]);
    }
}
