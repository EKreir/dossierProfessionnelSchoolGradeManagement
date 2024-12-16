<h1>Liste des élèves</h1>
<a href="/students/add">Ajouter un élève</a>
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
            <td><?= $student['first_name'] ?></td>
            <td><?= $student['last_name'] ?></td>
            <td><?= $student['birthdate'] ?></td>
            <td>
                <a href="/students/edit/<?= $student['id'] ?>">Modifier</a> |
                <a href="/students/delete/<?= $student['id'] ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
