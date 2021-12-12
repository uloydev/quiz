<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->state(["email" => "user@mail.com"])->create();
        User::factory(1)->state(["email" => "admin@mail.com", "is_admin" => true])->create();
        User::factory(10)->create();

        Quiz::factory()->count(9)->has(
            Question::factory()->count(10)->state(function (array $attributes, Quiz $quiz) {
                return ['quiz_id' => $quiz->id];
            })->has(
                Option::factory()->count(4)->state(function (array $attributes, Question $question) {
                    return ['question_id' => $question->id];
                })
            )
        )->create();

        $questions = Question::with('options')->get();
        foreach ($questions as $question) {
            $question->update([
                'answer_option_id' => $question->options->random()->id,
            ]);
        }
    }
}
