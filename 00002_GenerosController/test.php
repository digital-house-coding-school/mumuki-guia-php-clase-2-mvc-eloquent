public function testGenerosController(): void {
  global $pasePorView;
  
  $pasePorView = false;

  $gc = new GenerosController();
  
  $this->assertTrue(method_exists($gc, 'listado', "Falta el método listado dentro de GenerosController");
  
  $resul = $gc->listado();
  
  $this->assertTrue($pasePorView, "Parecería que no utilizaste la función view");
  
  $this->assertTrue($resul === "listadoGeneros", "El método debería redirigir a la vista listadoGeneros");
}