<?php

require_once 'config.php';

class Database extends Config {
    // Insert Item Into Database
    public function insert($name, $Description, $Price, $Quantity) {
        $sql = 'INSERT INTO Item (name, Description, Price, Quantity) VALUES (:name, :Description, :Price, :Quantity)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
        'name' => $name,
        'Description' => $Description,
        'Price' => $Price,
        'Quantity' => $Quantity
    ]);
        return true;
    }

    // Fetch All Items From Database
    public function read() {
      $sql = 'SELECT * FROM Item ORDER BY id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Fetch Single Items From Database
    public function readOne($id) {
      $sql = 'SELECT * FROM Item WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    // Update Single User
    public function update($id, $name, $Description, $Price, $Quantity) {
        $sql = 'UPDATE item SET name = :name, Description = :Description, Price = :Price, Quantity = :Quantity WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
        'name' => $name,
        'Description' => $Description,
        'Price' => $Price,
        'Quantity' => $Quantity,
        'id' => $id
    ]);

        return true;
    }

    // Delete User From Database
    public function delete($id) {
        $sql = 'DELETE FROM item WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }
}

?>
