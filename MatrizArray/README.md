<PROGRAMA PRINCIPAL>
    entero anio
    string mes
    entero temp
    anio<-arreglo()
    mes<-arreglo()
    Temp<-arreglo()
    string cargAut
    Escribir ¿Cargar automaticamente?(s/n)
    leer cargAut
    Si cargAut=s entonces 
    anio<-arreglo(2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023)
    mes<-arreglo(ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic)

    MATRIZ temperaturas[10][12]

    // Llenar la matriz con los datos proporcionados
    temperaturas ← [
        [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29],
        [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31],
        [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32],
        [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31],
        [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30],
        [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29],
        [31, 29, 28, 21, 19, 13, 10, 12, 
Sino
Escribir Cuatos años
leer anio

escribir cuantos meses
leer Meses

Escribir cargar temperatura
leer temp
<MODULOS>
    
    ALGORITMO ConsultarTemperaturaPorAnioYMes
    // Parámetros: Año (2014 a 2023) y Mes (1 a 12)
    ENTRADA año, mes
    SALIDA temperatura

    // Calcular el índice de la fila (año - 2014) y de la columna (mes - 1)
    fila ← año - 2014
    columna ← mes - 1

    // Verificar si los índices son válidos
    SI fila >= 0 Y fila < 10 Y columna >= 0 Y columna < 12 ENTONCES
        temperatura ← temperaturas[fila][columna]
        MOSTRAR "La temperatura en el año ", año, " y mes ", mes, " es: ", temperatura
    SINO
        MOSTRAR "Año o mes fuera de rango."
    FIN SI
    FIN ALGORITMO


   ALGORITMO ConsultarTemperaturasPorAnio
    // Parámetro: Año (2014 a 2023)
    ENTRADA año

    // Calcular el índice de la fila (año - 2014)
    fila ← año - 2014

    // Verificar si el índice es válido
    SI fila >= 0 Y fila < 10 ENTONCES
        MOSTRAR "Las temperaturas del año ", año, " son:"
        PARA columna DESDE 0 HASTA 11 HACER
            MOSTRAR "Mes ", columna + 1, ": ", temperaturas[fila][columna]
        FIN PARA
    SINO
        MOSTRAR "Año fuera de rango."
    FIN SI
FIN ALGORITMO

ALGORITMO ConsultarTemperaturasPorMes
    // Parámetro: Mes (1 a 12)
    ENTRADA mes
    SALIDA promedio

    // Calcular el índice de la columna (mes - 1)
    columna ← mes - 1
    suma ← 0

    // Verificar si el índice es válido
    SI columna >= 0 Y columna < 12 ENTONCES
        MOSTRAR "Las temperaturas del mes ", mes, " son:"
        PARA fila DESDE 0 HASTA 9 HACER
            MOSTRAR "Año ", 2014 + fila, ": ", temperaturas[fila][columna]
            suma ← suma + temperaturas[fila][columna]
        FIN PARA
        promedio ← suma / 10
        MOSTRAR "Promedio de temperaturas en el mes ", mes, ": ", promedio
    SINO
        MOSTRAR "Mes fuera de rango."
    FIN SI
FIN ALGORITMO
