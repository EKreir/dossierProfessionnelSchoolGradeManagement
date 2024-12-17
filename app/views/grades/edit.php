<?php require_once '../includes/header.php'; ?>

<h1 class="my-4">Modifier la Note</h1>

<!-- Formulaire de modification avec des classes Bootstrap -->
<form action="/grades/edit/<?= $grade['id']; ?>" method="POST">
    <div class="mb-3">
        <label for="grade" class="form-label">Note :</label>
        <input type="number" id="grade" name="grade" class="form-control" step="0.1" min="0" max="20" value="<?= htmlspecialchars($grade['grade']); ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>

<!-- Lien pour retourner à la liste des notes -->
<p><button onclick="window.history.back();" class="btn btn-secondary mt-3">Retour à la liste des notes</button></p>

<?php require_once '../includes/footer.php'; ?>