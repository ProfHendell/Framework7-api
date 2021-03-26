<?php

namespace Bulk;

use Bulk\Database\DatabaseConnection;

/**
 * @todo Documentación
 * Clase principal que controla y proporciona todos los métodos de la base de datos
 */
class Database
{

    /**
     * @var Database\DatabaseConnection
     */
    private $Connection;

    /**
     *
     * @var Database\QueryFactory
     */
    private $Factory;

    public function __construct(DatabaseConnection $Connection = null)
    {

        $this->Connection = ($Connection) ?: new Database\DatabaseConnection();
        $this->Factory = new Database\QueryFactory();
    }

    /**
     * 
     * @return \Bulk\QueryFactory
     */
    public function Factory(): Database\QueryFactory
    {
        return $this->Factory;
    }

    /**
     * Método que cierra la conexión MySQLi
     */
    public function close()
    {
        $conn = $this->getConnection();
        $conn->close();
    }

    /**
     * Ejecuta un <b>PDO::query</b> a la base de datos
     * @param string $sql Cadena de texto con comando SQL
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public function query(string $sql)
    {
        $pdo = $this->PDO();
        return $pdo->query($sql);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement Cadena de texto con comando SQL
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public function prepare(string $statement)
    {
        $pdo = $this->PDO();
        return $pdo->prepare($statement);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     */
    public function prepare_execute(string $statement, array $params = [])
    {
        $stmt = $this->prepare($statement);
        if ($stmt) {
            $stmt->execute($params);
        }
        return $stmt;
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @param bool $results
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     */
    public function prepare_fetch(string $statement, array $params = [], bool $results = false, $fetch_all = false)
    {
        $stmt = $this->prepare_execute($statement, $params);
        if ($results) {
            return (!$fetch_all ? $stmt->fetch(\PDO::FETCH_OBJ) : $stmt->fetchAll(\PDO::FETCH_OBJ));
        }
        return $stmt;
    }

    /**
     * 
     * @param string $statement
     * @param array $params
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     */
    public function prepare_fetch_result(string $statement, array $params = [])
    {
        return $this->prepare_fetch($statement, $params, true, false);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @param bool $results
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     */
    public function prepare_fetch_all(string $statement, array $params = [])
    {
        return $this->prepare_fetch($statement, $params, true, true);
    }

    /**
     * 
     * @param string $class
     * @param string $statement
     * @param array $params
     * @return \PDOStatement
     */
    public function prepare_fetch_class(string $class, string $statement, array $params = [])
    {
        $stmt = $this->prepare_execute($statement, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    /**
     * 
     * @param string $class
     * @param string $statement
     * @param array $params
     * @return \PDOStatement
     */
    public function prepare_fetch_all_class(string $class, string $statement, array $params = [])
    {
        $stmt = $this->prepare_execute($statement, $params);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * Regresa Objecto MySQL
     * @return Database\DatabaseConnection
     */
    public function getConnection()
    {
        return ($this->Connection ? $this->Connection : NULL);
    }

    /**
     * 
     * @return \PDO
     */
    public function PDO()
    {
        return $this->getConnection()->getPDO();
    }

    /**
     * 
     * @return int
     */
    public function getLastId(): int
    {
        return $this->PDO()->lastInsertId();
    }
}
