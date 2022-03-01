<?php

namespace Games\Calc;

function startGame(): void
{
    $introMessage = "What is the result of the expression?";

    \Logic\game(
        "Games\Calc\generateQuest",
        $introMessage
    );
}

function generateQuest(): array
{
    $result = [];

    $firstNumber = rand(-9, 9);
    $secondNumber = rand(-9, 9);
    $operations = [
        "+" => "add",
        "-" => "subtraction",
        "*" => "multiply"
    ];

    $chosenOperationIndex = array_rand($operations);

    $result['question'] = $firstNumber . " " . $chosenOperationIndex . " " . $secondNumber;
    $result['correctAnswer'] = call_user_func(
        "\Games\Calc\\" . $operations[$chosenOperationIndex],
        $firstNumber,
        $secondNumber
    );

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
