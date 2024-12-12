<?php
class Hash {
    /**
     * Hasht ein Passwort Regelkonform
     * @param string $password das zu hashende Passwort
     * @return string das gehashte Passwort
     */
    public static function hashpassword(string $paassword): string {
        return hash('sha256', hash('sha512', $paassword));
    }

    /**
     * Erstellt einen SHA256 hash aus einem String
     * @param string $string der zu hashende String
     * @return string der gehashte String
     */
    public static function sha256(string $string): string {
        return hash('sha256', $string);
    }

    /**
     * Erstellt einen SHA512 hash aus einem String
     * @param string $string der zu hashende String
     * @return string der gehashte String
     */
    public static function sha512(string $string): string {
        return hash('sha512', $string);
    }

    /**
     * Erstellt einen adler32 hash aus einem String
     * @param string $string der zu hashende String
     * @return string der gehashte String
     */
    public static function adler32(string $string): string {
        return hash('adler32', $string);
    }

    /**
     * Erstellt einen md5 hash aus einem String
     * @uses not recommanded
     * @param string $string der zu hashende String
     * @return string der gehashte String
     */
    public static function md5(string $string): string {
        return hash('md5', $string);
    }

    /**
     * Erstellt einen verwurzelten Hash aus einem String
     * @param string $string der zu hashende String
     * @return string der gehashte String
     */
    public static function multiHash(string $string): string {
        $a = hash('sha256', $string);
        $b = hash('adler32', $a);
        $c = hash('md5', $b);
        $d = hash('sha512', $c);
        $e = hash('sha256', $d);

        return hash('sha512', $e);
    }
}
?>
