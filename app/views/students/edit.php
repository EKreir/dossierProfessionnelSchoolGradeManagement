<?php require_once '../includes/header.php'; // Inclure l'entête de ton site ?>

<h1>Modifier les informations de l'élève</h1>

<!-- Formulaire de modification de l'élève -->
<form action="/students/edit/<?= $student['id']; ?>" method="POST">
    <label for="first_name">Prénom :</label>
    <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($student['first_name']); ?>" required>
    <br>

    <label for="last_name">Nom :</label>
    <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($student['last_name']); ?>" required>
    <br>

    <label for="birthdate">Date de naissance :</label>
    <input type="date" id="birthdate" name="birthdate" value="<?= htmlspecialchars($student['birthdate']); ?>" required>
    <br>

    <button type="submit">Mettre à jour l'élève</button>
</form>

<!-- Retour à la liste des élèves -->
<p><a href="/students">Retour à la liste des élèves</a></p>

<?php require_once '../includes/footer.php'; // Inclure le pied de page de ton site ?>
