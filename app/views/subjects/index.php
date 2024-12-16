<?php require_once '../includes/header.php'; ?>

<h1>Liste des Matières</h1>

<!-- Lien pour ajouter une nouvelle matière -->
<a href="/subjects/add">Ajouter une matière</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($subjects as $subject): ?>
            <tr>
                <td><?= htmlspecialchars($subject['id']); ?></td>
                <td><?= htmlspecialchars($subject['name']); ?></td>
                <td>
                    <!-- Lien pour modifier -->
                    <a href="/subjects/edit/<?= $subject['id']; ?>">Modifier</a>
                    <!-- Lien pour supprimer -->
                    <a href="/subjects/delete/<?= $subject['id']; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette matière ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../includes/footer.php'; ?>
