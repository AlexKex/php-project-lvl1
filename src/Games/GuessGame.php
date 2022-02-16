<?php

namespace GuessGame;

use function cli\line;
use function cli\prompt;
use function Logic\congrats;
use function Logic\correctAnswer;
use function Logic\gameIntro;
use function Logic\gameStep;
use function Logic\wrongAnswer;

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
