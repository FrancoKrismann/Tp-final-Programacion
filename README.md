INICIO ALGORITMO
ENTERO opcion,año
STRING mes, tipoArray
matrizTemperatura <-- [10][12]
STRING cargTipo, continuar
[]matrizSeleccionada
años <-- arreglo[2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023]
meses <-- arreglo["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]

    Repetir
    ESCRIBIR "Tipo de carga de Temperatura(Manual/Automatico)"
    LEER(cargTipo)
    tipoCarga(cargTipo, años, meses)
    // Menú de opciones
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
            mostrarMatrizCompleta(matrizTemperatura, años)
    OTRO-SI (opcion = 2) ENTONCES
        <!-- Mostrar temperatura de un año y mes -->
                ESCRIBIR ("Ingrese el año")
                LEER(año)
                ESCRIBIR("Ingrese el mes")
                LEER(mes)
                mostrarTemperatura(temperaturas, año, mes)
    OTRO-SI (opcion = 3) ENTONCES
        // Mostrar temperaturas de todos los meses de un año
        ESCRIBIR "Ingrese el año:"
         LEER año
        mostrarTemperaturasAnuales()
    OTRO-SI (opcion = 4) ENTONCES
        // Mostrar temperaturas de todos los años de un mes
        Escribir "Ingrese el mes:"
        LEER mes
        mostrarTemperaturasMensuales()
        FIN PARA
    OTRO-SI (opcion = 5) ENTONCES 
        // Hallar máximas y mínimas
        hallarExtremos()
      
    OTRO-SI( opcion = 6 OR opcion = 7 OR opcion = 8) ENTONCES
        SI (opcion=6)  
        tipoArray<--"Primavera"
        OTRO-SI(opcion=7)
        tipoArray<--"Invierno"
        SINO
        tipoArray<--"Completa"
        FIN SI
        matrizSeleccionada <-- tipoMatriz(tipoArray,años, matrizTemperatura)
        respuesta<--"Matriz de tipo: " + tipoArraymatrizSeleccionada
    FIN SI

      Escribir respuesta
      Escribir "Desea Continuar?(s/n)"
      HASTA (continuar = n)

    <!-- MODULO PARA CARGAR LA MATRIZ DE TEMPERATURAS -->

 
    MODULO tipoMatriz(STRING tipoMatriz, []años, [][]matrizTemperatura) RETORNA []
        ENTERO dataOct, dataNov, dataDic, dataJul, data,Agost,dataSept
        primavera <-- ["Primavera" --> []]
        invierno <-- ["Invierno" --> []]
        arrayMultiple <-- [ "Completa" --> [], "Primavera" --> [], "Invierno" --> []]
        seleccionMatriz <-- []
        <!-- Hasta 11 o 12? -->
            PARA i <-- 0 DESDE 0 HASTA 11 PASO 1 HACER
                dataOct <-- matrizTemperatura[i][9]
                dataNov <-- matrizTemperatura[i][10]
                dataDic <-- matrizTemperatura[i][11]
                primavera["Primavera"][años[i]] = ["Octubre" => dataOct, "Noviembre" => dataNov, "Diciembre" => dataDic]
            FIN PARA
            PARA i <-- 5 DESDE 0 HASTA 11 PASO 1 HACER
                dataJul <-- matrizTemperatura[i][6]
                dataAgost <-- matrizTemperatura[i][7]
                dataSept <-- matrizTemperatura[i][8]
                primavera["Primavera"][años[i]] = ["Julio" => dataJul, "Octubre" => dataAgost, "Septiembre" => dataSept]
            FIN PARA
        
        arrayMultiple["Completa"][] = matrizTemperatura
        arrayMultiple["Primavera"][] = primavera["Primavera"][]
        arrayMultiple["Invierno"][] = invierno["Invierno"][]
        
        Si (tipoMatriz == "Completa") ENTONCES 
            seleccionMatriz <-- arrayMultiple["Completa"][]
        OTRO-SI (tipoMatriz == "Primavera") ENTONCES 
            seleccionMatriz <-- arrayMultiple["Primavera"][]
        SINO
            seleccionMatriz <-- arrayMultiple["Invierno"][]
        FIN SI

        RETORNA seleccionMatriz
        
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
    ENTERO columna <-- mes - 1
    ESCRIBIR "Temperatura de " + año + " en el mes " + mes + ": " + temperaturas[fila][columna]
FIN MODULO


   MODULO mostrarTemperaturasAnuales(MATRIZ temperaturas, ENTERO año)
    ENTERO fila <-- año - 2014
    ESCRIBIR "Temperaturas del año " + año + ": " + temperaturas[fila]
FIN MODULO


 MODULO mostrarTemperaturasMensuales(MATRIZ temperaturas, ENTERO mes)
    ENTERO columna <-- mes - 1
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
 7-programacion-php
    FIN PARA
    ESCRIBIR "Máximo: " + max + " Año: " + (2014 + añoMax) + " Mes: " + (mesMax + 1)
    ESCRIBIR "Mínimo: " + min + " Año: " + (2014 + añoMin) + " Mes: " + (mesMin + 1)
FIN MODULO


        respuesta<- "Máxima: " + maximo + " Año: " + (añoMaximo + 2014) + " Mes: " + (mesMaximo + 1) "Y Mínima: " + minimo + " Año: " + (añoMinimo + 2014) + " Mes: " + (mesMinimo + 1)
    OTRO-SI( opcion = 6 OR opcion = 7 OR opcion = 8) ENTONCES
        SI (opcion=6)
        tipoArray<--"Primavera"
        OTRO SI(opcion=7)
        tipoArray<--"Invierno"
        SINO
        tipoArray<--"Completa"
        FIN SI
        matrizSeleccionada <-- tipoMatriz(tipoArray,años, matrizTemperatura)
        respuesta<--"Matriz de tipo: " + tipoArraymatrizSeleccionada
    FIN SI
cocacola
 main
FIN ALGORITMO
