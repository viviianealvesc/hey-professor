<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Question;

class QuestionController extends Controller
{
    public function store(): RedirectResponse
    {
        $attibutes = request()->validate([
            'question' => ['required', 'min:10',
                function ($attribute, $value, $fail) {
                    if ($value[strlen($value) -1 ] != '?') {
                        $fail('Are you sure that is a question? It is missing the question mark in the end.');
                    }
                }
            ],
        ]);

        Question::query()->create([$attibutes]);

        return to_route('dashboard');
    }
}
