<?php
namespace App;

use PDO;
use PDOException;

class Database
{
    // Store PDO and table ref
    protected $pdo;
    protected $table;

    /**
     * Create a new database instance
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /** 
     * Attempt to connect to the database
     * 
     * @param array $config 
     * @return object pdo
     */
    public static function connect($config) : PDO
    {
        try {
            $connection = strpos($config['connection'], 'sqlite') === 0 ? $config['connection'] : $config['connection'] . ';dbname=' . $config['name'];

            return new PDO($connection, $config['username'], $config['password'], $config['options']);

        } catch (PDOException $error) {
            die($error->getMessage());
        }
    }

    /**
     * Set a table to select
     * 
     * @param string $table
     * @return string $this
     */
    public function select(string $table) : self
    {
        $this->table = $table;

        return $this;
    }

    /** 
     * Retrieve all posts from database
     * 
     * @return array $posts 
     */
    public function all() : array
    {
        $statement = $this->pdo->prepare("select * from {$this->table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Retrieve a single by where
     * 
     * @param string $field
     * @param string $value
     * @return object $post
     */
    public function where(string $field, $value)
    {
        $statement = $this->pdo->prepare("select * from {$this->table} where slug = :value");

        $statement->execute([':value' => $value]);

        return $statement->fetch(PDO::FETCH_OBJ);
    }

}
