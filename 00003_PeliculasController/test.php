public function testPeliculaListado(): void {
  global $pasePorView;
  
  $pasePorView = false;

  $pc = new PeliculasController();
  
  $this->assertTrue(method_exists($pc, 'listado'), "Falta el método listado dentro de PeliculasController");
  
  $resul = $pc->listado();
  
  $this->assertTrue($pasePorView, "Parecería que no utilizaste la función view");
  
  $this->assertTrue($resul === "listadoPeliculas", "El método listado debería redirigir a la vista listadoPeliculas. ¿Olvidaste el return?");
}

public function testPeliculasDetalle(): void {
  global $pasePorView;
  
  $pasePorView = false;

  $pc = new PeliculasController();
  
  $this->assertTrue(method_exists($pc, 'detalle'), "Falta el método detalle dentro de PeliculasController");
  
  $r = new ReflectionMethod("PeliculasController", "detalle");
  $params = $r->getParameters();
  
  $this->assertTrue(count($params) === 1, "El método detalle debe recibir un parámetro");
  
  try {
    $resul = $pc->detalle(3);
  } catch (Exception $e) {
    $this->assertTrue(false, "El método detalle debería compartir con la vista una (y solo una) variable");
  }
  
  $this->assertTrue($pasePorView, "Parecería que no utilizaste la función view");
  
  $this->assertTrue($resul === "detallePelicula3", "El método detalle debería redirigir a la vista detallePelicula y tiene que tener compartido el id que llega como parámetro. No olvides además de que deberías haber utilizado el return");
}