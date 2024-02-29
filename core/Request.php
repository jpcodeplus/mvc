<?php

namespace app\core; // Definiert den Namensraum

/**
 * Request-Klasse zur Verarbeitung von HTTP-Anfragen
 * 
 * Ermöglicht den Zugriff auf die Pfad- und Methodeninformationen der aktuellen Anfrage
 * @author Jan Behrens
 * @package app\core
 */

class Request
{

    /**
     * Ermittelt den Pfad der aktuellen Anfrage
     * 
     * @return string Der Anfragepfad ohne Query-Parameter
     */

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/'; // Holt den aktuellen URI-Pfad oder setzt Standardpfad
        $position = strpos($path, '?'); // Sucht die Position des ersten Query-Parameters

        if ($position === false) return $path; // Gibt den ganzen Pfad zurück, wenn kein Query-Parameter existiert

        return substr($path, 0, $position); // Gibt den Pfad ohne Query-Parameter zurück
    }

    /**
     * Ermittelt die Methode der aktuellen HTTP-Anfrage
     * 
     * @return string Die Anfragemethode in Kleinbuchstaben (z.B. 'get', 'post')
     */

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']); // Holt die Anfragemethode und konvertiert sie in Kleinbuchstaben
    }

    public function isGet(){
        return $this->method() === 'get';
    }

    public function isPost(){
        return $this->method() === 'post';
    }

    public function getBody()
    {
        $body = [];

        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
