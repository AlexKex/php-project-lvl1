<?php

namespace GcdGame;

function startGame(): void
{
    $gameMessages = [
        'intro' => "Find the greatest common divisor of given numbers."
    ];

    \Logic\game(
        "GcdGame\generateQuest",
        $gameMessages
    );
}

function generateQuest(): array
{
    $result = [];

    $firstNumber = rand(0, 150);
    $secondNumber = rand(0, 150);

    $result['text'] = $firstNumber . " " . $secondNumber;
    $result['correct'] = greaterCommonDivisor($firstNumber, $secondNumber);

    return $result;
}

function greaterCommonDivisor(int $firstNumber, int $secondNumber): int
{
    while ($firstNumber != $secondNumber) {
        if ($firstNumber > $secondNumber) {
            $firstNumber -= $secondNumber;
        } else {
            $secondNumber -= $firstNumber;
        }
    }
    return $firstNumber;
}
