<?php require_once '../includes/header.php'; ?>

<h1>Ajouter une note</h1>

<!-- Formulaire d'ajout de la note -->
<form action="/grades/add/<?= $student_id; ?>" method="POST">
    <!-- Sélection de la matière -->
    <label for="subject_id">Choisir une matière :</label>
    <select id="subject_id" name="subject_id" required>
        <?php foreach ($subjects as $subject): ?>
            <option value="<?= $subject['id']; ?>"><?= htmlspecialchars($subject['name']); ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <!-- Saisie de la note -->
    <label for="grade">Note :</label>
    <input type="number" id="grade" name="grade" step="0.01" min="0" max="20" required>
    <br>

    <button type="submit">Ajouter la note</button>
</form>

<!-- Retour à la liste des grades -->
<p><a href="/grades/<?= $student_id; ?>">Retour à la liste des notes</a></p>

<?php require_once '../includes/footer.php'; ?>
