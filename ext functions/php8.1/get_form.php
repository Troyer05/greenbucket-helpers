<?php
class GetForm {
    /**
     * @var Array ErlaubteDateiendungen Dateiendungen welche zum Upload erlaubt werden (Whitelist Prinzip)
     * @var Boolean DateisystemNamensschutz (standard: true) Sollen untypische Zeichen bei Dateien zum Upload aus den Dateinamen herausgefiltert werden, um das Dateisystem zu schützen?
     */
    private const ErlaubteDateiendungen = ['jpg', 'jpeg', 'png', 'gif', 'txt', 'docx', 'doc', 'xls', 'ppt', 'ppts', 'webp'];
    private const DateisystemNamensschutz = true;

    /**
     * Liest ein Dropdown aus und gibt die explizite Auswahl wieder
     * @param mixed $dropdown die POST Variable des Dropdowns (@example $_POST["drop1"])
     * @return mixed Explizite Userauswahl
     */
    public static function getDropdown(mixed $dropdown): mixed {
        $e = "";

        foreach ($dropdown as $val) {
            $e = $val;
        }

        return $e;
    }

    /**
     * Funktion zum Hochladen von Dateien (Max. 2 MB Zugelassen)
     * @param mixed $file Datei(en) der POST Methode zum Hochladen
     * @param string $path (OPTIONAL) Path Wohin die Datei(en) hochgeladen werden sollen
     * @param string $useName (OPTIONAL) Wenn die Datei einen speziellen Namen haben soll
     * @return bool true wenn es keine Probleme gab
     */
    public static function upload(mixed $file, string $path = "./", string $useName = ""): bool {
        if (!isset($file['tmp_name']) || empty($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }
        
        if ($file['size'] > (250 * 1024)) {
            return false;
        }
    
        if (self::DateisystemNamensschutz) {
            $fileName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', basename($file['name']));
            $fileName = str_replace('..', '', $fileName); 
        } else {
            $fileName = basename($file['name']);
        }
    
        // Erlaubte Dateiendungen
        $allowedExtensions = self::ErlaubteDateiendungen;
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        if (!in_array($fileExtension, $allowedExtensions)) {
            return false;
        }
    
        if ($useName == "") {
            $fileName = uniqid() . '_' . $fileName;
        } else {
            $fileName = rtrim($useName, '.') . '.' . $fileExtension;
        }
    
        if (!is_dir($path) || !is_writable($path)) {
            return false;
        }
    
        if (move_uploaded_file($file['tmp_name'], $path . '/' . $fileName)) {
            return true;
        } else {
            return false;
        }
    }    

    /**
     * Überprüft Inputs welche verpflichtend sind (anhand "_rf" im name-Tag) ob sie ausgefüllt wurden
     * @param mixed $post_data der ganze $_POST Inhalt
     * @return mixed (0 wenn alle Inputs ausgefüllt wurden, Array der Input name-Tags die leer sind)
     */
    public static function check_required_fields(mixed $post_data): mixed {
        $empty_fields = [];
    
        foreach ($post_data as $field_name => $value) {
            if (substr($field_name, -3) === '_rf') {
                if (empty($value) || $value == " " || $value == "  ") {
                    $empty_fields[] = $field_name;
                }
            }
        }
    
        if (empty($empty_fields)) {
            return 0;
        }
    
        return $empty_fields;
    }
    
    /**
     * Erstellt ein Input Feld für check_required_fields(...)
     * @param string $name Name-Tag des Input Feldes (fügen Sie ein "_rf" hinzu um es als verpflichtend zu markieren)
     * @param string $type Type-Tag des Input Feldes
     * @param mixed $form_data Leeres Array bei Initialem Aufrufen des Formulars, kann mit "name" => "value" befüllt werden
     * @param string $placeholder Plazhalter (OPTIONAL)
     * @param string $class class-Tag (OPTIONAL)
     * @param string $id id-Tag (OPTIONAL)
     * @return string HTML String für das Inputfeld
     */
    public static function createInput(string $name, string $type, mixed $form_data, string $placeholder = "", string $class = "", string $id = ""): string {
        $value = htmlspecialchars($form_data[$name] ?? '');
        $element = '<input type="' . $type . '" name="' . $name . '" placeholder="' . $placeholder . '" value="' . $value . '"';
        
        if (!empty($class)) {
            $element .= ' class="'. $class. '"';
        }

        if (!empty($id)) {
            $element .= ' id="' . $id . '"';
        }
        
        $element .= ' />';
        
        return $element;
    }

    /**
     * Überprüft ob eine POST Methode angekommen ist
     * @return true wenn eine POST Methode angekommen ist
     */
    public static function checkPost(): bool {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }

        return false;
    }
}
?>
