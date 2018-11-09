public function testDetallePelicula(): void {
  global $pasePorView;
  
  $pasePorView = false;
  
  $pc = new PeliculasController();
  
  try {
    $resul = $pc->buenasPeliculas();
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $this->assertTrue($pasePorView, "Parecería que no estas llamando a la función view");
  
  $this->assertTrue(is_string($resul), "¿Estas retornando el resultado de la funcion view?");
}