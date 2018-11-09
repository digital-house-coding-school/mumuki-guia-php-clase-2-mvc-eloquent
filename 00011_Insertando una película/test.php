public function testDetallePelicula(): void {
  global $pasePorRedirect;
  global $request;
  
  $this->assertTrue(method_exists("PeliculasController",'almacenar'),"Falta el método almacenar dentro de PeliculasController");
  
  $r = new ReflectionMethod("PeliculasController", "almacenar");
  $params = $r->getParameters();
  
  var_dump($params[0]->getType()->getName());exit;
  
  $pasePorRedirect = false;
  
  $pc = new PeliculasController();
  
  $request->title = "El rey león";
  $request->rating = 9.2;
  $request->awards = 5;
  
  try {
    $resul = $pc->detalle($request);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $request->title = "Wall-e";
  $request->rating = 8.1;
  $request->awards = 4;
  
  try {
    $resul = $pc->detalle($request);
  } catch(Exception $e) {
    $this->assertTrue(false, $e->getMessage());
  }
  
  $this->assertTrue($pasePorRedirect, "Parecería que no estas llamando a la función redirect");
  
  $this->assertTrue(is_string($resul), "¿Estas retornando el resultado de la funcion redirect?");
  
  
}