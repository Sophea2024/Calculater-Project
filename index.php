<?php

# 1-Teil Strukturierung - Funktiondefinitionen
## Aufgabe: um die Rechner mit Modolo

declare(strict_types=1);

require_once 'inc/functions.inc.php';
require_once 'inc/operation.inc.php';

# 2-Teil Strukturierung - Programmlogik
if($_POST) {

    if(validate($_POST)) {
        $result = calculate((float)$_POST['numberOne'], (float)$_POST['numberTwo'], $_POST['operation']);
    } else {
        $result = 'Only numbers are allowed';
    }

}

## Variablen für die Ergebnisausgabe im View vorbereiten
if(isset($result)) {
    $outputResult = 'Result: ' . $result;
    if(is_numeric($result)) {
        if($result >= 0) {
            $outputEvaluation = 'The result is a positive number or zero';
        } else {
            $outputEvaluation = 'The result is negativ';
        }
    } else {
        $outputEvaluation = 'Please enter valid numbers';
    }
} else {
    $outputResult = 'Please insert numbers!';
    $outputEvaluation = '';
}

## Variable mit den Informationen zu den Operationen
$operations = getOperation();

?>
<!-- # 3-Teil Strukturierung - Ausgabe -->
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="css/tailwind.min.css" rel="stylesheet">
        <title>Calculator</title>
    </head>

    <body>
        <main class="mx-auto">
            <div class="container mx-auto">
                <div class="flex justify-center">
                    <div class="w-full max-w-xs">
                        <form
                            action="<?= $_SERVER['PHP_SELF'] ?>"
                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                            method="post"
                        >
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="numberOne">
                                    first Number
                                </label>
                                <input
                                    type="number"
                                    name="numberOne"
                                    step="any"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="numberOne"
                                    placeholder="Enter the first Number"
                                />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="numberTwo">
                                    second Number
                                </label>
                                <input
                                    type="number"
                                    name="numberTwo"
                                    step="any"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="numberTwo"
                                    placeholder="Enter the second Number"
                                />
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="operation">
                                    Operator
                                </label>
                                <select
                                    name="operation"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="operation"
                                >
                                <?php foreach($operations as $key => $value) : ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                    <?php endforeach ?>                                
                                </select>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover :bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Calculate Result </button>
                            </div>
                        </form>
                        <p class="text-center text-gray-700 text-xl">
                            <?= $outputResult ?>
                        </p>
                        <p class="text-center text-gray-700 text-xl mt-4">
                            <?= $outputEvaluation ?>
                        </p>

                    </div>
                </div>
            </div>
        </main>
    </body>

    </html>
