<?php require_once '../includes/header.php'; ?>

<h1>Notes de <?= isset($student) ? htmlspecialchars($student['first_name']) . ' ' . htmlspecialchars($student['last_name']) : 'Élève inconnu'; ?></h1>

<?php if (!empty($grades)): ?>
<table>
    <thead>
        <tr>
            <th>Matière</th>
            <th>Note</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= htmlspecialchars($grade['name']); ?></td>
                <td><?= htmlspecialchars($grade['grade']); ?></td>
                <td>
                    <a href="/grades/edit/<?= $grade['id']; ?>">Modifier</a>
                    <a href="/grades/delete/<?= $grade['id']; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette note ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p>Aucune note trouvée pour cet élève.</p>
<?php endif; ?>

<a href="/grades/add/<?= $student_id; ?>">Ajouter une note</a>

<p><a href="/students">Retour à la liste des élèves</a></p>

<?php require_once '../includes/footer.php'; ?>
