<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $quiz = Quiz::create([
            'title' => 'Quiz Ekosistem Laut',
            'description' => 'Quiz dasar tentang spesies laut dan konservasi laut.',
        ]);

        Question::create([
            'quiz_id' => $quiz->id,
            'question' => 'Hewan terbesar di laut adalah?',
            'option_a' => 'Hiu',
            'option_b' => 'Paus Biru',
            'option_c' => 'Lumba-lumba',
            'option_d' => 'Penyu',
            'correct_answer' => 'b',
        ]);

        Question::create([
            'quiz_id' => $quiz->id,
            'question' => 'Habitat ikan badut biasanya berada di?',
            'option_a' => 'Gurun',
            'option_b' => 'Hutan',
            'option_c' => 'Terumbu karang',
            'option_d' => 'Gunung',
            'correct_answer' => 'c',
        ]);

        Question::create([
            'quiz_id' => $quiz->id,
            'question' => 'Salah satu penyebab utama pencemaran laut adalah?',
            'option_a' => 'Sampah plastik',
            'option_b' => 'Angin laut',
            'option_c' => 'Gelombang',
            'option_d' => 'Pasir pantai',
            'correct_answer' => 'a',
        ]);

        $quiz2 = Quiz::create([
            'title' => 'Quiz Konservasi Laut',
            'description' => 'Quiz tentang cara menjaga kelestarian ekosistem laut.',
        ]);

        Question::create([
            'quiz_id' => $quiz2->id,
            'question' => 'Apa tujuan konservasi laut?',
            'option_a' => 'Merusak ekosistem',
            'option_b' => 'Melestarikan kehidupan laut',
            'option_c' => 'Menambah sampah',
            'option_d' => 'Mengurangi oksigen',
            'correct_answer' => 'b',
        ]);

        Question::create([
            'quiz_id' => $quiz2->id,
            'question' => 'Cara sederhana menjaga laut adalah?',
            'option_a' => 'Membuang plastik ke sungai',
            'option_b' => 'Mengambil semua karang',
            'option_c' => 'Mengurangi penggunaan plastik sekali pakai',
            'option_d' => 'Membuang oli ke laut',
            'correct_answer' => 'c',
        ]);

        Question::create([
            'quiz_id' => $quiz2->id,
            'question' => 'Terumbu karang penting karena menjadi?',
            'option_a' => 'Tempat hidup banyak biota laut',
            'option_b' => 'Tempat membuang sampah',
            'option_c' => 'Sumber asap',
            'option_d' => 'Penyebab banjir',
            'correct_answer' => 'a',
        ]);

        $quiz3 = Quiz::create([
            'title' => 'Quiz Hewan Laut',
            'description' => 'Quiz mengenal berbagai hewan yang hidup di lautan.',
        ]);

        Question::create([
            'quiz_id' => $quiz3->id,
            'question' => 'Hewan laut yang memiliki tentakel adalah?',
            'option_a' => 'Penyu',
            'option_b' => 'Gurita',
            'option_c' => 'Paus',
            'option_d' => 'Hiu',
            'correct_answer' => 'b',
        ]);

        Question::create([
            'quiz_id' => $quiz3->id,
            'question' => 'Lumba-lumba termasuk jenis?',
            'option_a' => 'Mamalia',
            'option_b' => 'Burung',
            'option_c' => 'Reptil',
            'option_d' => 'Serangga',
            'correct_answer' => 'a',
        ]);

        Question::create([
            'quiz_id' => $quiz3->id,
            'question' => 'Ikan badut terkenal hidup bersama?',
            'option_a' => 'Karang',
            'option_b' => 'Hiu',
            'option_c' => 'Anemon laut',
            'option_d' => 'Paus',
            'correct_answer' => 'c',
        ]);
    }
}