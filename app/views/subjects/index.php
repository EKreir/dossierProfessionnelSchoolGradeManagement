<?php require_once '../includes/header.php'; ?>

<h1 class="my-4">Liste des Matières</h1>

<!-- Lien pour ajouter une nouvelle matière avec Bootstrap -->
<p><a href="/subjects/add" class="btn btn-success mb-3">Ajouter une matière</a></p>

<!-- Tableau des matières avec Bootstrap -->
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($subjects as $subject): ?>
            <tr>
                <td><?= htmlspecialchars($subject['name']); ?></td>
                <td>
                    <!-- Lien pour modifier avec style Bootstrap -->
                    <a href="/subjects/edit/<?= $subject['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                    
                    <!-- Lien pour supprimer avec confirmation et style Bootstrap -->
                    <a href="/subjects/delete/<?= $subject['id']; ?>" 
                       class="btn btn-danger btn-sm" 
                       onclick="return confirm('Etes-vous sûr de vouloir supprimer cette matière ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../includes/footer.php'; ?>
