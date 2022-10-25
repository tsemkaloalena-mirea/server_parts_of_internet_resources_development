<?php
class Master {
    private $conn;
    private $table_name = "masters";

    public $id;
    public $name;
    public $end_of_work_time;

    public function __construct($db) {
        $this->conn = $db;
    }

    function exists() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = {$this->id}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        if ($stmt->fetch()) {
            return true;
        }
        return false;;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . "(name, end_of_work_time) VALUES 
        (\"{$this->name}\", STR_TO_DATE(\"{$this->end_of_work_time}\", \"%d.%m.%Y %H:%i\"))";
        
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->end_of_work_time = htmlspecialchars(strip_tags($this->end_of_work_time));

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update() {
        if (! exists()) {
            return false;
        }
        $query = "UPDATE " . $this->table_name . "
        SET
            name=\"{$this->name}\",
            end_of_work_time=STR_TO_DATE(\"{$this->end_of_work_time}\", \"%d.%m.%Y %H:%i\")        
        WHERE
            id = {$this->id}";
        $stmt = $this->conn->prepare($query);
        
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->end_of_work_time = htmlspecialchars(strip_tags($this->end_of_work_time));
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete() {
        if (! $this->exists()) {
            return false;
        }
        $query = "DELETE FROM " . $this->table_name . " WHERE id = {$this->id}";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>