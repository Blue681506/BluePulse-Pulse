<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::latest()->get();

        return view('quiz.index', compact('quizzes'));
    }

    public function show($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);

        return view('quiz.show', compact('quiz'));
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);

        $score = 0;

        foreach ($quiz->questions as $question) {
            $answer = $request->input('question_'.$question->id);

            if ($answer == $question->correct_answer) {
                $score += 10;
            }
        }

        QuizResult::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'score' => $score
        ]);

        return redirect('/leaderboard')
            ->with('success', 'Quiz selesai!');
    }

    public function leaderboard()
    {
        $results = QuizResult::with('user', 'quiz')
            ->orderBy('score', 'desc')
            ->get();

        return view('quiz.leaderboard', compact('results'));
    }

    public function admin()
    {
        $quizzes = Quiz::withCount('questions')->latest()->get();

        return view('admin.quiz', compact('quizzes'));
    }

    public function create()
    {
        return view('admin.quiz-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $validQuestions = [];

        foreach ($request->questions as $questionData) {
            if (
                !empty($questionData['question']) &&
                !empty($questionData['a']) &&
                !empty($questionData['b']) &&
                !empty($questionData['c']) &&
                !empty($questionData['d'])
            ) {
                $validQuestions[] = $questionData;
            }
        }

        if (count($validQuestions) < 1) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Minimal isi 1 soal lengkap untuk membuat quiz.');
        }

        $quiz = Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        foreach ($validQuestions as $questionData) {
            Question::create([
                'quiz_id' => $quiz->id,
                'question' => $questionData['question'],
                'option_a' => $questionData['a'],
                'option_b' => $questionData['b'],
                'option_c' => $questionData['c'],
                'option_d' => $questionData['d'],
                'correct_answer' => $questionData['correct'],
            ]);
        }

        return redirect('/admin/quiz')
            ->with('success', 'Quiz berhasil dibuat');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->delete();

        return redirect()->back()
            ->with('success', 'Quiz berhasil dihapus');
    }
}