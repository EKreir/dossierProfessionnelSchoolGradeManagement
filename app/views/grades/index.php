<?php require_once '../includes/header.php'; ?>

<h1 class="my-4">Notes de <?= isset($student) ? htmlspecialchars($student['first_name']) . ' ' . htmlspecialchars($student['last_name']) : 'Élève inconnu'; ?></h1>

<!-- Si des notes existent -->
<?php if (!empty($grades)): ?>
    <table class="table table-striped table-bordered table-hover">
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
                        <a href="/grades/edit/<?= $grade['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/grades/delete/<?= $grade['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette note ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucune note trouvée pour cet élève.</p>
<?php endif; ?>

<!-- Lien pour ajouter une note -->
<p><a href="/grades/add/<?= $student_id; ?>" class="btn btn-success mt-3">Ajouter une note</a></p>

<!-- Lien pour retourner à la liste des élèves -->
<p><a href="/students" class="btn btn-secondary mt-3">Retour à la liste des élèves</a></p>

<?php require_once '../includes/footer.php'; ?>
