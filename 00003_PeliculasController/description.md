En este caso vamos a completar **PeliculasController**. Si recordamos nuestro ejercicio de rutas, en este caso tendríamos que completar dos métodos:

> 1. Teníamos una ruta a **/peliculas** que redirigía al método **listado**. Es tu trabajo crear este método que redirija a la vista que se encuentra en el archivo **listadoPeliculas.blade.php** 

> 2. Teniamos una ruta a **/peliculas/{id}** que redirigía al método **detalle**. Es tu trabajo crear este método que **reciba un parámetro** y redirija a la vista que se encuentra en el archivo **detallePelicula.blade.php**. En este caso es necesario que **compartas el id con la vista**