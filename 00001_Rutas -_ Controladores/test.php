public function testRutas(): void {
  $rutasGet = Route::$routesGet;
  
  $this->assertTrue(count($rutasGet) == 3, "Debería haber tres rutas en tu solución por GET");

  $rutasGet = Route::$routesGet;
  
  $ruta = null;
  
  foreach ($rutasGet as $rutas) {
    if ($rutas["route"] == "generos" || $rutas["route"] == "/generos") {
      $ruta = $rutas;
    }
  }

  $this->assertTrue($ruta !== NULL, "Falta la ruta a /generos");
  
  $this->assertTrue(is_string($ruta["action"]), "El segundo parámetro de la ruta debe ser un string");
  
  $this->assertTrue($ruta["action"] === "GenerosController@listado", "La ruta /generos debe dirigirse a GenerosController en el método listado");

  $rutasGet = Route::$routesGet;
  
  $ruta = null;
  
  foreach ($rutasGet as $rutas) {
    if ($rutas["route"] == "peliculas" || $rutas["route"] == "/peliculas") {
      $ruta = $rutas;
    }
  }

  $this->assertTrue($ruta !== NULL, "Falta la ruta a /peliculas");
  
  $this->assertTrue(is_string($ruta["action"]), "El segundo parámetro de la ruta debe ser un string");
  
  $this->assertTrue($ruta["action"] === "PeliculasController@listado", "La ruta /peliculas debe dirigirse a PeliculasController en el método listado");

  $rutasGet = Route::$routesGet;
  
  $ruta = null;
  
  foreach ($rutasGet as $rutas) {
    $nombreRuta = $rutas["route"];
    
    $primerCaracter = substr($nombreRuta, 0, 1);
  
    if ($primerCaracter == "/") {
      $nombreRuta = substr($nombreRuta, 1);
    }
    
    $partes = explode("/", $nombreRuta);
    
    if (count($partes) == 2 && $partes[0] === "peliculas")
    {
      if (preg_match("/{[a-zA-Z]+}/", $partes[1]) === 1) {
        $ruta = $rutas;
      }
    }
  }
  
  $this->assertTrue($ruta !== NULL, "Falta la ruta a /peliculas/ID");
  
  $this->assertTrue(is_string($ruta["action"]), "El segundo parámetro de la ruta a /peliculas/ID debería ser un string");
  
  $this->assertTrue($ruta["action"] === "PeliculasController@detalle", "La ruta /peliculas/ID debería dirigirse a PeliculasController en el método detalle");
}