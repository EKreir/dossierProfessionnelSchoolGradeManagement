<?php
require_once '../config/db.php';
require_once '../app/controllers/StudentsController.php';
require_once '../app/models/Student.php';
require_once '../app/controllers/SubjectsController.php';
require_once '../app/models/Subject.php';

// Exemple de routage simple sans framework
$request = $_SERVER['REQUEST_URI'];

$studentController = new StudentsController($db);
$subjectController = new SubjectsController($db);

// Routes pour les étudiants
if ($request == '/students/add') {
    $studentController->add();
} elseif (preg_match('/^\/students\/edit\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];
    $studentController->edit($id);
} elseif (preg_match('/^\/students\/delete\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];
    $studentController->delete($id);
} elseif ($request == '/students') {
    $studentController->index(); // Route par défaut des étudiants

// Routes pour les matières (subjects)
} elseif ($request == '/subjects/add') {
    $subjectController->add();
} elseif (preg_match('/^\/subjects\/edit\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];
    $subjectController->edit($id);
} elseif (preg_match('/^\/subjects\/delete\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];
    $subjectController->delete($id);
} elseif ($request == '/subjects') {
    $subjectController->index(); // Route par défaut des matières

// Route par défaut si aucune correspondance
} else {
    echo "404 Not Found";
}