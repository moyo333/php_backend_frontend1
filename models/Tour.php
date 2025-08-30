<?php
class Tour {
    private $conn;
    private $table = 'tours';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all tours
    public function getAll() {
        $query = "SELECT id, title, description, start_date, end_date, cost, grade AS grade_level FROM " . $this->table . " ORDER BY start_date ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get tour by ID
    public function getById($id) {
        $query = "SELECT id, title, description, start_date, end_date, cost, grade AS grade_level FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create tour
    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (title, description, start_date, end_date, cost, grade_level) 
                  VALUES (:title, :description, :start_date, :end_date, :cost, :grade_level)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':start_date', $data['start_date']);
        $stmt->bindParam(':end_date', $data['end_date']);
        $stmt->bindParam(':cost', $data['cost']);
        $stmt->bindParam(':grade_level', $data['grade_level']);
        return $stmt->execute();
    }

    // Update tour
    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET title = :title, description = :description, start_date = :start_date, 
                  end_date = :end_date, cost = :cost, grade_level = :grade_level WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':start_date', $data['start_date']);
        $stmt->bindParam(':end_date', $data['end_date']);
        $stmt->bindParam(':cost', $data['cost']);
        $stmt->bindParam(':grade_level', $data['grade_level']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete tour
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>