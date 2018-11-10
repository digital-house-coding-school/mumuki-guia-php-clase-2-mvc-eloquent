public function testUpdate(): void {
  global $pasePorRedirect;
  global $request;
  global $pasePorSave;
  
  $request = new Request();
  
  $this->assertTrue(method_exists("PeliculasController",'actualizar'),"Falta el método actualizar dentro de PeliculasController");
  
  $r = new ReflectionMethod("PeliculasController", "actualizar");
  $params = $r->getParameters();
  
  $this->assertTrue(count($params) === 2, "El método actualizar debe recibir dos parámetros");
  
  $this->assertTrue($params[0]->getType() !== null && $params[0]->getType()->getName() === "Request", "El primer parámetro recibido por actualizar debe ser tipo Request");
  
  $pasePorRedirect = false;
  
  $pc = new PeliculasController();
  
  $request->title = "El rey león";
  $request->rating = 9.2;
  $request->awards = 5;
  $request->secret = 1;
  
  try {
    $resul = $pc->actualizar($request, 1);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $request->title = "Wall-e";
  $request->rating = 8.1;
  $request->awards = 4;
  $request->secret = 2;
  
  try {
    $resul = $pc->actualizar($request, $secret);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $this->assertTrue($pasePorSave, "Mmm...parecería que no estas almacenando nada");
  
  $this->assertTrue($pasePorRedirect, "Parecería que no estas llamando a la función redirect");
  
  $this->assertTrue(is_string($resul), "¿Estas retornando el resultado de la funcion redirect?");
}