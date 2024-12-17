<?php require_once '../includes/header.php'; ?>

<h1 class="my-4">Liste des élèves</h1>

<!-- Bouton Ajouter un élève avec Bootstrap -->
<p><a href="/students/add" class="btn btn-success mb-3">Ajouter un élève</a></p>

<!-- Tableau des élèves avec Bootstrap -->
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['first_name']); ?></td>
                <td><?= htmlspecialchars($student['last_name']); ?></td>
                <td><?= htmlspecialchars($student['birthdate']); ?></td>
                <td>
                    <!-- Lien modifier avec style Bootstrap -->
                    <a href="/students/edit/<?= $student['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                    
                    <!-- Lien supprimer avec confirmation et style Bootstrap -->
                    <a href="/students/delete/<?= $student['id']; ?>" 
                       class="btn btn-danger btn-sm" 
                       onclick="return confirm('Etes-vous sûr de vouloir supprimer cet élève ?');">
                        Supprimer
                    </a>

                    <!-- Lien voir les notes -->
                    <a href="/grades/<?= $student['id']; ?>" class="btn btn-info btn-sm">Voir les notes</a>

                    <!-- Lien ajouter une note -->
                    <a href="/grades/add/<?= $student['id']; ?>" class="btn btn-primary btn-sm">Ajouter une note</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../includes/footer.php'; ?>
