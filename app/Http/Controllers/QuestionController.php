<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Question;
use App\Rules\EndWithQuestionMarkRule;

class QuestionController extends Controller
{
    public function store(): RedirectResponse
    {
        $attibutes = request()->validate([
            'question' => ['required', 'min:10', new EndWithQuestionMarkRule(),
            ],
        ]);

        Question::query()->create([$attibutes]);

        return to_route('dashboard');
    }
}
