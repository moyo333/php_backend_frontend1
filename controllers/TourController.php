<?php
require_once 'models/Tour.php';

class TourController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->model = new Tour($db);
    }

    public function index() {
        $tours = $this->model->getAll();
        include 'views/tours/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'cost' => $_POST['cost'],
                'grade_level' => $_POST['grade_level']
            ];
            if ($this->model->create($data)) {
                header('Location: ?controller=tour&action=index');
            }
        }
        include 'views/tours/create.php';
    }

    public function edit($id) {
        $tour = $this->model->getById($id);

        if (!$tour) {
            header('Location: ?controller=tour&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'cost' => $_POST['cost'],
                'grade_level' => $_POST['grade_level']
            ];
            if ($this->model->update($id, $data)) {
                header('Location: ?controller=tour&action=index');
                exit;
            }
        }

        include 'views/tours/edit.php';
    }

    public function delete($id) {
        if ($this->model->delete($id)) {
            header('Location: ?controller=tour&action=index');
        }
    }
}
?>