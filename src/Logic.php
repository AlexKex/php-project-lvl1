<?php

namespace Logic;

use function cli\line;
use function cli\prompt;

const MAX_WINS_STREAK = 3;

function introDialogue(string $message): string
{
    line("Welcome to the Brain Games!");
    $userName = prompt("May I have your name?");
    line("Hello, " . $userName);
    line($message);

    return $userName;
}

function gameIntro(string $message): string
{
    return introDialogue($message);
}

function gameStep(string $question = ""): string
{
    line("Question: $question");
    return \cli\prompt("Your answer");
}

function wrongAnswer(string $answer, string $correct, string $userName): void
{
    line($answer . " is wrong answer ;(. Correct answer was '" . $correct . "'.");
    line("Let's try again, $userName!");
}

function correctAnswer(): void
{
    line('Correct');
}

function congrats(string $userName): void
{
    line("Congratulations, $userName!");
}

function game(callable $questGeneratorFunctionName, string $gameIntroMessage): void
{
    $userName = gameIntro($gameIntroMessage);

    $counter = 0;

    while (true) {
        $quest = call_user_func($questGeneratorFunctionName);

        $answer = gameStep($quest['question']);

        $correct = $quest['correctAnswer'];

        if ($answer == $correct) {
            correctAnswer();
            $counter++;

            if ($counter == MAX_WINS_STREAK) {
                congrats($userName);
                break;
            }
        } else {
            wrongAnswer($answer, $correct, $userName);
            break;
        }
    }
}
