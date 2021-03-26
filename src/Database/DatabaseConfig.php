<?php

namespace Bulk\Database;

/**
 * @todo Documentar
 * Instancia abstracta usada para almacenar y cargar
 * datos de configuración de la base de datos
 */
class DatabaseConfig {

    /**
     *
     * @var string
     */
    private $protocol;

    /**
     * @var string Dirección del servidor de la base de datos
     */
    private $server;

    /**
     * @var string Nombre de usuario de la base de datos 
     */
    private $username;

    /**
     * @var string Contraseña de conexión 
     */
    private $password;

    /**
     * @var string Base de datos que se usara
     */
    private $database;

    /**
     * Regresa instancia de configuración de la base de datos
     * @param string $protocol Protocolo de la base de datos
     * @param string $server Dirección del servidor de la base de datos
     * @param string $username Nombre de usuario de la base de datos
     * @param string $password Contraseña de conexión
     * @param string $database Base de datos que se usara
     */
    public function __construct($protocol = NULL, $server = NULL, $username = NULL, $password = NULL, $database = NULL) {
        $this->protocol = ($protocol) ?: "mysql";
        $this->server = ($server) ?: "127.0.0.1";
        $this->username = ($username) ?: "root";
        $this->password = ($password) ?: "";
        $this->database = ($database) ?: "asistencia";
    }

    /**
     * 
     * @return string
     */
    public function getProtocol(): string {
        return $this->protocol;
    }

    /**
     * 
     * @return string
     */
    public function getServer(): string {
        return $this->server;
    }

    /**
     * 
     * @return string
     */
    public function getUserName(): string {
        return $this->username;
    }

    /**
     * 
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * 
     * @return string
     */
    public function getDatabase(): string {
        return $this->database;
    }

    /**
     * 
     * @param string $protocol
     * @return $this
     */
    public function setProtocol(string $protocol = 'mysql') {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * 
     * @param string $server
     * @return string
     */
    public function setServer(string $server = '127.0.0.1') {
        $this->server = $server;
        return $server;
    }

    /**
     * 
     * @param string $username
     * @return string
     */
    public function setUserName(string $username = 'root') {
        $this->username = $username;
        return $username;
    }

    /**
     * 
     * @param string $password
     * @return string
     */
    public function setPassword(string $password = '') {
        $this->password = $password;
        return $password;
    }

    /**
     * 
     * @param string $database
     * @return string
     */
    public function setDatabase(string $database = 'database') {
        $this->database = $database;
        return $database;
    }

}
