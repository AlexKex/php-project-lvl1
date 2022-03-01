<?php

namespace Games\Gcd;

function startGame(): void
{
    $introMessage = "Find the greatest common divisor of given numbers.";

    \Logic\game(
        "Games\Gcd\generateQuest",
        $introMessage
    );
}

function generateQuest(): array
{
    $result = [];

    $firstNumber = rand(0, 150);
    $secondNumber = rand(0, 150);

    $result['question'] = "$firstNumber $secondNumber";
    $result['correctAnswer'] = greatestCommonDivisor($firstNumber, $secondNumber);

    return $result;
}

function greatestCommonDivisor(int $firstNumber, int $secondNumber): int
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