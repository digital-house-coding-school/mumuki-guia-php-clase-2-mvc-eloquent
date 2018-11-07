public function testPeliculaListado(): void {
  global $pasePorView;
  
  $pasePorView = false;

  $pc = new PeliculasController();
  
  $this->assertTrue(method_exists($pc, 'listado'), "Falta el método listado dentro de PeliculasController");
  
  $resul = $pc->listado();
  
  $this->assertTrue($pasePorView, "Parecería que no utilizaste la función view");
  
  $this->assertTrue($resul === "listadoPeliculas", "El método listado debería redirigir a la vista listadoPeliculas. ¿Olvidaste el return?");
}