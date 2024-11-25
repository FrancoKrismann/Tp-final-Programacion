<?php

// Declarar la matriz de temperaturas con valores iniciales
$matrizTemperatura = array_fill(0, 10, array_fill(0, 12, 0)); // Matriz 10x12 inicializada con ceros

// Arreglo de años
$años = [2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023];

// Arreglo de meses
$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", 
          "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

// Solicitar el tipo de carga al usuario
echo "Tipo de carga de Temperatura (Manual/Automatico): ";
$cargTipo = trim(fgets(STDIN)); // Leer y eliminar espacios en blanco adicionales

// Llamar a la función tipoCarga y pasar la matriz por referencia
tipoCarga($cargTipo, $años, $meses, $matrizTemperatura);

$primavera = [
    "Primavera" => []
];

$invierno = [
    "Invierno" => []
];

// for ($i=0; $i < count($matrizTemperatura); $i++) { 
//     // for ($j=0; $j < count($matrizTemperatura);$j++){
//     // }
//     $dataOct = $matrizTemperatura[$i][9];
//     $dataNov = $matrizTemperatura[$i][10];
//     $dataDic = $matrizTemperatura[$i][11];
//     $primavera["Primavera"][$años[$i]] = ["Octubre" => $dataOct, "Noviembre" => $dataNov, "Diciembre" => $dataDic];

// }

for ($i=5; $i < count($matrizTemperatura); $i++) { 
    // for ($j=0; $j < count($matrizTemperatura);$j++){
    // }
    $dataOct = $matrizTemperatura[$i][6];
    $dataNov = $matrizTemperatura[$i][7];
    $dataDic = $matrizTemperatura[$i][8];
    $invierno["Invierno"][$años[$i]] = ["Julio" => $dataOct, "Agosto" => $dataNov, "Septiembre" => $dataDic];

}

// Mostrar la matriz generada (para verificar)
print_r($invierno);

// Función tipoCarga
function tipoCarga($tipo, $años, $meses, &$matrizTemperatura) {
    if (strtoupper($tipo) === "AUTOMATICO") {
        // Carga automática
        $datosAutomatica = [
            [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29], // 2014 - 0
            [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31], // 2015
            [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32], // 2016
            [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31], // 2017
            [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30],  // 2018
            [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29], // 2019
            [31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29], // 2020
            [30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30], // 2021
            [31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30], // 2022
            [32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31]  // 2023
        ];
        // Copiar datos automáticos a la matriz original
        $matrizTemperatura = $datosAutomatica;
        echo "Carga automática completada.\n";
    } else {
        // Carga manual
        for ($año = 0; $año < count($años); $año++) {
            echo "Ingrese las temperaturas de los meses del año: " . $años[$año] . "\n";

            for ($mes = 0; $mes < count($meses); $mes++) {
                echo "Ingrese la temperatura de " . $meses[$mes] . ": ";
                $temperatura = (int)trim(fgets(STDIN)); // Leer y convertir a entero
                $matrizTemperatura[$año][$mes] = $temperatura;
            }
        }
        echo "Carga manual completada.\n";
    }
}
