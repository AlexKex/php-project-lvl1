<?php

namespace Logic;

use function cli\line;
use function cli\prompt;

const MAX_WINS_STREAK = 3;

function game(callable $questGeneratorFunctionName, string $gameIntroMessage): void
{
    line("Welcome to the Brain Games!");
    $userName = prompt("May I have your name?");
    line("Hello, " . $userName);
    line($gameIntroMessage);

    $counter = 0;

    while (true) {
        $quest = call_user_func($questGeneratorFunctionName);

        line("Question: " . $quest['question']);
        $answer = \cli\prompt("Your answer");

        $correct = $quest['correctAnswer'];

        if ($answer == $correct) {
            line('Correct');
            $counter++;

            if ($counter == MAX_WINS_STREAK) {
                line("Congratulations, $userName!");
                break;
            }
        } else {
            line($answer . " is wrong answer ;(. Correct answer was '" . $correct . "'.");
            line("Let's try again, $userName!");
            break;
        }
    }
}
