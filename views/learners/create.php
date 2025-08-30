<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Add Learner</h2>
<form method="POST">
    <label>Name: <input type="text" name="name" required></label>
    <label>Surname: <input type="text" name="surname" required></label>
    <label>Grade: <input type="number" name="grade" required min="8" max="12"></label>
    <button type="submit">Add</button>
</form>
<?php include __DIR__ . '/../layout/footer.php'; ?>
