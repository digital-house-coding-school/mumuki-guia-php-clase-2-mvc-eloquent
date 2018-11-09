public function testDetallePelicula(): void {
  global $pasePorView;
  global $id;
  
  $pasePorView = false;
  
  $pc = new PeliculasController();
  
  $id = 3;
  try {
    $resul = $pc->detalle(3);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $id = 5;
  try {
    $resul = $pc->detalle(5);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $this->assertTrue($pasePorView, "Parecería que no estas llamando a la función view");
  
  $this->assertTrue(is_string($resul), "¿Estas retornando el resultado de la funcion view?");
  
  
}