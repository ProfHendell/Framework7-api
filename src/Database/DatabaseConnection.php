<?php

namespace Bulk\Database;

/**
 * @todo Documentar
 * Clase controladora de la conexión de base de datos
 */
class DatabaseConnection {

    /**
     * Instancia de configuración 
     * @var DatabaseConfig
     */
    private $Config;

    /**
     *
     * @var \PDO
     */
    private $PDO;

    /**
     * Regresa instancia de conexión de base de datos además de la instancia de configuración
     * @param DatabaseConfig $Config     
     * @param boolean $Connect
     */
    public function __construct(DatabaseConfig $Config = NULL, $Connect = TRUE) {
        $this->Config = ($Config) ?: new DatabaseConfig(NULL, NULL, NULL, NULL, NULL);

        if ($Connect) {
            $this->connect();
        }
    }

    /**
     * Función que intenta crear instancia MySQLi con la configuración asignada
     * @return $this
     */
    public function connect() {
        $Config = $this->getConfig();

        $protocol = $Config->getProtocol();
        $server = $Config->getServer();
        $database = $Config->getDatabase();
        $user = $Config->getUserName();
        $password = $Config->getPassword();

        try {
            $pdo = new \PDO("$protocol:host=$server;dbname=$database", $user, $password);
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(\PDO::ATTR_STRINGIFY_FETCHES, false);
            $this->PDO = $pdo;
        } catch (\PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
        }
        return $this;
    }

    /**
     * Establece el objeto PDO como nulo
     */
    public function close() {
        $this->PDO = NULL;
    }

    /**
     * Regresa el objeto PDO
     * @return \PDO
     */
    public function getPDO() {
        return $this->PDO;
    }

    /**
     * Regresa instancia de configuración usada en la conexión de la base de datos
     * @return DatabaseConfig
     */
    public function getConfig() {
        return $this->Config;
    }

}
