<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Edit Tour</h2>
<?php if (isset($tour) && $tour): ?>
<form method="POST">
    <label>Title: <input type="text" name="title" value="<?php echo htmlspecialchars($tour['title']); ?>" required></label>
    <label>Description: <textarea name="description" required><?php echo htmlspecialchars($tour['description']); ?></textarea></label>
    <label>Start Date: <input type="date" name="start_date" value="<?php echo htmlspecialchars($tour['start_date']); ?>" required></label>
    <label>End Date: <input type="date" name="end_date" value="<?php echo htmlspecialchars($tour['end_date']); ?>" required></label>
    <label>Cost: <input type="number" name="cost" value="<?php echo htmlspecialchars($tour['cost']); ?>" required step="0.01"></label>
    <label>Grade Level: <input type="number" name="grade_level" value="<?php echo htmlspecialchars($tour['grade_level']); ?>" required min="8" max="12"></label>
    <button type="submit">Update</button>
</form>
<?php else: ?>
    <p>Tour not found.</p>
<?php endif; ?>
<?php include __DIR__ . '/../layout/footer.php'; ?>