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
    public static string $ROOT_DIR;
    public Router $router; // Router-Instanz für URL-Routing
    public Request $request; // Request-Instanz für HTTP-Anfragen
    public static Application $app;
    public Response $response;
    public Controller $controller;

    /**
     * Konstruktor - Initialisiert die Anwendung
     */
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request(); // Erstellt eine neue Request-Instanz
        $this->response = new Response(); // Erstellt eine neue Response-Instanz
        $this->router = new Router($this->request, $this->response); // Erstellt eine neue Router-Instanz mit der Request-Instanz
    }

    /**
     * Startet die Anwendung
     */
    public function run()
    {
        echo $this->router->resolve(); // Löst die aktuelle Route/URL auf
    }


    public function getController(): \app\core\Controller
    {
        return $this->controller;
    }

    public function setController(\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }
}
