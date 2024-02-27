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

    /**
     * Löst die Anfrage basierend auf dem Pfad und der Methode auf
     * 
     * Findet den entsprechenden Callback für die Anfrage und führt ihn aus
     */
    public function resolve()
    {
        $path = $this->request->getPath(); // Holt den aktuellen Pfad aus der Anfrage
        $method = $this->request->getMethod(); // Holt die HTTP-Methode (z.B. GET)
        $callback = $this->routes[$method][$path] ?? false; // Sucht den Callback für die Route

        if (!$callback) {
            $this->response->getStatusCode(404);
            return 'NOT FOUND';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback); // Führt den Callback aus und gibt das Ergebnis aus
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view){
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean(); 
    }
}
