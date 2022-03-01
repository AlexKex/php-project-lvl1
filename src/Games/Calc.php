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
    $result['correctAnswer'] = callSelectedFunction($chosenOperationIndex, $firstNumber, $secondNumber);

    return $result;
}

/**
 * This function was added because Hexlet's PHPSTan
 * doesn't pass direct call.
 * My local does :(
 * @return int
 */
function callSelectedFunction(callable $functionToCall, int $firstNumber, int $secondNumber): int
{
    return call_user_func(
        $functionToCall,
        $firstNumber,
        $secondNumber
    );
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
