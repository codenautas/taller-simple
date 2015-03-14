# Novena Reunión #

|Fecha|Presentes|
|:----|:--------|
|14/10| Elba, Estefanía, Graciela, Raquel, Mauro, Emilio |

# Desarrollo #

Definimos una forma provisoria de agregar pk a las entidades de modo de poder recuperar o editar la información grabada en la base de datos.

Por ahora vamos a permitir un solo campo pk por tabla (rápidamente vamos a tener que corregir eso): agregamos un atributo a la definición de los campos diciendo "es\_pk" que indica si un campo es pk o no.

Luego pusimos un ícono de editar en los listados de entidades y adaptamos el formulario que despliega los datos para que despliegue datos leídos de la base de datos a partir de la PK.

# Evaluamos #

Empezamos a evaluar qué forma debería tener un interpolador de SQL.

# ¿Cómo seguimos? #

Queda de tarea:
  1. seguir adaptando la función que arma el formulario para que muestre el botón de acción que corresponda y que linkee lo que corresponda
  1. agregar la función que hace el update en la base de datos