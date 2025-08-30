<?php
require_once 'models/Registration.php';
require_once 'models/Learner.php';
require_once 'models/Tour.php';

class RegistrationController {
    private $model;
    private $learnerModel;
    private $tourModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->model = new Registration($db);
        $this->learnerModel = new Learner($db);
        $this->tourModel = new Tour($db);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model->register($_POST['learner_id'], $_POST['tour_id'])) {
                header('Location: ?controller=summary&action=index');
                exit();
            }
        }
        $learners = $this->learnerModel->getAll();
        $tours = $this->tourModel->getAll();
        include 'views/registrations/create.php';
    }

    public function delete($id) {
        if ($this->model->delete($id)) {
            header('Location: ?controller=summary&action=index');
            exit();
        }
    }
}
?>