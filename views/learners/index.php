<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Learners</h2>
<a href="?controller=learner&action=create">Add Learner</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($learners) && !empty($learners)): ?>
            <?php foreach ($learners as $learner): ?>
                <tr>
                    <td><?php echo htmlspecialchars($learner['id']); ?></td>
                    <td><?php echo htmlspecialchars($learner['name']); ?></td>
                    <td><?php echo htmlspecialchars($learner['surname']); ?></td>
                    <td><?php echo htmlspecialchars($learner['grade']); ?></td>
                    <td>
                        <a href="?controller=learner&action=edit&id=<?php echo $learner['id']; ?>">Edit</a> |
                        <a href="?controller=learner&action=delete&id=<?php echo $learner['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No learners found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php include __DIR__ . '/../layout/footer.php'; ?>