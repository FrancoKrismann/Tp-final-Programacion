<PROGRAMA PRINCIPAL>
anio<-arreglo()
mes<-arreglo(ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic)
Temp<-arreglo()
ALGORITMO CargaAutomatica
    // Declarar la matriz bidimensional para almacenar las temperaturas
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
