# Despachador #

Llamamos despachador al módulo encargado de recibir la petición (URL y sus parámetros) y llamar a la función que corresponda.

## Versión mínima ##

La versión mínima del despachador podría ser una función que tome de uno de los parámetros de la URL (por ejemplo el parámetro **hacer**), tome su valor agregue un prefijo (por ejemplo _despachable), se fije si la función existe y en caso de existir la invoque._

### Discusión ###

  1. ¿Por qué usar el valor que llega como parámetro para buscar el nombre de la función en vez de tener una tabla (o arreglo asociativo) indicando para cada valor recibido en el parámetro cuál es la función que debe invocarse?
    1. La principal desventaja de tener tal tabla de traducción es que viola el [principio de lo simple de configurar](Simple#Configurar.md) y por lo tanto una fuente de posibles errores (o sea un riesgo innecesario).
    1. La ventaja de tener tal tabla podría ser mantener compatibilidad hacia atrás pudiendo cambiar el nombre de la función que atiende determinada petición (sin cambiar el valor que debe pasarse al parámetro **hacer**)
    1. Hay una solución intermedia (que se implemente solo si es necesario) que es tener una tabla de conversión solo para las excepciones.
  1. Si se va a usar el valor recibido por la URL para elegir la función ¿cuál es la necesidad de poner un prefijo?
    1. El prefijo indica claramente que esa función que se está escribiendo es una función despachable (o sea cumple la necesidad de identificar qué funciones son despachables y cuáles no, <font size='1'>en el caso de tener una tabla de conversión obligatoria no haría falta prefijar para identificar, las identificadas son las que están en la tabla, pero esto agrega otra desventaja, la de tener que revisar la tabla para saber si una función es despachable o no</font>).
    1. Poner un prefijo impide que accidentalmente alguien pueda invocar desde la URL a una función que no estaba diseñada para accederse desde afuera (o sea poner el nombre de función sin prefijos o sufijos es un posible agujero de seguridad).