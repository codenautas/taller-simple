# Sexta Reunión #

| Fecha | Presentes |
|:------|:----------|
| 16/9 | Elba, Estefanía, Graciela, Raquel, Mauro, Emilio |

## Modelo de negocio ##

En esta reunión nos dedicamos a definir el formato del modelo de negocios. Decidimos que los metadatos de la aplicación, por ahora, van a seguir estando dentro del código con las siguientes características:
  * Todo va a ponerse en una estructura con arreglos anidados de modo que se pueda construir si fuera necesario, un JSON con todo
  * Las claves de los arreglos asociativos van a respetar un esquema de pares/impares. Las claves de los niveles impares son atributos conocidos por nuestro programa (ej: tipo de datos de un campo, nombre de un listado) y las claves de los niveles impares son los identificadores de objetos conocidos para el modelo de negocios y desconocidos para el programa (ej: los nombres de los campos, los nombres de las entidades, los id de los listados).
  * El programa nunca va a hacer referencia directa a las claves pares (o sea nunca va a haber dentro del programa una constante de texto llamada 'per\_apellido').
  * El modelo va a registrar las entidades (candidatos a tablas). Para cada entidad anotamos:
    * los campos
    * los listados

Entendemos que los metadatos que definen el modelo de negocios podría representarse o almacenarse en una base de datos relacional. Decidimos no usar este camino por ahora para que los fuentes (y el versionado de código) incluya los metadatos. Las ventajas que tendría almacenarlos en la base de datos relacional son:
  * Mecanismo estándar para manejar los valores por defecto
  * Mecanismo claro para manejar las relaciones de muchos a muchos.

Usando los arreglos anidados con el esquema de par impar entendemos que:
  * para manejar los valores por defecto vamos a correr un procedimiento que complete los campos no especificados con los valores por defecto
  * para las relaciones muchos a muchos vamos a elegir consignarlo en uno de los lados de la relación. Por ejemplo para para los listados y entidades, cada campo de una entidad puede o no estar en un listado, podríamos tener en la definición de listados el nombre de los campos incluidos o en la definición de los campos el id de los listados donde se pueden ver (elegimos esta última opción).
  * las claves impares deben representar tablas cuando lo que almacenan es un arreglo o representan nombres de campos cuando almacenan valores individuales
  * las claves pares son las Pk de las tablas donde están almacenados
  * el anidamiento debe representarse como tablas relacionadas con la Fk incluida en la Pk

## Plan ##

Decidimos tener un plan general para guiarnos en las próximas reuniones. El plan es:

  * Agregar la posibilidad de cargar y ver los **Proyectos** en los cuales puede participar el personal
  * Definir las PK (o las identidades de las entidades)
  * Permisos (logueo), tablas, listados, campos, filas, opciones de menú y en general todo tiene que tener permisos.
  * Manejo de los tipos de columnas (o tipos de datos), para en principio poder validar o crear los campos al instalar.
  * Menú

  * Definir FK
  * Definir la estética de los campos