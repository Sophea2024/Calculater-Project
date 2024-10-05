<?php

declare(strict_types=1);
# Typdeklaration und return type
/*    Alle Funktionen sind in 'operation.inc.php' geschrieben!  */

//function calculate(int|float $number1, int|float $number2, callable $operation): int|float|string 
function calculate(int|float $number1, int|float $number2, string $operation): int|float|string 
{   
    /*
        if(is_callable($operation)){
        return $operation($number1, $number2);    //Aufruf der OperationFunktion als Variable 
        } else {
            return 'no valid operation';
        }
    */
    return (is_callable($operation)) ? $operation($number1, $number2) : 'no valid operation';
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
