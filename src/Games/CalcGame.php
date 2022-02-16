<?php

namespace CalcGame;

function startGame(): void
{
    $gameMessages = [
      'intro' => "What is the result of the expression?"
    ];

    \Logic\game(
        "CalcGame\generateQuest",
        $gameMessages
    );
}

function generateQuest(): array
{
    $result = [];

    $firstNumber = rand(-9, 9);
    $secondNumber = rand(-9, 9);
    $operations = [
        1 => ["sign" => "+", "func" => add($firstNumber, $secondNumber)],
        2 => ["sign" => "-", "func" => minus($firstNumber, $secondNumber)],
        3 => ["sign" => "*", "func" => multiply($firstNumber, $secondNumber)]
    ];

    $chosenOperationIndex = array_rand($operations);

    $result['text'] = $firstNumber . " " . $operations[$chosenOperationIndex]['sign'] . " " . $secondNumber;
    $result['correct'] = $operations[$chosenOperationIndex]['func'];

    return $result;
}

function add(int $firstNumber, int $secondNumber): int
{
    return $firstNumber + $secondNumber;
}

function minus(int $firstNumber, int $secondNumber): int
{
    return $firstNumber - $secondNumber;
}

function multiply(int $firstNumber, int $secondNumber): int
{
    return $firstNumber * $secondNumber;
}
