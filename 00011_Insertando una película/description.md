**Aclaración: En este ejercicio no es necesario que agregues la línea `use App\Pelicula;` Podes asumir que ya esta incluido el archivo**

¡Es hora de insertar una película!

Para esto, deberías crear una función llamada `almacenar` que recibirá el siguiente formulario por POST para agregar una película:

``` html
<form action="/peliculas/almacenar" method="POST">
  {{csrf_field}}
  <input type="text" name="title">
  <input type="text" name="rating">
  <input type="text" name="awards">
</form>
```

Esta función almacenar deberá:

> 1. Recibir un parámetro de tipo `Request`

> 2. Crear un nuevo objeto de tipo `Pelicula`

> 3. Asignarle los atributos al objeto `Pelicula` basandote en los datos provenientes del `Request`. Por suerte, la base de datos tiene los mismos nombres de columnas que los campos `<input>` en el formulario

> 4. Llamar al método `save`

> 5. Redirigir al usuario a la URL **/peliculas/listado** a través de la función `redirect`
