<?php require_once '../includes/header.php'; ?>

<h1 class="my-4">Ajouter un nouvel élève</h1>

<!-- Formulaire d'ajout d'un élève avec des classes Bootstrap -->
<form action="/students/add" method="POST">
    <div class="mb-3">
        <label for="first_name" class="form-label">Prénom :</label>
        <input type="text" id="first_name" name="first_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Nom :</label>
        <input type="text" id="last_name" name="last_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="birthdate" class="form-label">Date de naissance :</label>
        <input type="date" id="birthdate" name="birthdate" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter l'élève</button>
</form>

<!-- Retour à la liste des élèves -->
<p><a href="/students" class="btn btn-secondary mt-3">Retour à la liste des élèves</a></p>

<?php require_once '../includes/footer.php'; ?>