<?php

namespace Logic;

use function cli\line;
use function cli\prompt;

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

function wrongAnswer(string $answer, string $correct): void
{
    line($answer . "is wrong answer ;(. Correct answer was '" . $correct . "'.");
}

function correctAnswer(): void
{
    line('Correct');
}

function congrats(string $userName): void
{
    line("Congratulations, $userName!");
}

function game(string $questGeneratorFunctionName, array $gameMessages): void
{
    $userName = gameIntro($gameMessages['intro']);

    $gameState = true;
    $counter = 0;

    while ($gameState) {
        $quest = $questGeneratorFunctionName();

        $answer = gameStep($quest['text']);

        $correct = $quest['correct'];

        if ($answer == $correct) {
            correctAnswer();
            $counter++;

            if ($counter == 3) {
                congrats($userName);
                $gameState = false;
            }
        } else {
            wrongAnswer($answer, $correct);
            $gameState = false;
        }
    }
}