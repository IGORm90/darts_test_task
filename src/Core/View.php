<?php

namespace Core;

class View {

    public $path;
    public $route;
    public $layout = 'default'; 

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = []) {
        extract($vars);
		$path = __DIR__ . '/../views/'.$this->path.'.php';

		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			require __DIR__ . '/../views/layouts/'.$this->layout.'.php';
		} else {
            View::errorCode(404);
        }
	}

    public static function errorCode($code){
        http_response_code($code);
        $path = __DIR__ . '/../views/errors/'.$code.'.php';
        if(file_exists($path)){
            require $path;
        }
        exit;
    }

    public static function redirect($url){
        header('location: '.$url);
        exit;
    }

    public function message($status, $message){
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url){
        exit(json_encode(['url' =>$url]));
    }
}