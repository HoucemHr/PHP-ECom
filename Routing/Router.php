<?php 
    class Router{
        private $routes;

        
        public function addRoute($uri, $controllerAndAction){
            $this->routes[$uri] = $controllerAndAction;
        }

        private function getAction($uri){
            return isset($this->routes[$uri]) ? $this->routes[$uri] : false;
        }

        public function dispatch($uri, $data = null){
            if($this->getAction($uri) == false){
                echo "404 Not Found";
                return;
            }
            //reoute[uri] has form controller@controlleraction
            list($controllerName, $actionName) = explode('@', $this->getAction($uri));

            //here we require the adequate controller and action based on provided uri
            //remebr that router dispatch gets called in index
            require_once "c:/xampp/htdocs/Myproject/App/Controllers/" . $controllerName . ".php";
            if ($controllerName == "ControllerLogin" and $actionName == "Login"){
                $controller = new $controllerName();
                //data(parameter) available at index level
                return $controller->$actionName($data);
            }
            else{
                $controller = new $controllerName();
            // add $ to action name bcz we want the $actionanme variable and not an actual method called 
            //actionname()
                $controller->$actionName();
            }
            
        }
    }