# Tercera Reunión #

| Fecha | Presentes |
|:------|:----------|
| 2/9 | Elba, Graciela, Raquel, Emilio |

# Cómo enviar HTML con datos #

En esta reunión estuvimos trabajando sobre los problemas de enviar código HTML con datos desde el servidor y de las posibles soluciones. Teníamos en nuestro código algo similar a:

```
$title=$definicion_campo['title'];
$leyenda=$definicion_campo['leyenda'];
$campo=$definicion_campo['campo'];
echo "<div title=$title>
        <label for=$campo>$leyenda</label>
        <input id=$campo name=$campo type='text'>
      </div>";
```

El problema de esto es la interpolación directa de valores de las variables. Para armar el HTML debe cuidarse que los textos no tengan signos de menor y mayor y en los valores de atributos que no tengan comillas o espacios <font size='1'>(lo de los espacios se puede solucionar encerrando entre comillas el atributo, pero aún así persiste el problema de las comillas)</font>.

## Solución 1: usar la función estándar htmlspecialchars ##

La primera solución es hacer explícito la conversión:

```
...
$campo=htmlspecialchars($definicion_campo['campo']);
echo "<div title=\"$title\">
...
```

La función htmlspecialchars transforma los signos <, >, & y " en sus respectivos &lt; &gt; &amp y &quot; El problema de usar esta función es que hay que prestar atención de usarla siempre, que es difícil detectar si uno se olvidó de usarla. La función no traduce la comilla simple salvo que se le pase el parámetro ENT\_QUOTES, entonces hay que delimitar el atributo con comillas dobles o acordarse de pasar el parámetro.

La principal desventaja de esta solución es la tentación de los programadores a hacer interpolación directa y a olvidarse de las funciones de conversión.

## Solución 2: enviando los elementos de a uno ##

La segunda solución consiste en usar una función para enviar cada elemento Separando el contenido de los asuntos y sus valores. Acá había dos alternativas para manejar los elementos que incluyen otros elementos:

  1. enviar el contenido como parámetro
```
enviar_elemento('div',
  enviar_elemento('span',
    "Este texto"
  )
);
```

> 2. enviar la apertura y cierre de los elementos en funciones separadas:

```
abrir_elemento('div');
  abrir_elemento('span');
    enviar_texto("Este texto");
  cerrar_elemento('span');
cerrar_elemento('div');
```

Esto podría hacerse también sin la necesidad de indicar el tag al momento de cerrar. La ventaja de la primera opción es que no necesita controlar que uno no se olvide de cerrar los elementos. La ventaja de la segunda opción se da cuando los elementos internos deben ser calculados en un ciclo, aun cuando se pueda pasar todos los elementos en un arreglo es más cómodo y visual ir construyéndolos y enviándolos con las mismas instrucciones.

## Solución 3: interpolación controlada ##

La ventaja de la interpolación es que es más visual y compacta la manera de escribir, planteamos para seguir en la próxima reunión pensar en una solución que pueda escribir algo como:

```
enviar_interpolando("
  <div title=#title>
    <label for=#campo>#leyenda</label>
    <input id=#campo name=#campo type='text'>
  </div>", $definicion_campos);
```

O sea llamamos a una función que se encarga de hacer la interpolación buscando los _placeholders_ dentro de la cadena (en vez de dejar la interpolación automática del PHP en base a variables que empiecen con $). Esto agregaría también la ventaja de usar claves en un arreglo en vez de verdaderas variables.

## Acuerdos ##

  1. Evitar la interpolación directa de variables dentro de strings, ya sea para enviar HTML o para armar sentencias SQL o lo que sea. Los puntos de interpolación (o de concatenado directo de texto) deben estar controlados en pocos puntos del programa.
  1. Evitar las variables con nombres negativos (vale también para nombres de campos en las bases de datos). Por ejemplo hay elementos HTML cuyos TAGS no tienen tag de cierre (por ejemplo INPUT), si tenemos una tabla con los nombres de tags posibles una variable podría ser "sin\_cierre", ese nombre es negativo y eso agrega confusiones a la hora de programar o de comunicarse con el usuario. Feo queda un "if not sin\_cierre", es preferible que la variable se llame solo\_apertura o lo que sea.


## Cierre de la actividad ##

Habiendo explorado una de las alternativas de solución quedamos que en la próxima reunión comenzamos el desarrollo de la otra alternativa.

## ¿Cómo seguimos? ##

**Próxima reunión**: jueves 4/9 11:00 a 13:00