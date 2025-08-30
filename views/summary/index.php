<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Tour Summary</h2>
<?php if (isset($summaries) && !empty($summaries)): ?>
    <?php foreach ($summaries as $summary): ?>
        <h3><?php echo htmlspecialchars($summary['tour']['title']); ?> (Grade <?php echo htmlspecialchars($summary['tour']['grade_level']); ?>)</h3>
        <p>Description: <?php echo htmlspecialchars($summary['tour']['description']); ?></p>
        <p>Dates: <?php echo htmlspecialchars($summary['tour']['start_date']); ?> to <?php echo htmlspecialchars($summary['tour']['end_date']); ?></p>
        <p>Cost: <?php echo htmlspecialchars($summary['tour']['cost']); ?></p>
        <p>Total Registered Learners: <?php echo htmlspecialchars($summary['count']); ?></p>
        <h4>Registered Learners:</h4>
        <?php if (isset($summary['learners']) && !empty($summary['learners'])): ?>
            <table>
                <tr><th>ID</th><th>Name</th><th>Surname</th><th>Grade</th><th>Actions</th></tr>
                <?php foreach ($summary['learners'] as $learner): ?>
                <tr>
                    <td><?php echo htmlspecialchars($learner['learner_id']); ?></td>
                    <td><?php echo htmlspecialchars($learner['name']); ?></td>
                    <td><?php echo htmlspecialchars($learner['surname']); ?></td>
                    <td><?php echo htmlspecialchars($learner['grade']); ?></td>
                    <td>
                        <a href="?controller=registration&action=delete&id=<?php echo htmlspecialchars($learner['registration_id']); ?>" onclick="return confirm('Are you sure?')">Delete Registration</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No learners registered for this tour.</p>
        <?php endif; ?>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>No summary data available.</p>
<?php endif; ?>
<?php include __DIR__ . '/../layout/footer.php'; ?>
