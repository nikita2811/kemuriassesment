<?php
Class Mylib{

protected $controller = 'User';
protected $method = 'index';
protected $param = [];



public function __construct(){
	
	$url = $this->geturl();

	if ($url[0] == 'api') {
		if (file_exists('../app/controllers/api/' . ucwords($url[1]) . '.php')) {
			$this->controller = ucwords($url[1]);
			unset($url[1]);
		}
		require_once '../app/controllers/api/' . $this->controller . '.php';
		$this->controller = new $this->controller;
		if (isset($url[2])) {
			if (method_exists($this->controller, $url[2])) {
				$this->method = $url[2];
				unset($url[2]);
			}
		}
	

      $this->params = $url ? array_values($url) : [];
     call_user_func_array([$this->controller,$this->method], $this->params);
      } else {
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
          $this->controller = ucwords($url[0]);
          unset($url[0]);}
          require_once '../app/controllers/' . $this->controller . '.php';
           $this->controller = new $this->controller;

           if (isset($url[1])) {
	    if (method_exists($this->controller, $url[1])) {
		$this->method = $url[1];unset($url[1]);
	    }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller,$this->method], $this->params);
    }

}

public function geturl(){
    if (isset($_GET['url'])) {
    	$url = rtrim($_GET['url'], '/');
    	$url = filter_var($url, FILTER_SANITIZE_URL);
    	$url = explode('/', $url);
    	return $url;
    }
}








}