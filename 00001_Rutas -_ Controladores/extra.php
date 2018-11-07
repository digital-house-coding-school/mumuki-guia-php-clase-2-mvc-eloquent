$pasePorView = false;

function view($route, $vac = []) {
  global $pasePorView;
  
  $pasePorView = true;
  
  if (!is_array($vac)) {
    echo "El segundo parámetro enviado a la función view debe ser un array";exit;
  }
  
  if (count($vac) != 2) {
    echo "Solamente deberías compartir dos variables con la vista";exit;
  }
  
  $estaArya = false;
  $estaStark = false;
  foreach ($vac as $v) {
    if ($v === "Arya") {
      $estaArya = true;
    }
    if ($v === "Stark") {
      $estaStark = true;
    }
  }
  
  if (!$estaArya || !$estaStark) {
    echo "No estas compartiendo el nombre y el apellido con la vista";exit;
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