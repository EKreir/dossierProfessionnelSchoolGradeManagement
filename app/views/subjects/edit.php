<?php require_once '../includes/header.php'; ?>

<h1>Modifier la Matière</h1>

<form action="/subjects/edit/<?= $subject['id']; ?>" method="POST">
    <label for="name">Nom de la matière :</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($subject['name']); ?>" required>
    <br>

    <button type="submit">Mettre à jour</button>
</form>

<p><a href="/subjects">Retour à la liste des matières</a></p>

<?php require_once '../includes/footer.php'; ?>
