public function testGenero(): void {
  $genero = new Genero();
  
  $this->assertTrue($genero->getTable() === "genres", "La tabla de la tabla de generos debe llamarse 'genres'");
  
  $this->assertTrue($genero->getPrimaryKey() === "id", "La primary key de la tabla de generos debe llamarse 'id'"); 
  
  $this->assertTrue($genero->getTimestamps() === false, "Es necesario aclarar que la tabla de generos no tiene los timestamps");
  
  $this->assertTrue(is_array($genero->getGuarded()), "El atributo guarded debe ser un array");
  
  $this->assertTrue($genero->getGuarded() === [], "El atributo guarded debe ser un array vacío para que todas las columnas de la tabla sean escribibles");
}