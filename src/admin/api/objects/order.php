<?php
class Order {
    private $conn;
    private $table_name = "orders";

    public $id;
    public $info;
    public $status;
    public $duration;
    public $cost;
    public $master_id;
    public $registration_time;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . "(info, status, duration, cost, master_id, registration_time) VALUES 
        (\"{$this->info}\", \"{$this->status}\", {$this->duration}, {$this->cost}, {$this->master_id}, STR_TO_DATE(\"{$this->registration_time}\", \"%d.%m.%Y %H:%i\"))";
        
        $stmt = $this->conn->prepare($query);

        $this->info = htmlspecialchars(strip_tags($this->info));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->duration = htmlspecialchars(strip_tags($this->duration));
        $this->cost = htmlspecialchars(strip_tags($this->cost));
        $this->master_id = htmlspecialchars(strip_tags($this->master_id));
        $this->registration_time = htmlspecialchars(strip_tags($this->registration_time));

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update() {
        $query = "UPDATE " . $this->table_name . "
        SET
            info=\"{$this->info}\",
            status=\"{$this->status}\",
            duration={$this->duration},
            cost={$this->cost},
            master_id={$this->master_id},
            registration_time=STR_TO_DATE(\"{$this->registration_time}\", \"%d.%m.%Y %H:%i\")        
        WHERE
            id = {$this->id}";
        $stmt = $this->conn->prepare($query);
        
        $this->info = htmlspecialchars(strip_tags($this->info));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->duration = htmlspecialchars(strip_tags($this->duration));
        $this->cost = htmlspecialchars(strip_tags($this->cost));
        $this->master_id = htmlspecialchars(strip_tags($this->master_id));
        $this->registration_time = htmlspecialchars(strip_tags($this->registration_time));
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete() {
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