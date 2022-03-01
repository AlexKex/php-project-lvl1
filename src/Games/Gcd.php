<?php

namespace Games\Gcd;

const MIN_RANDOM_NUMBER = 0;
const MAX_RANDOM_NUMBER = 150;

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

    $firstNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
    $secondNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

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
