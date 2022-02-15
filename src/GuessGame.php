<?php

namespace GuessGame;

use function cli\line;
use function cli\prompt;

function startGame()
{
    line("Welcome to the Brain Games!");
    $userName = prompt("May I have your name?");
    line("Hello, %s", $userName);

    guessGame($userName);
}

function guessGame(string $userName): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $gameState = true;
    $counter = 0;

    while ($gameState) {
        $number = rand(0, 9999);
        line("Question: " . $number);
        $answer = prompt("Your answer");

        if ((isEven($number) && $answer == 'yes') || (!isEven($number) && $answer == 'no')) {
            line('Correct');
            $counter++;

            if ($counter == 3) {
                line("Congratulations, $userName!");
                $gameState = false;
            }
        } else {
            line($answer . "is wrong answer ;(. Correct answer was '" . (($answer == "yes") ? "no" : "yes") . "'.");
            $gameState = false;
        }
    }
}

function isEven(int $number): bool
{
    return ($number % 2 == 0);
}
