<?php
class ReCaptcha {
    /**
     * @var const SECRET_KEY reCAPTCHA secret key
     * @var const WEBSITE_KEY reCAPTCHA website key
     */
    private const SECRET_KEY = "";
    private const WEBSITE_KEY = "";

    /**
     * @return string Name der ReCaptcha $_POST Checkbox
     */
    public static function postName(): string {
        return "g-recaptcha-response";
    }

    /**
     * Erstellt die reCAPTCHA checkbox
     * 
     * @param string $callbaclJs (OPTIONAL) Name einer JavaScript Funktion die ausgeführt werden soll, wenn die Checkbox gecheked wird
     * @return string Die HTML der ReCAPTCHA Checkbox
     */
    public static function checkBox(string $callbackJs = ""): string {
        $wc = self::WEBSITE_KEY;
        return '<div class="g-recaptcha" data-sitekey="' . $wc. '" data-callback="' . $callbackJs . '"></div>';
    }

    /**
     * Verifizierung von reCAPTCHA
     * 
     * @param mixed $post POST Variable von reCAPTCHA Checkbox ($_POST[ReCaptcha::postName()])
     * @return boolean TRUE wenn Verifizierung erfolgreich!
     */
    public static function verify(mixed $post): bool {
        if (!empty($post)) {
            $reCAPTCHA_secret_key = self::SECRET_KEY;
            $reCAPTCHA_uri = "https://www.google.com/recaptcha/api/siteverify";
            $reCAPTCHA_param1 = "?secret=" . $reCAPTCHA_secret_key;
            $reCAPTCHA_param2 = "&response=". $post;
            $reCAPTCHA_param3 = "&remoteip=". $_SERVER['REMOTE_ADDR'];
            $reCAPTCHA_complete_uri = $reCAPTCHA_uri . $reCAPTCHA_param1 . $reCAPTCHA_param2 . $reCAPTCHA_param3;
            $reCAPTCHA_verify = Api::fetch($reCAPTCHA_complete_uri);
            
            return $reCAPTCHA_verify["success"];
        }
        
        return false;
    }
}
?>
