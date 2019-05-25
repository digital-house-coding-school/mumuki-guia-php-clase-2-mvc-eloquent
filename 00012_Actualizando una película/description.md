**Aclaración: En este ejercicio no es necesario que agregues la línea `use App\Pelicula;` Podes asumir que ya esta incluido el archivo**

Y ahora...vamos a actualizar una película

Para esto, deberías crear una función llamada `actualizar` que recibirá el siguiente formulario por POST para actualizar una película que **ya estaba en la base de datos**:

``` html
<form action="/peliculas/actualizar" method="POST">
  {{csrf_field}}
  <input type="text" name="title">
  <input type="text" name="rating">
  <input type="text" name="awards">
</form>
```

Esta función almacenar deberá:

> 1. Recibir **dos** parámetros. El primero de tipo `Request`. El segundo será el id de la película a actualizar.

> 2. Obtener un objeto de tipo `Pelicula` mediante el método `find` y el id recibido como parámetro.

> 3. Asignarle los atributos actualizados al objeto `Pelicula` basandote en los datos provenientes del `Request`. Por suerte, la base de datos tiene los mismos nombres de columnas que los campos `<input>` en el formulario

> 4. Llamar al método `save`

> 5. Redirigir al usuario a la URL **/peliculas/listado** a través de la función `redirect`
