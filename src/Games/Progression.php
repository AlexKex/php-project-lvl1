<?php

namespace Games\Progression;

const MIN_PROGRESSION_STEP = 1;
const MAX_PROGRESSION_STEP = 10;

const MIN_START_NUMBER = 1;
const MAX_START_NUMBER = 25;

const MIN_PROGRESSION_LENGTH = 5;
const MAX_PROGRESSION_LENGTH = 11;

function startGame(): void
{
    $introMessage = "What number is missing in the progression?";

    \Logic\game(
        "Games\Progression\generateQuest",
        $introMessage
    );
}

function generateQuest(): array
{
    $result = [];

    $progressionStep = rand(MIN_PROGRESSION_STEP, MAX_PROGRESSION_STEP);
    $progression = [];
    $startNumber = rand(MIN_START_NUMBER, MAX_START_NUMBER);

    for ($i = 0; $i < rand(MIN_PROGRESSION_LENGTH, MAX_PROGRESSION_LENGTH); $i++) {
        $progression[] = $startNumber + $progressionStep * $i;
    }

    $hiddenIndex = rand(0, count($progression) - 1);
    $answer = $progression[$hiddenIndex];
    $progression[$hiddenIndex] = "..";

    $result['question'] = implode(" ", $progression);
    $result['correctAnswer'] = $answer;

    return $result;
}
