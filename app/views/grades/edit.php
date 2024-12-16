<?php require_once '../includes/header.php'; ?>

<h1>Modifier la Note</h1>

<form action="/grades/edit/<?= $grade['id']; ?>" method="POST">
    <label for="grade">Note :</label>
    <input type="number" id="grade" name="grade" step="0.1" min="0" max="20" value="<?= htmlspecialchars($grade['grade']); ?>" required>
    <br>

    <button type="submit">Mettre à jour</button>
</form>

<p><a href="/grades/<?= $student_id ?>">Retour à la liste des notes</a></p>

<?php require_once '../includes/footer.php'; ?>
