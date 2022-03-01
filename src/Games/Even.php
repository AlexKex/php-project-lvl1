<?php

namespace Games\Even;

function startGame(): void
{
    $introMessage = 'Answer "yes" if the number is even, otherwise answer "no".';

    \Logic\game(
        "Games\Even\generateQuest",
        $introMessage
    );
}

function generateQuest(): array
{
    $result = [];

    $number = rand(-9999, 9999);

    $result['question'] = $number;
    $result['correctAnswer'] = isEven($number) ? 'yes' : 'no';

    return $result;
}

function isEven(int $number): bool
{
    return ($number % 2 == 0);
}
