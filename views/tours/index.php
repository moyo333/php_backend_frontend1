<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Tours</h2>
<a href="?controller=tour&action=create">Add Tour</a>
<?php if (isset($tours) && !empty($tours)): ?>
<table>
    <tr><th>ID</th><th>Title</th><th>Description</th><th>Start Date</th><th>End Date</th><th>Cost</th><th>Grade</th><th>Actions</th></tr>
    <?php foreach ($tours as $tour): ?>
    <tr>
        <td><?php echo htmlspecialchars($tour['id']); ?></td>
        <td><?php echo htmlspecialchars($tour['title']); ?></td>
        <td><?php echo htmlspecialchars($tour['description']); ?></td>
        <td><?php echo htmlspecialchars($tour['start_date']); ?></td>
        <td><?php echo htmlspecialchars($tour['end_date']); ?></td>
        <td><?php echo htmlspecialchars($tour['cost']); ?></td>
        <td><?php echo htmlspecialchars($tour['grade_level']); ?></td>
        <td>
            <a href="?controller=tour&action=edit&id=<?php echo htmlspecialchars($tour['id']); ?>">Edit</a> |
            <a href="?controller=tour&action=delete&id=<?php echo htmlspecialchars($tour['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
    <p>No tours found.</p>
<?php endif; ?>
<?php include __DIR__ . '/../layout/footer.php'; ?>