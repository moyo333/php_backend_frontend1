<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Register Learner for Tour</h2>
<form method="POST">
    <label>Learner: 
        <select name="learner_id" required>
            <?php if (isset($learners) && !empty($learners)): ?>
                <?php foreach ($learners as $learner): ?>
                    <option value="<?php echo htmlspecialchars($learner['id']); ?>"><?php echo htmlspecialchars($learner['name'] . ' ' . $learner['surname'] . ' (Grade ' . $learner['grade'] . ')'); ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="" disabled>No learners available</option>
            <?php endif; ?>
        </select>
    </label>
    <label>Tour: 
        <select name="tour_id" required>
            <?php if (isset($tours) && !empty($tours)): ?>
                <?php foreach ($tours as $tour): ?>
                    <option value="<?php echo htmlspecialchars($tour['id']); ?>"><?php echo htmlspecialchars($tour['title'] . ' (Grade ' . $tour['grade_level'] . ')'); ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="" disabled>No tours available</option>
            <?php endif; ?>
        </select>
    </label>
    <button type="submit">Register</button>
</form>
<?php include __DIR__ . '/../layout/footer.php'; ?>
