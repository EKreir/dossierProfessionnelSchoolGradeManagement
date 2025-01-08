<?php

ini_set('display_errors', 1); // Afficher les erreurs
error_reporting(E_ALL);

// Vérifier si l'URL de la page est juste "/" (c'est-à-dire la racine)
$request = $_SERVER['REQUEST_URI'];

// Si l'URL est "/"
if ($request == '/' || $request == '') {
    // Redirige vers la page des élèves
    header("Location: /students");
    exit;
}

require_once '../config/db.php';
require_once '../app/controllers/StudentsController.php';
require_once '../app/models/Student.php';
require_once '../app/controllers/SubjectsController.php';
require_once '../app/models/Subject.php';
require_once '../app/controllers/GradesController.php';
require_once '../app/models/Grade.php';

// Exemple de routage simple sans framework
$controller = null;

// Vérifier si la route est "/students", "/subjects" ou "/grades"
if (strpos($request, '/students') === 0) {
    $controller = new StudentsController($db);
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
    // Vérifie si l'URL contient un ID d'élève
    if (preg_match('/\/grades\/([0-9]+)/', $request, $matches)) {
        // L'ID de l'élève est dans $matches[1]
        $student_id = $matches[1];
        // Appelle la méthode index en lui passant l'ID de l'élève
        $controller->index($student_id);  // Afficher les notes de l'élève
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
