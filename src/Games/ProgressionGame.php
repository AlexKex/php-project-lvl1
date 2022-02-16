<?php

namespace ProgressionGame;

use function GuessGame\isEven;

function startGame(): void
{
    $gameMessages = [
        'intro' => "What number is missing in the progression?"
    ];

    \Logic\game(
        "ProgressionGame\generateQuest",
        $gameMessages
    );
}

function generateQuest(): array
{
    $result = [];

    $progressionStep = rand(1, 10);
    $progression = [];
    $startNumber = rand(1, 25);

    for ($i = 0; $i < rand(5, 11); $i++) {
        $progression[] = $startNumber + $progressionStep * $i;
    }

    $hiddenIndex = rand(0, count($progression) - 1);
    $answer = $progression[$hiddenIndex];
    $progression[$hiddenIndex] = "..";

    $result['text'] = implode(" ", $progression);
    $result['correct'] = $answer;

    return $result;
}
