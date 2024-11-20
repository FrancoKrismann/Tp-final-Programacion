<?php
//Algoritmo
$arrayTemperatura=[10][12];
    // Calcular índices
    $fila = $anio - 2014;
    $columna = $mes - 1;

    // Verificar si los índices son válidos
    if ($fila >= 0 && $fila < 10 && $columna >= 0 && $columna < 12) {
        echo "La temperatura en el año $anio y mes $mes es: " . $arrayTemperatura[$fila][$columna] . "\n";
    } else {
        echo "Año o mes fuera de rango.\n";
    }


    // Calcular índice de la fila
    $fila = $anio - 2014;

    // Verificar si el índice es válido
    if ($fila >= 0 && $fila < 10) {
        echo "Las temperaturas del año $anio son:\n";
        for ($columna = 0; $columna < 12; $columna++) {
            echo "Mes " . ($columna + 1) . ": " . $arrayTemperatura[$fila][$columna] . "\n";
        }
    } else {
        echo "Año fuera de rango.\n";
    }


    // Calcular índice de la columna
    $columna = $mes - 1;
    $suma = 0;

    // Verificar si el índice es válido
    if ($columna >= 0 && $columna < 12) {
        echo "Las temperaturas del mes $mes son:\n";
        for ($fila = 0; $fila < 10; $fila++) {
            $anio = 2014 + $fila;
            echo "Año $anio: " . $arrayTemperatura[$fila][$columna] . "\n";
            $suma += $arrayTemperatura[$fila][$columna];
        }
        $promedio = $suma / 10;
        echo "Promedio de temperaturas en el mes $mes: $promedio\n";
    } else {
        echo "Mes fuera de rango.\n";
    }



//Modulo




