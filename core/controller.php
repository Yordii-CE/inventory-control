<?php
require_once 'libs/meta.php';
class Controller
{
    public $model;

    function view()
    {
        $args = func_get_args();

        $viewName = Meta::getCurrentController() . '/' . Meta::getCurrentAction();
        $model = null;
        $useTemplate = true;

        if (count($args) >= 1) {
            if (gettype($args[0]) == 'string') {
                $viewName = Meta::getCurrentController() . '/' . $args[0];
            } elseif (gettype($args[0]) == 'array') {
                $model = $args[0];
            } elseif (gettype($args[0]) == 'boolean') {
                $useTemplate = $args[0];
            }
        }

        if (count($args) >= 2) {
            if (gettype($args[1]) == 'array') {
                $model = $args[1];
            } elseif (gettype($args[1]) == 'boolean') {
                $useTemplate = $args[1];
            }
        }

        if (count($args) >= 3) {
            $model = $args[1];
            $useTemplate = $args[2];
        }
        View::render($viewName, $model, $useTemplate);
    }

    function loadModel()
    {

        $modelName = Meta::getCurrentController();
        $pathModel = 'app/models/' . $modelName . '.model.php';

        if (file_exists($pathModel)) {
            require $pathModel;

            $modelName = $modelName . 'Model';
            $this->model  = new $modelName();
        } else {
            echo "Model not found";
        }
    }

    //Ver si agregamos al framework
    function redirectToAction()
    {
        $args = func_get_args();
        $baseUrl = constant("BASE_URL");

        $controller = Meta::getCurrentController();
        $action = isset($args[0]) ? $args[0] : '';
        $params = '';

        if (count($args) > 1) {
            if (is_string($args[1])) {
                $controller = $args[1];
            } elseif (is_array($args[1])) {
                $params = implode('/', $args[1]);
            }
        }

        if (count($args) > 2) {
            $params = implode('/', $args[2]);
        }

        $redirectUrl = rtrim("$baseUrl/$controller/$action/$params", '/');
        header("Location: $redirectUrl");

        // $args = func_get_args();
        // $baseUrl = constant("BASE_URL");

        // //Auto
        // if (count($args) == 0) {
        //     $controller = Meta::getCurrentController();
        //     header("Location: $baseUrl/$controller");
        // }

        // if (count($args) == 1) {
        //     $controller = Meta::getCurrentController();
        //     if (gettype($args[0]) == 'string') {
        //         $action = $args[0];
        //         header("Location: $baseUrl/$controller/$action");
        //     }
        //     if (gettype($args[0]) == 'array') {
        //         $action = 'index';
        //         $params = "";

        //         for ($i = 0; $i < count($args[0]); $i++) {
        //             $params .= $args[0][$i] . '/';
        //         }

        //         $params = trim($params, '/');
        //         header("Location: $baseUrl/$controller/$action/$params");
        //     }
        // }
        // if (count($args) == 2) {
        //     if (gettype($args[1]) == 'string') {
        //         $controller = $args[1];
        //         $action = $args[0];

        //         header("Location: $baseUrl/$controller/$action");
        //     }
        //     if (gettype($args[1]) == 'array') {
        //         $action = $args[0];
        //         $params = "";

        //         for ($i = 0; $i < count($args[1]); $i++) {
        //             $params .= $args[1][$i] . '/';
        //         }

        //         $params = trim($params, '/');
        //         header("Location: $baseUrl/$controller/$action/$params");
        //     }
        // }

        // if (count($args) == 3) {
        //     $controller = $args[1];
        //     $action = $args[0];
        //     $params = "";

        //     for ($i = 0; $i < count($args[2]); $i++) {
        //         $params .= $args[2][$i] . '/';
        //     }

        //     $params = trim($params, '/');
        //     header("Location: $baseUrl/$controller/$action/$params");
        // }
    }
}
