<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/4/17
 * Time: 11:31 PM
 */

namespace Zcms;

class PdoDatabase implements DatabaseInterface
{

    private $db;
    private $exception = "";


    /**
     * PDODB constructor.
     * @param string $host PDO host
     * @param string $username PDO username
     * @param string $password PDO password
     * @param string $database PDO database table
     * @param int $port PDO Port
     */
    public function __construct(string $host, string $username, string $password, string $database, int $port)
    {
        try {
            $this->db = new \PDO("mysql:host={$host};port={$port};dbname={$database}", $username, $password);
        } catch (\PDOException $e) {
            $this->exception = $e;
        }
    }

    /**
     *
     * @return bool
     */
    public function isConnected(): bool
    {
        return $this->db != null && $this->exception == null;
    }

    public function getException(): string
    {
        return $this->exception;
    }

    public function getRow(string $sqlQuery, array $bind): array
    {

        $statement = $this->db->prepare($sqlQuery);
        $statement->execute($bind);
        return $statement->fetch();
    }

    /**
     * Update a single row.
     * @param string $table Name of the database table to update.
     * @param array $update Keys are field names and values are field values to set to.
     * @param array $where Keys are field names and values are field values to match.
     * @return int Returns the number of effected rows.
     */
    public function updateRow(string $table, array $update, array $where): int
    {
        $sql = 'UPDATE ' . $table . ' SET ';
        $tableFirstUpdate = true;
        $bindingArray = array();

        foreach ($update as $index => $value) {
            if ($tableFirstUpdate) {
                $sql .= $index . ' = ? ';
                $tableFirstUpdate = false;
            } else {
                $sql .= ', ' . $index . ' = ? ';
            }
            $bindingArray[] = $value;
        }

        $sql .= "WHERE ";

        $tableFirstUpdate = true;
        foreach ($where as $index => $value) {
            if ($tableFirstUpdate) {
                $sql .= $index . ' = ?';
                $tableFirstUpdate = false;
            } else {
                $sql .= ' AND ' . $index . ' = ?';
            }
            $bindingArray[] = $value;
        }
        //die($sql);
        $statement = $this->db->prepare($sql);
        $statement->execute($bindingArray);
        return (int) $statement->rowCount();
    }

    public function closeConnection()
    {
        $this->db = null;
    }
}
