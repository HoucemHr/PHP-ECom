

<?php 

    class Router{
        private $routes;

        public function addRoute($uri, $controllerAction){
            $this->routes[$uri] = $controllerAction;
        }

        private function getAction($uri){
            return isset($this->routes[$uri]) ? $this->routes[$uri] : false;
        }

        public function dispatch($uri){
            if(!$this->getAction($uri)){
                echo "404 Not Found";
                return;
            }
            //reoute[uri] has form controller@controlleraction
            list($controllerName, $actionName) = explode('@', $this->getAction($uri));

            //here we require the adequate controller and action based on provided uri
            //remebr that router dispatch gets called in index
            require_once "App/Controllers/" . $controllerName . ".php";
            
            $controller = new $controllerName();
            // add $ to action name bcz we want the $actionanme variable and not an actual method called 
            //actionname()
            $controller->$actionName();
        }


    }