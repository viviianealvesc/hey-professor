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
            'question' => ['required'],
        ]);

        Question::query()->create([$attibutes]);

        return to_route('dashboard');
    }
}
