<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index(Request $request)
    {
        $suggestions = Suggestion::orderBy('likes', 'desc')->get();
        return view('welcome', ['suggestions' => $suggestions]);
    }
}
