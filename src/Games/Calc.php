<?php

namespace Games\Calc;

function startGame(): void
{
    \Logic\game(
        "Games\Calc\generateQuest",
        "What is the result of the expression?"
    );
}

function generateQuest(): array
{
    $result = [];

    $firstNumber = rand(-9, 9);
    $secondNumber = rand(-9, 9);
    $operations = [
        "+" => ["func" => add($firstNumber, $secondNumber)],
        "-" => ["func" => subtraction($firstNumber, $secondNumber)],
        "*" => ["func" => multiply($firstNumber, $secondNumber)]
    ];

    $chosenOperationIndex = array_rand($operations);

    $result['question'] = $firstNumber . " " . $chosenOperationIndex . " " . $secondNumber;
    $result['correctAnswer'] = $operations[$chosenOperationIndex]['func'];

    return $result;
}

function add(int $firstNumber, int $secondNumber): int
{
    return $firstNumber + $secondNumber;
}

function subtraction(int $firstNumber, int $secondNumber): int
{
    return $firstNumber - $secondNumber;
}

function multiply(int $firstNumber, int $secondNumber): int
{
    return $firstNumber * $secondNumber;
}
