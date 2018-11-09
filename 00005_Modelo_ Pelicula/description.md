Para este ejercicio estamos parados en pelicula.php, el archivo de **modelo** que se condice con la tabla **movies** en la base de datos.

Tu trabajo en este caso es el siguiente:

> 1. Aclarar en el modelo que la tabla de base de datos se llama **movies**

> 2. Aclarar que SI estan definidos los timestamps en la base de datos. (no es necesario escribirlo)

> 3. Definir que todas las columnas pueden ser escritas mediante el atributo `$guarded`

> 4. Aclarar que la primary key se llama **id** (no es necesario escribirlo)

> 5. Agregar un método en la clase **Pelicula** llamado `esRecomendada`. Este método debe analizar si el rating de la película es mayor a 8 a retornar un booleano. Recordá que dentro de la clase podés escribir `$this->rating` ya que Laravel va a generar automáticamente los atributos de la clase basado en las columnas de la base de datos
