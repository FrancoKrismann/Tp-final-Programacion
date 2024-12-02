    INICIO ALGORITMO
    ENTERO opcion,año
    STRING mes, tipoArray
    matrizTemperatura <-- [10][12]
    STRING cargTipo, continuar
    []matrizSeleccionada
    años <-- arreglo[2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023]
    meses <-- arreglo["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]


    ESCRIBIR "Tipo de carga de Temperatura(Manual/Automatico)"
    LEER(cargTipo)
    tipoCarga(cargTipo, años, meses)
    // Menú de opciones
  Repetir
    ESCRIBIR "Menú de opciones:"
    ESCRIBIR "1. Mostrar contenido de la matriz"
    ESCRIBIR "2. Mostrar temperatura de un año y mes"
    ESCRIBIR "3. Mostrar temperaturas de todos los meses de un año"
    ESCRIBIR "4. Mostrar temperaturas de todos los años de un mes"
    ESCRIBIR "5. Hallar máximas y mínimas"
    ESCRIBIR "6. Datos de primavera"
    ESCRIBIR "7. Datos de invierno"
    ESCRIBIR "8. Mostrar matriz completa"
    
    LEER(opcion)   

    SI (opcion = 1) ENTONCES
        <!-- Mostrar la matriz -->
             matrizCompleta <-- mostrarMatrizCompleta(matrizTemperatura, años)
            mostrarMatriz(matrizCompleta,años)
    OTRO-SI (opcion = 2) ENTONCES
        <!-- Mostrar temperatura de un año y mes -->
                ESCRIBIR ("Ingrese el año")
                LEER(año)
                ESCRIBIR("Ingrese el mes")
                LEER(mes)
                tempEspecifica <--- mostrarTemperatura(temperaturas, año, mes)
                mostrarMatriz(tempEspecifica ,años)
    OTRO-SI (opcion = 3) ENTONCES
        // Mostrar temperaturas de todos los meses de un año
        ESCRIBIR "Ingrese el año:"
        LEER(año)
        tempAnual <-- mostrarTemperaturasAnuales()
        mostrarMatriz(tempAnual, años)
    OTRO-SI (opcion = 4) ENTONCES
        // Mostrar temperaturas de todos los años de un mes
        Escribir "Ingrese el mes:"
        LEER (mes)
        tempMensual <-- mostrarTemperaturasMensuales()
        mostrarMatriz(tempMensual,años)
    OTRO-SI (opcion = 5) ENTONCES 
        // Hallar máximas y mínimas
        crearExtremos <-- hallarExtremos()
        mostrarMatriz(crearExtremos, años)
    OTRO-SI(opcion = 6) ENTONCES 
       //Tipo matriz Primavera
        matrizPrimavera <-- crearMatrizPrimavera(matrizTemperaturas)
        mostrarMatriz(matrizPrimavera, años)
    OTRO-SI(opcion = 7) ENTONCES 
        //Tipo matrix Invierno
        crearMatrizInvierno <-- crearMatrizPrimavera(matrizTemperaturas)
        mostrarMatriz(crearMatrizInvierno, años)
    
    OTRO-SI(opcion = 8) ENTONCES
          arregloAsociativo <-- crearArregloAsociativo(matrizTemperaturas)
        mostrarArregloAsociativo(arregloAsociativo)
    FIN SI

 Escribir "Desea repetir?(Si/No)"
 Leer (continuar)
 HASTA (continuar = n)

MODULOS:

    MODULO mostrarMatriz(matriz, años)
    cantMatriz <-- cant(matriz)
    PARA i <-- 0 DESDE 0 HASTA cantMatriz  HACER          
            PARA j <-- 0 DESDE 0 HASTA cantMatriz  HACER
               ESCRIBIR( años[i], ": ", matriz[j])
        FIN PARA
    FIN PARA
    FIN MODULO


    MODULO crearMatrizPrimavera([][]matrizTemperatura) RETORNA [][]ENTERO
       matrizPrimavera[10][3]                                                                                                                                                    
        PARA i <-- 0 DESDE 0 HASTA 9 PASO 1 HACER
                matrizPrimavera[i][0] <-- matrizTemperatura[i][9]                                                                
                matrizPrimavera[i][1] <-- matrizTemperatura[i][10]
                matrizPrimavera[i][2] <-- matrizTemperatura[i][11]
            FIN PARA
            RETORNAR matrizPrimavera
    FIN MODULO

    MODULO crearMatrizInvierno([][]matrizTemperatura) RETORNA [][]ENTERO
      matrizInvierno[5][3]
      PARA i <-- 4 DESDE 4 HASTA 9 PASO 1 HACER
            PARA j <-- 0 DESDE 0 HASTA 4 PASO 1 HACER
                matrizInvierno[j][0] <-- matrizTemperatura[i][9]                                                                
                matrizInvierno[j][1] <-- matrizTemperatura[i][10]
                matrizInvierno[j][2] <-- matrizTemperatura[i][11]
            FIN PARA
            RETORNAR matrizInvierno

    FIN MODULO

 
    MODULO crearArregloAsociativo(matriz) RETORNA []ENTERO
     []arreglo 
    arreglo["Completa"] <-- matriz
    arreglo["Primavera"] <-- crearMatrizPrimavera(matriz)
    arreglo["Invierno"] <-- crearMatrizInvierno(matriz)
    RETORNAR arreglo
    FIN MODULO

    
    MODULO tipoCarga(STRING tipo, []años, []meses, [][]matrizTemperatura)

    SI (tipo = "AUTOMATICO") ENTONCES
        <!-- Carga automática -->
         datosAutomatica = [
        [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29], // 2014
        [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31], // 2015
        [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32], // 2016
        [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31], // 2017
        [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30],  // 2018
        [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29], // 2019
        [31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29], // 2020
        [30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30], // 2021
        [31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30], // 2022
        [32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31]  // 2023
    ]
    matrizTemperatura <-- datosAutomatica
    ESCIRBIR("Carga automatica completada")
    SINO
        PARA año <-- 0 DESDE 0 HASTA 9 PASO 1 HACER

                ESCRIBIR("Ingrese las temperaturas de los meses del año: " años[año])
           
            PARA mes <-- 0 DESDE 0 HASTA 11 PASO 1 HACER
                ENTERO tempMes <-- 0
                ESCRIBIR("Ingrese la temperatura de " + meses[mes])
                LEER temperatura
                matrizTemperatura[año][mes] <-- temperatura
            FIN PARA
        FIN PARA
        ESCRIBIR"Carga manual completada."
    FIN SI

    FIN MODULO

    MODULO mostrarMatriz(MATRIZ matriz, STRING tipo)
    ESCRIBIR "Matriz de tipo: " + tipo
    PARA i = 0 HASTA LONGITUD(matriz) - 1 HACER
        MOSTRAR matriz[i]
    FIN PARA
    FIN MODULO

    MODULO mostrarTemperatura(MATRIZ temperaturas, ENTERO año, ENTERO mes)
    ENTERO fila <-- año - 2014
    ENTERO columna <-- mes 
    ESCRIBIR "Temperatura de " + año + " en el mes " + mes + ": " + temperaturas[fila][columna]
    FIN MODULO


    MODULO mostrarTemperaturasAnuales(MATRIZ temperaturas, ENTERO año)
    ENTERO fila <-- año - 2014
    ESCRIBIR "Temperaturas del año " + año + ": " + temperaturas[fila]
    FIN MODULO


    MODULO mostrarTemperaturasMensuales(MATRIZ temperaturas, ENTERO mes)
    ENTERO columna <-- mes 
    ENTERO suma <-- 0
    PARA i = 0 HASTA 9 HACER
        suma <-- suma + temperaturas[i][columna]
        ESCRIBIR "Año " + (2014 + i) + ": " + temperaturas[i][columna]
    FIN PARA
    REAL promedio <-- suma / 10
    ESCRIBIR "Promedio del mes " + mes + ": " + promedio
    FIN MODULO

    
    MODULO hallarExtremos(MATRIZ temperaturas)
    ENTERO max <-- -9999, min <-- 9999
    ENTERO añoMax, mesMax, añoMin, mesMin
    PARA i = 0 HASTA 9 HACER
        PARA j = 0 HASTA 11 HACER
            SI temperaturas[i][j] > max ENTONCES
                max <-- temperaturas[i][j]
                añoMax <-- i
                mesMax <-- j
            FIN SI
            SI temperaturas[i][j] < min ENTONCES
                min <-- temperaturas[i][j]
                añoMin <-- i
                mesMin <-- j
            FIN SI
        FIN PARA
    FIN PARA
    ESCRIBIR "Máximo: " + max + " Año: " + (2014 + añoMax) + " Mes: " + (mesMax + 1)
    ESCRIBIR "Mínimo: " + min + " Año: " + (2014 + añoMin) + " Mes: " + (mesMin + 1)
    FIN MODULO



    FIN ALGORITMO
