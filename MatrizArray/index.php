<?php
//Algoritmo
error_reporting(error_level: E_ALL);
ini_set(option: 'display_errors', value: 1);

$arrayTemperatura = [
    [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29],
    [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31],
    [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32],
    [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31],
    [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30],
    [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29],
    [31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29],
    [30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30],
    [31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30],
    [32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31]
];

$cantTemperatura = count(value: $arrayTemperatura);

for ($i=0; $i < $cantTemperatura ; $i++) { 
    
    echo "Fila $i , valor en la diagonal: " . $arrayTemperatura[$i][$i];

}



// Verificar si los índices son válidos
// if ($fila >= 0 && $fila < 10 && $columna >= 0 && $columna < 12) {
//     echo "La temperatura en el año $anio y mes $mes es: " . $arrayTemperatura[$fila][$columna] . "\n";
// } else {
//     echo "Año o mes fuera de rango.\n";
// }


// Calcular índice de la fila
// $fila = $anio - 2014;

// Verificar si el índice es válido
// if ($fila >= 0 && $fila < 10) {
//     echo "Las temperaturas del año $anio son:\n";
//     for ($columna = 0; $columna < 12; $columna++) {
//         echo "Mes " . ($columna + 1) . ": " . $arrayTemperatura[$fila][$columna] . "\n";
//     }
// } else {
//     echo "Año fuera de rango.\n";
// }


// Calcular índice de la columna
// $columna = $mes - 1;
// $suma = 0;

// Verificar si el índice es válido
// if ($columna >= 0 && $columna < 12) {
//     echo "Las temperaturas del mes $mes son:\n";
//     for ($fila = 0; $fila < 10; $fila++) {
//         $anio = 2014 + $fila;
//         echo "Año $anio: " . $arrayTemperatura[$fila][$columna] . "\n";
//         $suma += $arrayTemperatura[$fila][$columna];
//     }
//     $promedio = $suma / 10;
//     echo "Promedio de temperaturas en el mes $mes: $promedio\n";
// } else {
//     echo "Mes fuera de rango.\n";
// }



//Modulo
