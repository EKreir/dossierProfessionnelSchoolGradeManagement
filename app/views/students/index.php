<?php require_once '../includes/header.php'; ?>

<h1>Liste des élèves</h1>

<p><a href="/students/add">Ajouter un élève</a></p>


<table>
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
                    <!-- Autres actions possibles (modifier, supprimer, etc.) -->
                    <a href="/students/edit/<?= $student['id']; ?>">Modifier</a>
                    <a href="/students/delete/<?= $student['id']; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cet élève ?');">Supprimer</a>
                    <!-- Lien vers la page des notes de l'élève -->
                    <a href="/grades/<?= $student['id']; ?>">Voir les notes</a>
                    <!-- Lien vers la page d'ajout de notes -->
                    <a href="/grades/add/<?= $student['id']; ?>">Ajouter une note</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../includes/footer.php'; ?>

