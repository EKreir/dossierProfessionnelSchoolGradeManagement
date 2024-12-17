<?php require_once '../includes/header.php'; ?>

<h1 class="my-4">Ajouter une note</h1>

<!-- Formulaire d'ajout de la note avec des classes Bootstrap -->
<form action="/grades/add/<?= $student_id; ?>" method="POST">
    <div class="mb-3">
        <label for="subject_id" class="form-label">Choisir une matière :</label>
        <select id="subject_id" name="subject_id" class="form-select" required>
            <?php foreach ($subjects as $subject): ?>
                <option value="<?= $subject['id']; ?>"><?= htmlspecialchars($subject['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="grade" class="form-label">Note :</label>
        <input type="number" id="grade" name="grade" class="form-control" step="0.01" min="0" max="20" required>
    </div>

    <button type="submit" class="btn btn-success">Ajouter la note</button>
</form>

<!-- Lien pour retourner à la liste des notes -->
<p><a href="/grades/<?= $student_id; ?>" class="btn btn-secondary mt-3">Retour à la liste des notes</a></p>

<?php require_once '../includes/footer.php'; ?>