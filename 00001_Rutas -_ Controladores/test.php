public function testRutas(): void {
  $rutasGet = Route::$routesGet;
  
  $this->assertTrue(count($rutasGet) == 3, "Debería haber una ruta en tu solución por GET");
}

public function testGeneros(): void {
  $rutasGet = Route::$routesGet;
  
  $ruta == null;
  
  foreach ($rutasGet as $rutas) {
    if ($rutas["route"] == "generos" or $rutas == "/generos") {
      $ruta = $rutas;
    }
  }

  $this->assertTrue($ruta !== NULL, "Falta la ruta a /generos");
  
  $this->assertTrue(is_string($ruta["action"]), "El segundo parámetro de la ruta debe ser un string");
  
  $this->assertTrue($ruta["action"] === "GenerosController@listado", "La ruta /generos debe dirigirse a GenerosController en el método listado");
}