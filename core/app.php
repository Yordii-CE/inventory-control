<?php
require_once 'app/controllers/error.controller.php';

/* pattern: "{controller=login}/{action=index}/{id?}") */
class App
{
    function __construct()
    {
        session_start();
        $url = isset($_GET["url"]) ? $_GET["url"] : constant('DEFAULT_PAGE');
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $controllerName = $url[0];
        $pathController = 'app/controllers/' . $controllerName . '.controller.php';

        if (file_exists($pathController)) {
            require_once $pathController;
            $controllerName = $controllerName . "Controller";
            $controller = new $controllerName();

            // Check to set default method
            $methodName = isset($url[1]) ? $url[1] : 'index';

            // Validate method
            if (!method_exists($controller, $methodName)) {
                $controller = new ErrorController();
                $controller->index("Action not found");
                return;
            }

            // Validate params
            $params = [];
            if (isset($url[2])) {
                for ($i = 2; $i < sizeof($url); $i++) {
                    $param = $url[$i];
                    array_push($params, $param);
                }
            }
            call_user_func_array(array($controller, $methodName), $params);
        } else {
            $controller = new ErrorController();
            $controller->index("Page not found");
        }
    }
}
