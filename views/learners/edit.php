<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Edit Learner</h2>
<?php if (isset($learner) && is_array($learner)): ?>
<form method="POST">
    <label>Name: <input type="text" name="name" value="<?php echo htmlspecialchars($learner['name']); ?>" required></label>
    <label>Surname: <input type="text" name="surname" value="<?php echo htmlspecialchars($learner['surname']); ?>" required></label>
    <label>Grade: <input type="number" name="grade" value="<?php echo htmlspecialchars($learner['grade']); ?>" required min="8" max="12"></label>
    <button type="submit">Update</button>
</form>
<?php else: ?>
    <p>Learner not found.</p>
<?php endif; ?>
<?php include __DIR__ . '/../layout/footer.php'; ?>