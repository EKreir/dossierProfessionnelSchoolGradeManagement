<?php
// Vérifier si l'URL de la page est juste "/" (c'est-à-dire la racine)
$request = $_SERVER['REQUEST_URI'];

// Si l'URL est "/"
if ($request == '/' || $request == '') {
    // Redirige vers la page des élèves
    header("Location: /students");
    exit; // N'oublie pas d'arrêter l'exécution du script après la redirection
}

// Reste de ton code de routage
require_once '../config/db.php';
require_once '../app/controllers/StudentsController.php';
require_once '../app/models/Student.php';
require_once '../app/controllers/SubjectsController.php';
require_once '../app/models/Subject.php';
require_once '../app/controllers/GradesController.php';
require_once '../app/models/Grade.php';

// Exemple de routage simple sans framework
$controller = null;

// Vérifie si la route est "/students", "/subjects" ou "/grades"
if (strpos($request, '/students') === 0) {
    $controller = new StudentsController($db);
    // Vérifie la méthode utilisée
    if ($request == '/students') {
        $controller->index();  // Afficher la liste des élèves
    } elseif (preg_match('/\/students\/add/', $request)) {
        $controller->add();  // Ajouter un élève
    } elseif (preg_match('/\/students\/edit/', $request)) {
        $controller->edit(basename($request));  // Modifier un élève
    } elseif (preg_match('/\/students\/delete/', $request)) {
        $controller->delete(basename($request));  // Supprimer un élève
    }
} elseif (strpos($request, '/subjects') === 0) {
    $controller = new SubjectsController($db);
    if ($request == '/subjects') {
        $controller->index();  // Afficher la liste des matières
    } elseif (preg_match('/\/subjects\/add/', $request)) {
        $controller->add();  // Ajouter une matière
    } elseif (preg_match('/\/subjects\/edit/', $request)) {
        $controller->edit(basename($request));  // Modifier une matière
    } elseif (preg_match('/\/subjects\/delete/', $request)) {
        $controller->delete(basename($request));  // Supprimer une matière
    }
} elseif (strpos($request, '/grades') === 0) {
    $controller = new GradesController($db);
    if ($request == '/grades') {
        $controller->index();  // Afficher la liste des notes
    } elseif (preg_match('/\/grades\/add/', $request)) {
        $controller->add(basename($request));  // Ajouter une note
    } elseif (preg_match('/\/grades\/edit/', $request)) {
        $controller->edit(basename($request));  // Modifier une note
    } elseif (preg_match('/\/grades\/delete/', $request)) {
        $controller->delete(basename($request));  // Supprimer une note
    }
} else {
    // Page 404 si aucune route ne correspond
    http_response_code(404);
    echo "Page non trouvée.";
}
