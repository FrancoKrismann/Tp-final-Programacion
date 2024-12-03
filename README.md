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
    Repetir
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
            mostrarMatriz(matrizCompleta,años)
    OTRO-SI (opcion = 2) ENTONCES
        <!-- Mostrar temperatura de un año y mes -->
                ESCRIBIR ("Ingrese el año")
                LEER(año)
                ESCRIBIR("Ingrese el mes")
                LEER(mes)
                tempEspecifica <--- mostrarTemperatura(temperaturas, año, mes)
                SI(tempEspecifica) ENTONCES
                ESCRIBIR(tempEspecifica)
                FIN SI
    OTRO-SI (opcion = 3) ENTONCES
        // Mostrar temperaturas de todos los meses de un año
        ESCRIBIR "Ingrese el año:"
        LEER(año)
        tempAnual <-- mostrarTemperaturasAnuales(matrizTemperatura, año, años)
        SI NOT(IS_ARRAY(tempAnual)) ENTONCES
            ESCRIBIR(tempAnual)
        SINO
        tipoMatriz(tempAnual, años)
        FIN SI
    OTRO-SI (opcion = 4) ENTONCES
        // Mostrar temperaturas de todos los años de un mes
        Escribir "Ingrese el mes:"
        LEER (mes)
        tempMensual <-- mostrarTemperaturasMensuales(matrizTemperatura, mes, meses)
    OTRO-SI (opcion = 5) ENTONCES 
        // Hallar máximas y mínimas
        crearExtremos <-- hallarExtremos(matrizTemperatura)
    OTRO-SI(opcion = 6) ENTONCES 
       //Tipo matriz Primavera
        matrizPrimavera <-- crearMatrizPrimavera(matrizTemperaturas, años)
        tipoMatriz(matrizPrimavera, años, meses)
    OTRO-SI(opcion = 7) ENTONCES 
        //Tipo matrix Invierno
        crearMatrizInvierno <-- crearMatrizPrimavera(matrizTemperaturas, años)
        tipoMatriz(crearMatrizInvierno, años, meses)
    
    OTRO-SI(opcion = 8) ENTONCES
          arregloAsociativo <-- crearArregloAsociativo(matrizTemperaturas)
    FIN SI

      Escribir respuesta
      Escribir "Desea repetir?(s/n)"
      HASTA (continuar = n)

MODULOS:

    MODULO tipoMatriz(matriz, años)
    cantMatriz <-- cant(matriz)
     PARA i <-- 0 DESDE 0 HASTA cantMatriz PASO 1 HACER
        ESCRIBIR( "Año: " + fila["Año"])
        PARA CADA mes, valor EN fila["Meses"]
            ESCRIBIR(" | Mes: " + mes + ": " + valor)
        FIN PARA
    FIN PARA
    FIN MODULO

    MODULO mostrarMatrizCompleta([][]ENTERO matriz, []ENTERO años, []STRING meses)
         cantMatriz ← longitud(matriz)  

    PARA i DESDE 0 HASTA cantMatriz - 1 HACER
        ESCRIBIR( "Año: " + años[i])  
        PARA j DESDE 0 HASTA longitud(matriz[i]) - 1 HACER
            ESCRIBIR( " | Mes: " + meses[j] + ": " + matriz[i][j])
        FIN PARA
    FIN PARA
    FIN MODULO


    MODULO crearMatrizPrimavera(ENTERO [][]matrizTemperatura, []ENTEROS años) RETORNA ENTERO [][]
       matrizPrimavera[10][3]
       []meses
        PARA i <-- 0 DESDE 0 HASTA 9 PASO 1 HACER
        meses = [
            "Octubre": matrizTemperatura[i][9],
            "Noviembre": matrizTemperatura[i][10],
            "Diciembre": matrizTemperatura[i][11]
        ]
       matrizPrimavera <-- ["Año": años[i], "Meses": meses] 
            FIN PARA
            RETORNAR matrizPrimavera
    FIN MODULO

    MODULO crearMatrizInvierno([][]matrizTemperatura,[]ENTEROS años) RETORNA [][]ENTERO
      matrizInvierno[5][3]
      []meses
       PARA i DESDE 5 HASTA 9
        INICIAR meses COMO DICCIONARIO
        meses = {
            "Julio": matrizTemperatura[i][6],
            "Agosto": matrizTemperatura[i][7],
            "Septiembre": matrizTemperatura[i][8]
        }

        matrizInvierno <-- ["Año": años[i], "Meses": meses] 
            FIN PARA
            RETORNAR matrizInvierno
    FIN MODULO

    MODULO crearMatrizCompleta([][]ENTERO matrizTemperatura, [] ENTERO años)
    []matrizCompleta 
    []meses

    PARA i DESDE 0 HASTA tamaño(matrizTemperatura) - 1
        meses = {
            "Enero": matrizTemperatura[i][0],
            "Febrero": matrizTemperatura[i][1],
            "Marzo": matrizTemperatura[i][2],
            "Abril": matrizTemperatura[i][3],
            "Mayo": matrizTemperatura[i][4],
            "Junio": matrizTemperatura[i][5],
            "Julio": matrizTemperatura[i][6],
            "Agosto": matrizTemperatura[i][7],
            "Septiembre": matrizTemperatura[i][8],
            "Octubre": matrizTemperatura[i][9],
            "Noviembre": matrizTemperatura[i][10],
            "Diciembre": matrizTemperatura[i][11]
        }

        matrizCompleta <-- ["Año": años[i], "Meses": meses] 
    FIN PARA
    RETORNAR matrizCompleta
    FIN MODULO


 
    MODULO crearArregloAsociativo([][]ENTERO matriz, []ENTERO años) RETORNA []ENTERO
     []arreglo 
     arreglo["Completa"] = crearMatrizCompleta(matrizTemperatura, años)
    arreglo["Primavera"] = crearMatrizPrimavera(matrizTemperatura, años)
    arreglo["Invierno"] = crearMatrizInvierno(matrizTemperatura, años)
    ESCRIBIR "Matriz completa:"
    tipoMatriz(arreglo["Completa"])
    
    ESCRIBIR "Matriz de Primavera:"
    tipoMatriz(arreglo["Primavera"])

    ESCRIBIR "Matriz de Invierno:"
    tipoMatriz(arreglo["Invierno"])

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

    MODULO mostrarMatriz([][] matriz, []años, []MESE, []meses) 
    cantMatriz ← longitud(matriz)
    Para i desde 0 hasta cantMatriz - 1 hacer
        ESCRIBIR "Año: " + años[i]
        Para j desde 0 hasta longitud(matriz[i]) - 1 hacer
            ESCRIBIR " | Mes: " + meses[j] + ": " + matriz[i][j]
        Fin Para
    Fin Para
    FIN MODULO

    MODULO mostrarTemperatura([][]ENTERO matriz, ENTERO añoElegido, ENTERO mesElegido,[]ENTERO años, []STRING meses)
     SI NOT(IN_ARRAY(añoElegido,años)) ENTONCES
         RETORNA ESCRIBIR("Año incorrecto: " + añoElegido)
     OTRO-SI NOT(IN_ARRAY(mesElegido, meses)) ENTONCES
         RETORNA ESCRIBIR("Mes incorrecto: " + mesElegido)
     FIN SI
     mesIndex ← buscarIndice(mesElegido, mesesArray)
    añoIndex ← buscarIndice(añoElegido, añoArray)
    Mostrar "Temperatura de " + añoElegido + " en el mes " + mesElegido + ": " + matriz[añoIndex][mesIndex]
    FIN MODULO


    MODULO mostrarTemperaturasAnuales([][]ENTERO matriz, ENTERO añoElegido, []ENTERO años)
    []matrizAnual
    SI NOT(IN_ARRAY(añoElegido,años)) ENTONCES
         RETORNA ESCRIBIR("Año incorrecto: " + añoElegido)
    FIN SI
    ENTERO fila <-- año - 2014
    valoresAnuales <-- matriz[fila]
    []meses
    meses <-- [
        "Enero": valoresAnuales[0],
        "Febrero": valoresAnuales[1],
        "Marzo": valoresAnuales[2],
        "Abril": valoresAnuales[3],
        "Mayo": valoresAnuales[4],
        "Junio": valoresAnuales[5],
        "Julio": valoresAnuales[6],
        "Agosto": valoresAnuales[7],
        "Septiembre": valoresAnuales[8],
        "Octubre": valoresAnuales[9],
        "Noviembre": valoresAnuales[10],
        "Diciembre": valoresAnuales[11]
    ]
    matrizAnual <-- [
        [
            "Año": año,
            "Meses": meses
        ]
    ]
    RETORNAR matrizAnual
    FIN MODULO


    MODULO mostrarTemperaturasMensuales([][]ENTEROS matriz, ENTERO mes,[]STRING mesesArray)
    
    SI NOT(IN_ARRAY(mes,mesesArray)) ENTONCES
         RETORNA ESCRIBIR("Año incorrecto: " + añoElegido)
    FIN SI
    
    mesIndex ← buscarIndice(mes, mesesArray)
    suma ← 0
    Para i desde 0 hasta 9 hacer
        Mostrar "Año " + (2014 + i) + ": " + matriz[i][mesIndex]
        suma ← suma + matriz[i][mesIndex]
    Fin Para
    promedio ← suma / 10
    Mostrar "Promedio del mes " + mes + ": " + promedio
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

