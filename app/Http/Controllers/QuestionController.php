<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;
use App\Services\QuestionServices;

class QuestionController extends Controller
{
    protected $questionServices;

    public function __construct(QuestionServices $questionServices)
    {
        $this->questionServices = $questionServices;
    }

    /**
     * Create a new question.
     */
    public function store(QuestionRequest $request)
    {
        if ($request->validated()) {
            $result = $this->questionServices->create($request);
            $message = 'Zapytanie zostało wysłane!';
            return view('footer.about.contact', ['message' => $message]);
        }
    }

    /**
     * Display all questions.
     */
    public function index()
    {
        $questions = Question::paginate(10);
        return view('admin_panel.questions', compact('questions'));
    }

    /**
     * Display specified question
     */
    public function show($id)
    {
        $question = Question::where('id', $id)->first();

        return $question;
    }

    /**
     * Remove the specified question.
     */
    public function delete($id)
    {
        $question = Question::find($id);
        $question->destroy($id);

        $this->index();
        return redirect('admin_panel/questions');
    }
}
