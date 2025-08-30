<?php
require_once 'models/Learner.php';

class LearnerController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->model = new Learner($db);
    }

    public function index() {
        $learners = $this->model->getAll();
        include 'views/learners/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'grade' => $_POST['grade']
            ];
            if ($this->model->create($data)) {
                header('Location: ?controller=learner&action=index');
            }
        }
        include 'views/learners/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'grade' => $_POST['grade']
            ];
            if ($this->model->update($id, $data)) {
                header('Location: ?controller=learner&action=index');
                exit;
            }
        }

        $learner = $this->model->getById($id);

        if (!$learner) {
            header('Location: ?controller=learner&action=index');
            exit;
        }

        include 'views/learners/edit.php';
    }

    public function delete($id) {
        if ($this->model->delete($id)) {
            header('Location: ?controller=learner&action=index');
        }
    }
}
?>