<?php require_once '../includes/header.php'; // Inclure l'entête de ton site ?>

<h1>Ajouter un nouvel élève</h1>

<!-- Formulaire d'ajout d'un élève -->
<form action="/students/add" method="POST">
    <label for="first_name">Prénom :</label>
    <input type="text" id="first_name" name="first_name" required>
    <br>

    <label for="last_name">Nom :</label>
    <input type="text" id="last_name" name="last_name" required>
    <br>

    <label for="birthdate">Date de naissance :</label>
    <input type="date" id="birthdate" name="birthdate" required>
    <br>

    <button type="submit">Ajouter l'élève</button>
</form>

<!-- Retour à la liste des élèves -->
<p><a href="/students">Retour à la liste des élèves</a></p>

<?php require_once '../includes/footer.php'; // Inclure le pied de page de ton site ?>
