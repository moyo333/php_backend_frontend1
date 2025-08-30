<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Add Tour</h2>
<form method="POST">
    <label>Title: <input type="text" name="title" required></label>
    <label>Description: <textarea name="description" required></textarea></label>
    <label>Start Date: <input type="date" name="start_date" required></label>
    <label>End Date: <input type="date" name="end_date" required></label>
    <label>Cost: <input type="number" name="cost" required step="0.01"></label>
    <label>Grade Level: <input type="number" name="grade_level" required min="8" max="12"></label>
    <button type="submit">Add</button>
</form>
<?php include __DIR__ . '/../layout/footer.php'; ?>