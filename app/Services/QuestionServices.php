<?php

namespace App\Services;

use App\Models\Question;

class QuestionServices
{
    /**
     * Create new question.
     */
    public function create($data)
    {
        $question = new Question();
        $nameSurname = explode(" ", $data->name);
        $question->name = $nameSurname[0];
        if ($question->surname) {
            $question->surname = $nameSurname[1];
        }
        $question->email = $data->email;
        $question->question = $data->question;
        $question->save();

        return $question;
    }
}
