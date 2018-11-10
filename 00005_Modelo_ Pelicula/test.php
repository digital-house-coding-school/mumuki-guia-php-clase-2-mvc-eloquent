public function testPelicula(): void {
  $pelicula = new Pelicula();
  
  $this->assertTrue($pelicula->getTable() === "movies", "La tabla de la tabla de peliculas debe llamarse 'movies'");
  
  $this->assertTrue($pelicula->getPrimaryKey() === "id", "La primary key de la tabla de peliculas debe llamarse 'id'"); 
  
  $this->assertTrue($pelicula->getTimestamps() === true, "Es necesario aclarar que la tabla de peliculas si tiene los timestamps");
  
  $this->assertTrue(is_array($pelicula->getGuarded()), "El atributo guarded debe ser un array");
  
  $this->assertTrue($pelicula->getGuarded() === [], "El atributo guarded debe ser un array vacío para que todas las columnas de la tabla sean escribibles");
  
  $this->assertTrue(method_exists("Pelicula", "esRecomendada"), "Falta el método esRecomendada en la clase Pelicula");
  
  $pelicula->rating = 9;
  
  $this->assertTrue($pelicula->esRecomendada() === true, "Una película con rating 9 debería retornar true al preguntar si es es recomendada");
  
  $pelicula->rating = 7.9;
  
  $this->assertTrue($pelicula->esRecomendada() === false, "Una película con rating 7.9 debería retornar false al preguntar si es es recomendada");
}