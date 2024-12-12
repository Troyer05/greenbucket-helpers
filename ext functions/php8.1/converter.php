<?php
class Converter {
    /**
     * Addiert zwei Kommazahlen
     * @param int|float $p Kommazahl
     * @param int|float $a Multiplikator (@example Summe = $a * $p)
     * @return int|float Die Summe $a * $p
     */
    public static function getSumme(int|float $p, int|float $a): int|float {
        $tmp1 = str_replace(',', '.', $p);
        $tmp2 = floatval($tmp1);
        $tmp3 = $a * $tmp2;
        $tmp4 = strval($tmp3);
    
        $e = str_replace('.', ',', $tmp4);
    
        if (!is_int($tmp3)) {
            $e = number_format($tmp3, 2, ',', '');
        }
    
        return $e;
    }

    /**
     * Konvertiert eine Kommazahl zu einer Ganzzahl (Keine Aufrundung)
     * @param int|float $x Die zu Konvertieredne Kommazahl
     * @return int die Ganzzahl
     */
    public static function convertToNumber(int|float $x): int {
        $x = str_replace(',', '.', $x);
        $x = floatval($x);
    
        return $x;
    }
}
?>
