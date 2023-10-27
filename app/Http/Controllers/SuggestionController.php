<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index(Request $request)
    {

        // Get suggestions and order by number of upvotes.
        $suggestions = Suggestion::withCount('upvotes')->orderBy('upvotes_count', 'desc')->get();

        return view('welcome', ['suggestions' => $suggestions]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'suggestion' => 'required',
        ]);

        // Create the suggestion.
        $suggestion = Suggestion::create(
            [
                'suggestion' => $request->suggestion,
                'user_id' => $request->user()->id,
            ]
        );

        // The author should immediately upvote their own suggestion.
        $suggestion->upvotes()->attach($request->user()->id);

        return redirect()->route('suggestions.index')->with('success', 'Suggestion added!');
    }


    public function destroy(Request $request, Suggestion $suggestion)
    {
        $suggestion->delete();

        return redirect()->route('suggestions.index')->with('success', 'Suggestion deleted!');
    }


    public function upvote(Request $request, Suggestion $suggestion)
    {

        // Check if they've already upvoted, if so, redirect with error.
        if ($suggestion->upvotes()->where('user_id', $request->user()->id)->exists()) {
            return redirect()->route('suggestions.index')->with('error', 'You have already upvoted this suggestion!');
        }

        // Attach the upvote.
        $suggestion->upvotes()->attach($request->user()->id);

        return redirect()->route('suggestions.index')->with('success', 'Suggestion upvoted!');
    }
}
