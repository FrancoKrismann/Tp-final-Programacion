<?php

// Declarar la matriz de temperaturas con valores iniciales
$matrizTemperatura = array_fill(0, 10, array_fill(0, 12, 0)); // Matriz 10x12 inicializada con ceros
$opcion;
$continuar;
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
do {
// Función tipoCarga
    echo "Menú de opciones:.\n";
    echo "1. Mostrar contenido de la matriz.\n";
    echo "2. Mostrar temperatura de un año y mes.\n";
    echo "3. Mostrar temperaturas de todos los meses de un año.\n";
    echo "4. Mostrar temperaturas de todos los años de un mes.\n";
    echo "5. Hallar máximas y mínimas.\n";
    echo "6. Datos de primavera.\n";
    echo "7. Datos de invierno.\n";
    echo "8. Mostrar matriz completa.\n";
    $opcion = trim(fgets(STDIN));
    if ($opcion == 1) {
        // Mostrar la matriz completa
        mostrarMatrizCompleta($matrizTemperatura,$años, $meses);
    } elseif ($opcion == 2) {
        // Mostrar temperatura de un año y mes
        echo "Ingrese el año: ";
        $añoElegido = intval(trim(fgets(STDIN)));
        echo "Ingrese el mes(el mes debe contener primera letra mayuscula): ";
        $mesElegido = trim( fgets(STDIN));
        $tempEspecifica = mostrarTemperatura( $matrizTemperatura, $añoElegido, $mesElegido, $meses,$años );
        if($tempEspecifica){
            echo $tempEspecifica;
        }
    } elseif ($opcion == 3) {
        // Mostrar temperaturas de todos los meses de un año
        echo "Ingrese el año: ";
        $año = intval(trim(fgets(STDIN)));
        $tempAnual = mostrarTemperaturasAnuales($matrizTemperatura, $año, $años);
        if(!is_array($tempAnual)){
            echo $tempAnual;
        } else{
            tipoMatriz($tempAnual);
        }
    } elseif ($opcion == 4) {
        // Mostrar temperaturas de todos los años de un mes
        echo "Ingrese el mes: ";
        $mes = trim(fgets(STDIN));
        $tempMensual = mostrarTemperaturasMensuales($matrizTemperatura, $mes, $meses);
    } elseif ($opcion == 5) {
        // Hallar máximas y mínimas
        $crearExtremos = hallarExtremos($matrizTemperatura);
    } elseif ($opcion == 6) {
        // Tipo matriz Primavera
        $matrizPrimavera = crearMatrizPrimavera($matrizTemperatura, $años);
        tipoMatriz($matrizPrimavera, $años ,$meses);
    } elseif ($opcion == 7) {
        // Tipo matriz Invierno
        $matrizInvierno = crearMatrizInvierno($matrizTemperatura,$años);
        tipoMatriz($matrizInvierno, $años, $meses);
    } elseif ($opcion == 8) {
        // Arreglo asociativo
        $arregloAsociativo = crearArregloAsociativo($matrizTemperatura,$años);
    } 
    echo "¿Desea continuar?(Si/No)";
    $continuar = ucfirst(trim(fgets(STDIN)));
    
 } while($continuar !== "No");





 function tipoMatriz($matriz) {
    $cantMatriz = count($matriz);
    for ($i = 0; $i < $cantMatriz; $i++) {
        echo "Año: " . $matriz[$i]["Año"] . "\n"; // Accede al año directamente
        foreach ($matriz[$i]["Meses"] as $mes => $valor) { // Itera sobre los meses
            echo " | Mes: " . $mes . ": " . $valor . "\n";
        }
        echo "\n"; // Separador entre años
    }
}

function mostrarMatrizCompleta($matriz, $años, $meses) {
    $cantMatriz = count($matriz);
    for ($i = 0; $i < $cantMatriz; $i++) {
        echo "Año: " . $años[$i];
        for ($j = 0; $j < count($matriz[$i]); $j++) {
            echo " | Mes: " . $meses[$j] . ": " . $matriz[$i][$j] . "\n";
        }
    }
}


function crearMatrizPrimavera($matrizTemperatura,$años) {
    $matrizPrimavera = [];
    for ($i = 0; $i < 10; $i++) {
        $matrizPrimavera[] = [
            "Año" => $años[$i],
            "Meses" => [
                "Octubre" => $matrizTemperatura[$i][9],
                "Noviembre" => $matrizTemperatura[$i][10],
                "Diciembre" => $matrizTemperatura[$i][11]
            ]
        ];
    }
    return $matrizPrimavera;
}

function crearMatrizInvierno($matrizTemperatura, $años) {
    $matrizInvierno = [];
    for ($i = 5, $j = 0; $i < 10; $i++, $j++) {
        $matrizInvierno[] = [
            "Año" => $años[$i],
            "Meses" => [
                "Julio" => $matrizTemperatura[$i][6],
                "Agosto" => $matrizTemperatura[$i][7],
                "Septiembre" => $matrizTemperatura[$i][8]
            ]
        ];
    }
    return $matrizInvierno;
}
function crearMatrizCompleta($matrizTemperatura, $años) {
    $matrizCompleta = [];
    foreach ($matrizTemperatura as $i => $valores) {
        $meses = [
            "Enero" => $valores[0],
            "Febrero" => $valores[1],
            "Marzo" => $valores[2],
            "Abril" => $valores[3],
            "Mayo" => $valores[4],
            "Junio" => $valores[5],
            "Julio" => $valores[6],
            "Agosto" => $valores[7],
            "Septiembre" => $valores[8],
            "Octubre" => $valores[9],
            "Noviembre" => $valores[10],
            "Diciembre" => $valores[11],
        ];
        $matrizCompleta[] = ["Año" => $años[$i], "Meses" => $meses];
    }
    return $matrizCompleta;
}

function crearArregloAsociativo($matrizTemperatura,$años) {
    $arreglo = [];
    $arreglo["Completa"] = crearMatrizCompleta($matrizTemperatura, $años);
    $arreglo["Primavera"] = crearMatrizPrimavera($matrizTemperatura, $años);
    $arreglo["Invierno"] = crearMatrizInvierno($matrizTemperatura, $años);

    // Mostrar matrices para depuración
    echo "Matriz Completa:\n";
    tipoMatriz($arreglo["Completa"]);
    
    echo "\nMatriz de Primavera:\n";
    tipoMatriz($arreglo["Primavera"]);

    echo "\nMatriz de Invierno:\n";
    tipoMatriz($arreglo["Invierno"]);

    return $arreglo;
}

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

function mostrarTemperatura($matriz, $añoElegido, $mesElegido, $mesesArray,$añoArray) {

    if (!in_array($añoElegido, $añoArray)) {
        return "Año incorrecto: " . $añoElegido ."\n";
    }
    if (!in_array($mesElegido, $mesesArray)){
        return "mes incorrecto: " .$mesElegido ."\n";
    }
    $mesIndex = array_search($mesElegido,  $mesesArray);
    $añoIndex = array_search($añoElegido, $añoArray);
    echo "Temperatura de " . $añoElegido . " en el mes " . $mesElegido . ": " . $matriz[$añoIndex][$mesIndex] . "\n";

}

function mostrarTemperaturasAnuales($matriz, $año, $añosArray) {

    if (!in_array($año, $añosArray)) {
        return "Año incorrecto: " . $año ."\n";
    }
    $matrizAnual = [];
    $fila = $año - 2014;
    $valoresAnuales = $matriz[$fila];
    
    // Crear un diccionario de meses con sus valores correspondientes
    $meses = [
        "Enero" => $valoresAnuales[0],
        "Febrero" => $valoresAnuales[1],
        "Marzo" => $valoresAnuales[2],
        "Abril" => $valoresAnuales[3],
        "Mayo" => $valoresAnuales[4],
        "Junio" => $valoresAnuales[5],
        "Julio" => $valoresAnuales[6],
        "Agosto" => $valoresAnuales[7],
        "Septiembre" => $valoresAnuales[8],
        "Octubre" => $valoresAnuales[9],
        "Noviembre" => $valoresAnuales[10],
        "Diciembre" => $valoresAnuales[11],
    ];
    
    // Estructurar la matriz anual en el formato esperado por mostrarMatriz
    $matrizAnual = [
        [
            "Año" => $año,
            "Meses" => $meses
        ]
    ];
    return $matrizAnual;
}

function mostrarTemperaturasMensuales($matriz, $mes, $mesesArray) {

    $mesIndex = array_search($mes,  $mesesArray);
    if (!in_array($mes, $mesesArray)){
        echo "mes incorrecto: " .$mes ."\n";
        return;
    }

    $suma = 0;
    for ($i = 0; $i < 10; $i++) {
        echo "Año " . (2014 + $i) . ": " . $matriz[$i][$mesIndex] . "\n";
        $suma += $matriz[$i][$mesIndex];
    }
    $promedio = $suma / 10;
    echo "Promedio del mes " . $mes . ": " . $promedio . "\n";
}

function hallarExtremos($matriz) {
    $max = PHP_INT_MIN;
    $min = PHP_INT_MAX;
    $añoMax = $mesMax = $añoMin = $mesMin = 0;

    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 12; $j++) {
            if ($matriz[$i][$j] > $max) {
                $max = $matriz[$i][$j];
                $añoMax = 2014 + $i;
                $mesMax = $j + 1;
            }
            if ($matriz[$i][$j] < $min) {
                $min = $matriz[$i][$j];
                $añoMin = 2014 + $i;
                $mesMin = $j + 1;
            }
        }
    }
    echo "Máximo: $max (Año: $añoMax, Mes: $mesMax)\n";
    echo "Mínimo: $min (Año: $añoMin, Mes: $mesMin)\n";
}
