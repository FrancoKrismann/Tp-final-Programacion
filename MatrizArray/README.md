INICIO ALGORITMO

ENTERO opcionUsuario
ENTERO añoIterador
ENTERO mesIterador
matrizTemperatura <-- [10][12]
STRING cargTipo
años <-- arreglo[2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023]
meses <-- arreglo["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]


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
    ESCRIBIR "8. Mostrar arreglos completos"

    LEER(opcionUsuario)




    SI opción = 3 ENTONCES
        // Mostrar la matriz
        PARA año = 0 HASTA 9 HACER
            MOSTRAR "Año " + (año + 2014) + ": " + matrizTemperatura[año]
        FIN PARA
    FIN SI

    SI opción = 4 ENTONCES
        // Mostrar temperatura de un año y mes
        LEER año, mes
        MOSTRAR "Temperatura en " + (año) + " para el mes " + (mes) + " es: " + matrizTemperatura[año-2014][mes-1]
    FIN SI

    SI opción = 5 ENTONCES
        // Mostrar temperaturas de todos los meses de un año
        LEER año
        MOSTRAR "Temperaturas en el año " + año + ": " + matrizTemperatura[año-2014]
    FIN SI

    SI opción = 6 ENTONCES
        // Mostrar temperaturas de todos los años de un mes
        LEER mes
        PARA año = 0 HASTA 9 HACER
            MOSTRAR "Temperatura en el mes " + mes + " del año " + (año+2014) + " es: " + matrizTemperatura[año][mes-1]
        FIN PARA
    FIN SI

    SI opción = 7 ENTONCES
        // Hallar máximas y mínimas
        maximo = -9999
        minimo = 9999
        PARA año = 0 HASTA 9 HACER
            PARA mes = 0 HASTA 11 HACER
                SI matrizTemperatura[año][mes] > maximo ENTONCES
                    maximo = matrizTemperatura[año][mes]
                    añoMaximo = año
                    mesMaximo = mes
                FIN SI
                SI matrizTemperatura[año][mes] < minimo ENTONCES
                    minimo = matrizTemperatura[año][mes]
                    añoMinimo = año
                    mesMinimo = mes
                FIN SI
            FIN PARA
        FIN PARA
        MOSTRAR "Máxima: " + maximo + " Año: " + (añoMaximo + 2014) + " Mes: " + (mesMaximo + 1)
        MOSTRAR "Mínima: " + minimo + " Año: " + (añoMinimo + 2014) + " Mes: " + (mesMinimo + 1)
    FIN SI

    SI opción = 8 ENTONCES
        // Mostrar datos de primavera (octubre, noviembre, diciembre)
        primavera = []
        PARA año = 0 HASTA 9 HACER
            primavera[año] = [matrizTemperatura[año][9], matrizTemperatura[año][10], matrizTemperatura[año][11]]
        FIN PARA
        MOSTRAR primavera
    FIN SI

    SI opción = 9 ENTONCES
        // Mostrar datos de invierno (julio, agosto, septiembre)
        invierno = []
        PARA año = 0 HASTA 9 HACER
            invierno[año] = [matrizTemperatura[año][6], matrizTemperatura[año][7], matrizTemperatura[año][8]]
        FIN PARA
        MOSTRAR invierno
    FIN SI

    SI opción = 10 ENTONCES
        // Mostrar arreglo completo
        arregloCompleto = ["completa" : matrizTemperatura, "primavera" : primavera, "invierno" : invierno]
        MOSTRAR arregloCompleto
    FIN SI

FIN

<!-- MODULO PARA CARGAR LA MATRIZ DE TEMPERATURAS -->

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

FIN ALGORITMO
