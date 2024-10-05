<?php
function sum(int|float $number1, int|float $number2) : int|float
{
    return $number1 + $number2;
}
function substract(int|float $number1, int|float $number2) : int|float
{
    return $number1 - $number2;
}
function multiply(int|float $number1, int|float $number2) : int|float
{
    return $number1 * $number2;
}
function divide(int|float $number1, int|float $number2) : int|float|string
{
    if ($number2 != 0) {
        return $number1 / $number2;
    } else {
        return 'division by zero';
    }
}
function modulo(int|float $number1, int|float $number2) : int|float|string
{
    if ($number2 != 0) {
        return $number1 % $number2;
    } else {
        return 'division by zero';
    }
}

## Function die als Rückgabewert den Information zu den Operationen zurückgibt
function getOperation(): array 
{
    return  [
        'sum' => '+', 
        'substract' => '-', 
        'multiply' => '*', 
        'divide' => '/', 
        'modulo' => '%',
        'pow' => '**',
        'root' => '√',
    ];
}