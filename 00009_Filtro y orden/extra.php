$pasePorView = false;

$id = null;

function view($route, $vac = []) {
  global $pasePorView;
  global $id;
  
  $pasePorView = true;
  
  if ($route == "buenasPeliculas") {
    if (count($vac) !== 1) {
      throw new Exception('Deberías compartir una variable (y solo una) con la vista');
    }
    
    $consulta = array_shift($vac);
    
    if ($consulta instanceof Consulta == false) {
      
      throw new Exception("¿Estas utilizando una consulta de Eloquent?");
    }
    
    if ($consulta->table != "movies") {
      throw new Exception("¿Estas haciendo una consulta sobre la tabla de películas?");
    }
    
    $wheres = $consulta->where;
    
    if (count($wheres) != 1) {
      throw new Exception("Deberías utilizar el metodo where (y una sola vez)");
    }
    
    if($wheres[0][0] != "rating") {
      throw new Exception("Deberías hacer un filtro sobre la columna rating");
    }
    
    if($wheres[0][1] != ">") {
      throw new Exception("Deberías hacer un filtro comparando con el operador de mayor");
    }
    
    if($wheres[0][2] != "8") {
      throw new Exception("Deberías hacer un filtro comparando con ratings mayor al número 8");
    }
    
    $orders = $consulta->order;
    
    if (count($oders) != 1) {
      throw new Exception("Deberías utilizar el metodo orderBy (y una sola vez)");
    }
    
    if($wheres[0][0] != "title") {
      throw new Exception("Deberías ordenar por la columna title");
    }
    
    if($wheres[0][1] != "asc" && $wheres[0][1] != "ASC") {
      throw new Exception("Deberías ordenar ascendientemente");
    }
    
    if (!$consulta->get) {
      throw new Exception("No olvides finalizar llamando al método get!!");
    }
    
  } else {
    throw new Exception("El archivo de vista debe llamarse buenasPeliculas");
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
  public function getPrimaryKey() {
    if (isset($this->primaryKey)) {
      return $this->primaryKey;
    }
    return 'id';
  }
  
  public function getTable() {
    if (isset($this->table)) {
      return $this->table;
    }
    return null;
  }
  
  public function getTimestamps() {
    if (isset($this->timestamps)) {
      return $this->timestamps;
    }
    return true;
  }
  
  public function getGuarded() {
    if (isset($this->guarded)) {
      return $this->guarded;
    }
    return null;
  }
}

class Pelicula extends Model {
  public $rating;
  public $title;

  public static function all() {
    $peli1 = new Pelicula();
    $peli1->id = 1;
    $peli1->title = "Toy Story";
    $peli1->rating = 9.5;
    
    $peli2 = new Pelicula();
    $peli2->id = 2;
    $peli2->title = "Buscando a Nemo";
    $peli2->rating = 8.2;
    
    $peli3 = new Pelicula();
    $peli3->id = 3;
    $peli3->title = "Cars";
    $peli3->rating = 7.0;
    
    return [$peli1, $peli2, $peli3];
  }
  
  public static function find($id) {
    $peliculas = Pelicula::all();
    return $peliculas[$id - 1];
  }
  
  public static function where($col, $operador, $value = null) {
    $consulta = new Consulta("movies");
    $consulta->where($col, $operador, $value);
    
    return $consulta;
  }
  
  public static function orderBy($col, $order = "ASC") {
    $consulta = new Consulta("movies");
    $consulta->orderBy($col, $order);
    
    return $consulta;
  }
}

class Consulta {
  public $where = [];
  public $order = [];
  public $table;
  public $get = false;
  
  public function __construct($table) {
    $this->table = $table;
  }
  
  public function where($col, $operador, $value = null) {
    if ($value === null) {
      $value = $operador;
      $operador = "=";
    }
    
    $where = [$col, $operador, $value];
    $this->where[] = $where;
    return $this;
  }

  public function orderBy($col, $order = "ASC") {
    $this->order[] = [$col, $order];
    return $this;
  }
  
  public function get() {
    $this->get = true;
    return $this;
  }
}