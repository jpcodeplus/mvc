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
    protected array $routes = []; // Speichert alle Routen

    /**
     * Konstruktor - Initialisiert den Router mit einer Request-Instanz
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
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
            exit('ROUTE NOT FOUND'); // Beendet das Script, wenn keine Route gefunden wurde
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback); // Führt den Callback aus und gibt das Ergebnis aus
    }

    public function renderView($view)
    {
        include_once __DIR__ . "/../views/$view.php";
    }
}
