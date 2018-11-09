public function testPelicula(): void {
  $pelicula = new Pelicula();
  
  $this->assertTrue($pelicula->getTable() === "movies", "La tabla de la tabla de peliculas debe llamarse 'movies'");
  
  $this->assertTrue($pelicula->getPrimaryKey() === "id", "La primary key de la tabla de peliculas debe llamarse 'id'"); 
  
  $this->assertTrue($pelicula->getTimestamps() === true, "Es necesario aclarar que la tabla de generos si tiene los timestamps");
  
  $this->assertTrue(is_array($pelicula->getGuarded()), "El atributo guarded debe ser un array");
  
  $this->assertTrue($pelicula->getGuarded() === [], "El atributo guarded debe ser un array vacío para que todas las columnas de la tabla sean escribibles");
}