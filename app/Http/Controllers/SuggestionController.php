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


    public function store(Request $request)
    {
        $request->validate([
            'suggestion' => 'required',
        ]);

        Suggestion::create(
            [
                'suggestion' => $request->suggestion,
                'user_id' => $request->user()->id,
            ]
        );

        return redirect()->route('suggestions.index')->with('success', 'Suggestion added!');
    }


    public function destroy(Request $request, Suggestion $suggestion)
    {
        $suggestion->delete();

        return redirect()->route('suggestions.index')->with('success', 'Suggestion deleted!');
    }
}
