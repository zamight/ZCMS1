<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/4/17
 * Time: 11:31 PM
 */

namespace zcms;

class PdoDatabase implements DatabaseInterface
{

    private $db;
    private $exception;


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
            $this->db = new \PDO("mysql:host={$host};dbname={$database}", $username, $password);
        } catch (\PDOException $e) {
            $this->exception = $e;
        }
    }

    public function isConnected(): bool
    {
        return $this->db != null && $this->exception == null;
    }

    public function getException(): string
    {
        return $this->exception;
    }

}