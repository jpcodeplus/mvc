<?php

namespace app\core; // Definiert den Namensraum

/**
 * Hauptklasse der Anwendung
 * 
 * Verantwortlich für die Initialisierung der Anwendungslogik
 * @author Jan Behrens
 * @package app\core
 */
class Application
{
    public Router $router; // Router-Instanz für URL-Routing
    public Request $request; // Request-Instanz für HTTP-Anfragen

    /**
     * Konstruktor - Initialisiert die Anwendung
     */
    public function __construct()
    {
        $this->request = new Request(); // Erstellt eine neue Request-Instanz
        $this->router = new Router($this->request); // Erstellt eine neue Router-Instanz mit der Request-Instanz
    }

    /**
     * Startet die Anwendung
     */
    public function run()
    {
        echo $this->router->resolve(); // Löst die aktuelle Route/URL auf
    }
}
