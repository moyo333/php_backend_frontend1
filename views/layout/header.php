<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Tour Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 10px; text-decoration: none; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        form { max-width: 400px; }
        input, select { width: 100%; margin-bottom: 10px; }
        button { padding: 10px; }
    </style>
</head>
<body>
    <h1>School Tour Management System</h1>
    <nav>
        <a href="task4.php">Home</a> |
        <a href="?controller=learner&action=index">Manage Learners</a> |
        <a href="?controller=tour&action=index">Manage Tours</a> |
        <a href="?controller=registration&action=create">Register for Tour</a> |
        <a href="?controller=summary&action=index">View Summary</a>
    </nav>
    <hr>