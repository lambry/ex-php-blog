<?php
namespace App;

use PDO;
use PDOException;

class Database
{
    // Store PDO/table ref
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
        $statement = $this->pdo->prepare("select * from {$this->table} order by id desc");

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
    public function where(string $field, string $value) : \stdClass
    {
        $statement = $this->pdo->prepare("select * from {$this->table} where $field = :value");

        $statement->execute([':value' => $value]);

        return $statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Insert a new row
     * 
     * @param array $data
     * @return bool $success
     */
    public function insert(array $data) : bool
    {
        extract($data);

        $statement = $this->pdo->prepare("insert into {$this->table} (title, slug, content) values (:title, :slug, :content)");

        return $statement->execute([':title' => $title, ':slug' => $slug, ':content' => $content]);
    }

    /**
     * Update an existing row
     * 
     * @param array $data
     * @return bool $success
     */
    public function update(array $data) : bool
    {
        extract($data);

        $statement = $this->pdo->prepare("update {$this->table} set title = :title, slug = :slug, content = :content where id = :id");

        return $statement->execute([':title' => $title, ':slug' => $slug, ':content' => $content, ':id' => $id]);
    }

    /**
     * Delete a existing row
     * 
     * @param int $id
     * @return bool $success
     */
    public function delete(int $id): bool
    {
        $statement = $this->pdo->prepare("delete from {$this->table} where id = :id");

        return $statement->execute([':id' => $id]);
    }

}
