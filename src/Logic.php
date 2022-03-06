<?php

namespace Logic;

use function cli\line;
use function cli\prompt;

const MAX_WINS_STREAK = 3;

function game(callable $questGeneratingFunctionName, string $gameIntroMessage): void
{
    line("Welcome to the Brain Games!");
    $userName = prompt("May I have your name?");
    line("Hello, " . $userName);
    line($gameIntroMessage);

    $counter = 0;

    while ($counter < MAX_WINS_STREAK) {
        $quest = call_user_func($questGeneratingFunctionName);

        ['question' => $question, 'correctAnswer' => $correctAnswer] = $quest;

        line("Question: " . $question);
        $answer = \cli\prompt("Your answer");

        if ($answer == $correctAnswer) {
            line('Correct');
            $counter++;
        } else {
            line($answer . " is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
            line("Let's try again, $userName!");
            break;
        }
    }

    if ($counter == MAX_WINS_STREAK) {
        line("Congratulations, $userName!");
    }
}
