<?php require_once '../includes/header.php'; ?>

<h1 class="my-4">Ajouter une Matière</h1>

<!-- Formulaire d'ajout avec des classes Bootstrap -->
<form action="/subjects/add" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nom de la matière :</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<!-- Retour à la liste des matières -->
<p><a href="/subjects" class="btn btn-secondary mt-3">Retour à la liste des matières</a></p>

<?php require_once '../includes/footer.php'; ?>