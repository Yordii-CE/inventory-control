<?php

class View
{

    static function render($viewName, $model, $useTemplate)
    {
        $CONTROLLER = explode("/", $viewName)[0];
        $ACTION = explode("/", $viewName)[1];
        $BASE_URL = constant('BASE_URL');

        if (is_array($model)) {
            extract($model);
        }

        if ($useTemplate) {
            require_once 'app/views/shared/header.php';
        }

        require 'app/views/' . $viewName . '.php';

        if ($useTemplate) {
            require_once 'app/views/shared/footer.php';
        }
    }
}
