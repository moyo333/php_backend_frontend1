<?php
class Learner {
    private $conn;
    private $table = 'learners';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all learners
    public function getAll() {
        $query = "SELECT id, name, surname, grade FROM " . $this->table . " ORDER BY surname ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get learner by ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create learner
    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (name, surname, grade) VALUES (:name, :surname, :grade)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':grade', $data['grade']);
        return $stmt->execute();
    }

    // Update learner
    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET name = :name, surname = :surname, grade = :grade WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':grade', $data['grade']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete learner
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>