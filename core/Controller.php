<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';
     
    public function render($view, $params = [], $layout = 'main')
    {
        return Application::$app->router->renderView($view, $params, $layout);
    }

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }
}
