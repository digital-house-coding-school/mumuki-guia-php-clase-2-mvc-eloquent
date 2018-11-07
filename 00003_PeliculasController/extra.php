$pasePorView = false;

function view($route, $vac = []) {
  global $pasePorView;
  
  $pasePorView = true;
  
  if ($route == "detallePelicula") {
    if (count($vac) !== 1) {
      echo "Solamente deberías compartir una variable con la vista";exit;
    }
    
    return $route . array_shift($vac);
  }
  
  return $route;
}

class Route {
  public static $routesGet = [];
  public static $routesPost = [];

  public static function get($route, $action) {
    $newRoute = [
      "route" => $route,
      "action" => $action
    ];
    
    Route::$routesGet[] = $newRoute;
  }
  
  public static function post($route, $action) {
    $newRoute = [
      "route" => $route,
      "action" => $action
    ];
    
    Route::$routesPost[] = $newRoute;
  }

}

class Controller {

}