<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suggestion::create([
            'suggestion' => 'Make an episode about Laravel.',
            'user_id' => 1,
        ]);

        Suggestion::create([
            'suggestion' => 'Finish that accordion block.',
            'user_id' => 1,
        ]);

        Suggestion::create([
            'suggestion' => 'An episode about using GraphQL with WordPress.',
            'user_id' => 1,
        ]);
    }
}
