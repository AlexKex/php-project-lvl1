<?php

namespace GuessGame;

function startGame(): void
{
    $gameMessages = [
        'intro' => 'Answer "yes" if the number is even, otherwise answer "no".'
    ];

    \Logic\game(
        "GuessGame\generateQuest",
        $gameMessages
    );
}

function generateQuest(): array
{
    $result = [];

    $number = rand(-9999, 9999);

    $result['text'] = $number;
    $result['correct'] = isEven($number) ? 'yes' : 'no';

    return $result;
}

function isEven(int $number): bool
{
    return ($number % 2 == 0);
}
