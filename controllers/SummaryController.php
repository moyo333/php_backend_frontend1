<?php
require_once 'models/Tour.php';
require_once 'models/Registration.php';

class SummaryController {
    private $tourModel;
    private $registrationModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->tourModel = new Tour($db);
        $this->registrationModel = new Registration($db);
    }

    public function index() {
        $tours = $this->tourModel->getAll();
        $summaries = [];
        foreach ($tours as $tour) {
            $count = $this->registrationModel->getCountByTour($tour['id']);
            $learners = $this->registrationModel->getByTour($tour['id']);
            $summaries[] = [
                'tour' => $tour,
                'count' => $count,
                'learners' => $learners
            ];
        }
        include 'views/summary/index.php';
    }
}
?>