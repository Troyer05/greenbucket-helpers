<?php
class VARS {
    /** 
     * Aktueller Dateiname
    */
    public static function this_file() {
        return basename($_SERVER['SCRIPT_FILENAME']);
    }
    
    /**
     * Aktueller Path
     */
    public static function this_path() {
        return ltrim($_SERVER['SCRIPT_NAME'], '/');
    }

    /**
     * Aktuelle URL
     */
    public static function this_uri() {
        $scheme = $_SERVER['REQUEST_SCHEME'] . '://';
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
        
        return $scheme . $host . $uri;
    }

    /**
     * IP des Benutzers herausfinden
     */
    public static function client_ip() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = str_replace(":", "-", $ip);

        return $ip;
    }
}
?>
