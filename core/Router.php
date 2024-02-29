<?php

namespace app\core; // Definiert den Namensraum

/**
 * Router-Klasse zur Verwaltung von Routen
 * 
 * Verantwortlich für die Zuordnung von URLs zu Callback-Funktionen
 * @author Jan Behrens
 * @package app\core
 */

class Router
{
    public Request $request; // Request-Instanz für Zugriff auf Anfragedaten
    public Response $response; // Request-Instanz für Zugriff auf Anfragedaten
    protected array $routes = []; // Speichert alle Routen

    /**
     * Konstruktor - Initialisiert den Router mit einer Request-Instanz
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Registriert eine neue GET-Route
     * 
     * @param string $path URL-Pfad der Route
     * @param callable $callback Callback-Funktion, die ausgeführt wird, wenn die Route aufgerufen wird
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback; // Fügt die Callback-Funktion zur Route hinzu
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback; // Fügt die Callback-Funktion zur Route hinzu
    }
    /**
     * Löst die Anfrage basierend auf dem Pfad und der Methode auf
     * 
     * Findet den entsprechenden Callback für die Anfrage und führt ihn aus
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? null;

        if ($callback === null) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            # $callback[0] = new $callback[0]();
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller ;
        }

        return call_user_func($callback, $this->request);
    }



    public function renderView($view, array $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent($layout = 'main');
        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout ?? 'main';
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        ### TODO: Router 001
        // Erzeugt die Parameter für die View 
        // im wenn der übergebene parameter $pramams[name] ist kann der in der view mit $name aufgerufen werden dafür sorgt $$key
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
