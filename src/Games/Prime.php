<?php

namespace Games\Prime;

function startGame(): void
{
    \Logic\game(
        "Games\Prime\generateQuest",
        "Answer \"yes\" if given number is prime. Otherwise answer \"no\"."
    );
}

function generateQuest(): array
{
    $result = [];

    $number = rand(1, 100);

    $result['question'] = $number;
    $result['correctAnswer'] = isPrime($number) ? 'yes' : 'no';

    return $result;
}

function isPrime(int $number): bool
{
    if ($number != 1 && $number != 0) {
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
    }

    return true;
}
