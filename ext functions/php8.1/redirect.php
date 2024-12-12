<?php
class Ref {
    /**
     * Leitet auf eine andere Datei/Seite weiter
     * @param string $url die URL der Seite oder den Path der Datei
     */
    public static function to(string $url): void {
        echo '<meta http-equiv="refresh" content="0; URL=' . $url . '">';
        exit;
    }

    /**
     * Ladet aktuelle Seite neu (ohne Parameter)
     */
    public static function this_file(): void {
        echo '<meta http-equiv="refresh" content="0; URL=' . basename($_SERVER['SCRIPT_FILENAME']) . '">';
        exit;
    }
}
?>
