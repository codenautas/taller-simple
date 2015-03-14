# Séptima Reunión #

|Fecha|Presentes|
|:----|:--------|
|2/10|Stefania, Graciela, Raquel, Mauro, Emilio, Elba|

Por ahora, si bien tenemos el motor (aplicación) separado del modelo de negocios lo cual es muy bueno, el modelo está representado en el programa por variables globales, lo cual tendremos que mejorar.

# Reflexión #
La reflexión es el mecanismo por el cual un programa se consulta a si mismo sobre sus componentes o comportamiento. Entonces, no debería ser  necesario usar un mecanismo de reflexión, si tenemos el motor separado del modelo, es decir: ¿por qué sería necesario mirarme a mí mismo?, muy probablemente porque tengo los metadatos mezclados con el programa.
Un caso donde la reflexión está bien aplicada es cuando estamos programando casos de prueba.

# Modelando #
Nuestro modelo hablaba de **entidades** que era nuestra metáfora para todo candidato a tabla, sin embargo, existen **entidades complejas** como _encuesta_ que contiene _vivienda, hogar, personas, respuestas, etc_. Cuando estoy modelando entiendo la realidad pero construyo un modelo que está separado de la realidad. Y en el camino, ir haciendo cosas que funcionen, nos ayuda a modelar.

En nuestra tarea, generalmente tenemos que tratar de llamar a las cosas como las llaman los usuarios, pero puede haber problemas en la comunicación, como en el caso de clasificar a las consistencias en errores (no puede haber falsos positivos) y advertencias (puede haber falsos positivos). Preferimos en definitiva usar los términos _error_ y _advertencia_ que todos entendemos bien.

En nuestra aplicación tenemos que modelar un proceso de reclutamiento, que no es considerado por nuestros usuarios como un _proyecto_, que son los operativos. No nos conviene generalizar un concepto que el usuario va a pensar como algo más restrictivo, así que empezamos a pensar un sinónimo para la palabra _proyecto_, elegimos la palabra _actividad_

# Desarrollo #
Ahora, necesitamos imaginarnos el menú, pensando en nuestro despachador. El que define el modelo puede agregar todas las entidades que quiera. El motor sabrá que cosas puede hacer con esas entidades. Es lógico que el menú se estructure en función del modelo, pero las entidades no son las únicas opciones para el menú (están también el _salir_, _cambiar password_, etc.)

Recordemos que uno de nuestros acuerdos era que armábamos los strings siempre en un mismo lugar, en nuestro caso el armador\_html. Ahora tenemos que generar las url's para poder ir a ellas a través del menú.

El armado de **URL** es otro punto donde hay que interpolar datos de distintos niveles (en este caso nombres de atributos de nuestro programa y atributos del modelo de negocios, o sea metadatos). Creamos entonces una función que arma las URL `armar_url` que recibe un arreglo asociativo con los nombres de los parámetros y sus valores.

# Menú y despachador #
Armamos el menú recorriendo la estructura de metadatos y usando la función armar\_url para crear los links.

Las funciones del programa ahora son paramétricas, por ejemplo la función que arma la pantalla de ingreso de datos y el procedimiento que recibe los datos para almacenarlos en la base de datos tienen que poder usarse para cualquier entidad. El despachador se encargará entonces de tomar los parámetros de la URL y de pasárselos a la función despachada.

# ¿Cómo seguimos? #

Adaptando los listados