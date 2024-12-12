<?php
class Api {
    /**
     * Ruft Daten von einer API ab (API fetch)
     * @param string $url Die URL der API
     * @param array $headers (Optional): Ein assoziatives Array von Headerinformationen
     * @param mixed $body (Optional): Die Daten, die im Request-Body gesendet werden sollen
     * @return mixed Die Daten von der API als Array oder Objekt, oder false im Fehlerfall
     */
    public static function fetch($url, $headers = [], $body = null): mixed {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        if (!is_null($body)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }

        $response = curl_exec($ch);
        $error = curl_error($ch);
        
        curl_close($ch);

        if ($error) {
            echo("API Fetch Error: $error");
            return false;
        } else {
            return json_decode($response, true);
        }
    }
}
?>
