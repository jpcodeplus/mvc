<?php

namespace app\core;

class Controller
{
    public function render($view, $params = [], $layout = 'main')
    {
        return Application::$app->router->renderView($view, $params, $layout);
    }
}
