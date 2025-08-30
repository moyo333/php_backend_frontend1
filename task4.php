<?php
// Include config and controllers
require_once 'config.php';

// Database connection
try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Include controllers
require_once 'controllers/LearnerController.php';
require_once 'controllers/TourController.php';
require_once 'controllers/RegistrationController.php';
require_once 'controllers/SummaryController.php';

// Simple router
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($controller) {
    case 'learner':
        $ctrl = new LearnerController($db);
        if ($action == 'index') $ctrl->index();
        elseif ($action == 'create') $ctrl->create();
        elseif ($action == 'edit' && $id) $ctrl->edit($id);
        elseif ($action == 'delete' && $id) $ctrl->delete($id);
        break;
    case 'tour':
        $ctrl = new TourController($db);
        if ($action == 'index') $ctrl->index();
        elseif ($action == 'create') $ctrl->create();
        elseif ($action == 'edit' && $id) $ctrl->edit($id);
        elseif ($action == 'delete' && $id) $ctrl->delete($id);
        break;
    case 'registration':
        $ctrl = new RegistrationController($db);
        if ($action == 'create') $ctrl->create();
        elseif ($action == 'delete' && $id) $ctrl->delete($id);
        break;
    case 'summary':
        $ctrl = new SummaryController($db);
        if ($action == 'index') $ctrl->index();
        break;
    default:
        // Home page (redirect to summary or show welcome)
        include 'views/layout/header.php';
        echo "<h2>Welcome to School Tour Management System</h2>";
        echo "<p>Use the navigation menu to manage learners, tours, registrations, or view summaries.</p>";
        // Display content of task4.txt
        echo '<h3>Task 4 Code and Schema</h3>';
        echo '<pre style="background-color: #f4f4f4; border: 1px solid #ddd; padding: 10px; white-space: pre-wrap; word-wrap: break-word;">';
        $task_content = file_get_contents('task4.txt');
        echo htmlspecialchars($task_content);
        echo '</pre>';

        include 'views/layout/footer.php';
        break;
}
?>