<?php
class SQL
{
    /**
     * @var const USE_PDO: Soll PHP-PDO oder PHP-MySQLi verwendet werden? (true/false)
     * @var const Hostname Hostname oder IP des SQL Servers
     * @var const USERNAME SQL Benutzername
     * @var const PASSWORD SQL Benutzer Passwort
     * @var const DATABASE SWL Datenbank
     */
    private const USE_PDO = true;
    private const HOSTNAME = 'localhost';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private const DATABASE = 'example_db';

    private static $connection = null;

    /**
     * Stellt die Verbindung zum SQL Server her
     */
    public static function connect(): void {
        if (self::$connection !== null) {
            return;
        }

        if (self::USE_PDO) {
            try {
                self::$connection = new PDO(
                    'mysql:host=' . self::HOSTNAME . ';dbname=' . self::DATABASE,
                    self::USERNAME,
                    self::PASSWORD
                );

                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('PDO Connection failed: ' . $e->getMessage());
            }
        } else {
            self::$connection = new mysqli(
                self::HOSTNAME,
                self::USERNAME,
                self::PASSWORD,
                self::DATABASE
            );

            if (self::$connection->connect_error) {
                die('MySQLi Connection failed: ' . self::$connection->connect_error);
            }
        }
    }

    /**
     * Sendet eine SQL Query an den SQL Server
     *
     * @param string $sql Die SQL Query
     * @return mixed Ergebnis / Antwort des SQL Servers
     */
    public static function send_sql(string $sql): mixed {
        self::connect();

        if (self::USE_PDO) {
            try {
                return self::$connection->query($sql);
            } catch (PDOException $e) {
                die('SQL Error: ' . $e->getMessage());
            }
        } else {
            $result = self::$connection->query($sql);

            if (!$result) {
                die('SQL Error: ' . self::$connection->error);
            }

            return $result;
        }
    }

    /**
     * Sendet eine SQL SELECT Query an den SQL Server
     *
     * @param string $table Tabelle
     * @param string $columns Spalten
     * @param string|null $where (OPTIONAL) WHERE-Anweisung
     * @return array Ergebnis / Antwort des SQL Servers
     */
    public static function select(string $table, string $columns = '*', string $where = null): array {
        $sql = "SELECT $columns FROM $table";

        if ($where) {
            $sql .= " WHERE $where";
        }

        $result = self::send_sql($sql);

        if (self::USE_PDO) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    /**
     * Sendet eine SQL INSERT Query an den SQL Server
     *
     * @param string $table Tabelle
     * @param array $data Daten entsprechend der SQL Tabelle als PHP-ArrayObject
     * @return bool ture wenn keine Probleme aufgekommen sind
     */
    public static function insert(string $table, array $data): bool {
        $columns = implode(',', array_keys($data));

        $values = implode(',', array_map(function ($value) {
            return self::USE_PDO ? self::$connection->quote($value) : "'" . self::$connection->real_escape_string($value) . "'";
        }, array_values($data)));

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        return self::send_sql($sql) !== false;
    }

    /**
     * Sendet eine SQL UPDATE Query an den SQL Server
     *
     * @param string $table Tabelle
     * @param array $data Daten entsprechend der SQL Tabelle als PHP-ArrayObject
     * @param string $where SQL WHERE-Anweisung
     * @return bool true wenn keine Probleme aufgekommen sind
     */
    public static function update(string $table, array $data, string $where): bool {
        $set = implode(',', array_map(function ($key, $value) {
            $escapedValue = self::USE_PDO ? self::$connection->quote($value) : "'" . self::$connection->real_escape_string($value) . "'";
            return "$key=$escapedValue";
        }, array_keys($data), $data));

        $sql = "UPDATE $table SET $set WHERE $where";

        return self::send_sql($sql) !== false;
    }

    /**
     * Sendet eine SQL DELETE Query an den SQL Server
     *
     * @param string $table Tabelle
     * @param string $where SQL WHERE-Anweisung
     * @return bool true wenn keine Probleme aufgekommen sind
     */
    public static function delete(string $table, string $where): bool {
        $sql = "DELETE FROM $table WHERE $where";
        return self::send_sql($sql) !== false;
    }
}
?>
