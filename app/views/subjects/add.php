<?php require_once '../includes/header.php'; ?>

<h1>Ajouter une Matière</h1>

<form action="/subjects/add" method="POST">
    <label for="name">Nom de la matière :</label>
    <input type="text" id="name" name="name" required>
    <br>

    <button type="submit">Ajouter</button>
</form>

<p><a href="/subjects">Retour à la liste des matières</a></p>

<?php require_once '../includes/footer.php'; ?>
