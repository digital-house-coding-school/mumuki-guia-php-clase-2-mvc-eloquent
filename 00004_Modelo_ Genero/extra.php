$pasePorView = false;

function view($route, $vac = []) {
  global $pasePorView;
  
  $pasePorView = true;
  
  if ($route == "detallePelicula") {
    if (count($vac) !== 1) {
      throw new Exception('Muy malo');
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

class Model {
  public $primaryKey = "id";
  public $table = "";
  public $timestamps = true;
  public $guarded = null;
  
  public function getPrimaryKey() {
    return $this->primaryKey;
  }
  
  public function getTable() {
    return $this->table;
  }
  
  public funtion getTimestamps() {
    return $this->timestamps;
  }
  
  public function getGuarded() {
    return $this->guarded;
  }
}