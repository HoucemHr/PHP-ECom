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
                die ("404 Action Not Found");
            }
            //reoute[uri] has form controller@controlleraction
            list($controllerName, $actionName) = explode('@', $this->getAction($uri));

            //here we require the adequate controller and action based on provided uri
            //remebr that router dispatch gets called in index
            require_once "c:/xampp/htdocs/Myproject/App/Controllers/" . $controllerName . ".php";
            if ($controllerName == "ControllerLogin" and $actionName == "Login"){
                $controller = new $controllerName();
                return $controller->$actionName($data);

            }elseif($controllerName == "ControllerLogin" and $actionName == "newUser"){
                $controller = new $controllerName();
                $controller->$actionName($data);
            }elseif($controllerName == "ControllerProduct" and $actionName == "show"){
                if(isset($_GET["id"])){
                    $controller = new $controllerName();
                    $controller->$actionName($_GET["id"]);
                }
            }
            else{
                $controller = new $controllerName();
                $controller->$actionName();
            }
            
        }
    }