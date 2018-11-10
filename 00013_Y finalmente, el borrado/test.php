public function testInsert(): void {
  global $pasePorRedirect;
  global $request;
  global $pasePorDelete;
  global $id;
  
  $request = new Request();
  
  $this->assertTrue(method_exists("PeliculasController",'eliminar'),"Falta el método eliminar dentro de PeliculasController");
  
  $r = new ReflectionMethod("PeliculasController", "eliminar");
  $params = $r->getParameters();
  
  $this->assertTrue(count($params) === 1, "El método eliminar debe recibir un parámetro");
  
  $this->assertTrue($params[0]->getType() !== null && $params[0]->getType()->getName() === "Request", "El parámetro recibido por eliminar debe ser de tipo Request");
  
  $pasePorRedirect = false;
  
  $pc = new PeliculasController();
  
  $request->id = 2;
  $id = 2;
  
  try {
    $resul = $pc->eliminar($request);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $request->id = 29;
  $id = 29;
  
  try {
    $resul = $pc->eliminar($request);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $this->assertTrue($pasePorDelete, "Mmm...parecería que no estas eliminando nada");
  
  $this->assertTrue($pasePorRedirect, "Parecería que no estas llamando a la función redirect");
  
  $this->assertTrue(is_string($resul), "¿Estas retornando el resultado de la funcion redirect?");
  
  
}