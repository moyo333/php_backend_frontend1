<?php
class Registration {
    private $conn;
    private $table = 'registrations';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register learner for tour (with grade check)
    public function register($learner_id, $tour_id) {
        // Check if grades match
        $learner_query = "SELECT grade FROM learners WHERE id = :learner_id";
        $stmt_learner = $this->conn->prepare($learner_query);
        $stmt_learner->bindParam(':learner_id', $learner_id);
        $stmt_learner->execute();
        $learner = $stmt_learner->fetch(PDO::FETCH_ASSOC);

        $tour_query = "SELECT grade FROM tours WHERE id = :tour_id";
        $stmt_tour = $this->conn->prepare($tour_query);
        $stmt_tour->bindParam(':tour_id', $tour_id);
        $stmt_tour->execute();
        $tour = $stmt_tour->fetch(PDO::FETCH_ASSOC);

        if ($learner['grade'] != $tour['grade']) {
            return false; // Grades don't match
        }

        // Register if not already registered
        $query = "INSERT IGNORE INTO " . $this->table . " (learner_id, tour_id) VALUES (:learner_id, :tour_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':learner_id', $learner_id);
        $stmt->bindParam(':tour_id', $tour_id);
        return $stmt->execute();
    }

    // Delete registration
    public function delete($registration_id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $registration_id);
        return $stmt->execute();
    }

    // Get registrations for a tour
    public function getByTour($tour_id) {
        $query = "SELECT r.id AS registration_id, l.id AS learner_id, l.name, l.surname, l.grade 
                  FROM " . $this->table . " r 
                  JOIN learners l ON r.learner_id = l.id 
                  WHERE r.tour_id = :tour_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get count of registrations for a tour
    public function getCountByTour($tour_id) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE tour_id = :tour_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }
}
?>