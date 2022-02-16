<?php

namespace PrimeGame;

use function GuessGame\isEven;

function startGame(): void
{
    $gameMessages = [
        'intro' => "Answer \"yes\" if given number is prime. Otherwise answer \"no\"."
    ];

    \Logic\game(
        "PrimeGame\generateQuest",
        $gameMessages
    );
}

function generateQuest(): array
{
    $result = [];

    $number = rand(0, 100);

    $result['text'] = $number;
    $result['correct'] = isPrime($number) ? 'yes' : 'no';

    return $result;
}

function isPrime(int $number): bool
{
    $result = true;

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $result = false;
        }
    }

    return $result;
}
