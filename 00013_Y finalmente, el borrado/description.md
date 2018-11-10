**Aclaración: En este ejercicio no es necesario que agregues la línea `use App\Pelicula;` Podes asumir que ya esta incluido el archivo**

Y llegamos al final de la clase, en donde vamos a finalmente borrar una película.

Para esto, deberías crear una función llamada `eliminar` que recibirá el siguiente formulario por DELETE para saber el **id** de que película hay que borrar:

``` html
<form action="/peliculas/eliminar" method="POST">
  
  {{csrf_field}}
  <input type="hidden" name="id" value="{{$pelicula->id}}"
  <input type="hidden" name="_method" value="DELETE">
</form>
```

Esta función `eliminar` deberá:

> 1. Recibir un parámetro de tipo Request

> 2. Obtener un objeto de tipo `Pelicula` mediante el método `find` y el id recibido en el objeto `Request`

> 3. Llamar al método `delete`

> 4. Redirigir al usuario a la URL **/peliculas/listado** a través de la función `redirect`
