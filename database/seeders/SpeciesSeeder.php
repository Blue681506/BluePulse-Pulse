<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Species;

class SpeciesSeeder extends Seeder
{
    public function run(): void
    {
        Species::create([
            'name' => 'Penyu Hijau',
            'latin_name' => 'Chelonia mydas',
            'habitat' => 'Laut tropis',
            'description' => 'Penyu hijau adalah spesies penyu laut besar yang hidup di perairan tropis dan subtropis.',
            'image' => null,
        ]);

        Species::create([
            'name' => 'Hiu Paus',
            'latin_name' => 'Rhincodon typus',
            'habitat' => 'Samudra hangat',
            'description' => 'Hiu paus merupakan ikan terbesar di dunia yang terkenal jinak dan memakan plankton.',
            'image' => null,
        ]);

        Species::create([
            'name' => 'Lumba-Lumba',
            'latin_name' => 'Delphinus delphis',
            'habitat' => 'Laut lepas',
            'description' => 'Lumba-lumba adalah mamalia laut cerdas yang hidup berkelompok dan menggunakan ekolokasi.',
            'image' => null,
        ]);

        Species::create([
            'name' => 'Ikan Badut',
            'latin_name' => 'Amphiprioninae',
            'habitat' => 'Terumbu karang',
            'description' => 'Ikan badut hidup berdampingan dengan anemon laut dan terkenal karena warna oranyenya.',
            'image' => null,
        ]);

        Species::create([
            'name' => 'Pari Manta',
            'latin_name' => 'Mobula birostris',
            'habitat' => 'Perairan tropis',
            'description' => 'Pari manta adalah spesies pari besar yang memiliki sirip lebar menyerupai sayap.',
            'image' => null,
        ]);

        Species::create([
            'name' => 'Gurita Pasifik',
            'latin_name' => 'Enteroctopus dofleini',
            'habitat' => 'Dasar laut berbatu',
            'description' => 'Gurita Pasifik adalah salah satu gurita terbesar di dunia yang memiliki kecerdasan tinggi dan kemampuan kamuflase.',
            'image' => null,
        ]);
    }
}