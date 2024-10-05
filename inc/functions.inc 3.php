<?php

declare(strict_types=1);
# Typdeklaration und return type

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

function calculate(int|float $number1, int|float $number2, string $operation): int|float|string 
{   
    //return call_user_func($operation, $number1, $number2);
    return $operation($number1, $number2);
    /*
    switch ($operator) {
        case '+':
            return sum($number1, $number2);
        case '-':
            return substract($number1, $number2);
        case '*':
            return multiply($number1, $number2);
        case '/':
            return divide($number1, $number2);
        return 'unknown operator';    
    }
    */
}

function validate(array $formData = []): bool 
{
    if ($formData) {
        if (
            isset($formData['numberOne']) &&
            isset($formData['numberTwo']) &&
            is_numeric($formData['numberOne']) &&
            is_numeric($formData['numberTwo'])
        ) {
            return true;
        }
    }
    return false;
}
