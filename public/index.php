<?php
require_once '../config/db.php';
require_once '../app/controllers/StudentsController.php';
require_once '../app/models/Student.php';
require_once '../app/controllers/SubjectsController.php';
require_once '../app/models/Subject.php';
require_once '../app/controllers/GradesController.php';
require_once '../app/models/Grade.php';

// Exemple de routage simple sans framework
$request = $_SERVER['REQUEST_URI'];

$studentController = new StudentsController($db);
$subjectController = new SubjectsController($db);
$gradeController = new GradesController($db);

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
}

// Routes pour les matières (subjects)
elseif ($request == '/subjects/add') {
    $subjectController->add();
} elseif (preg_match('/^\/subjects\/edit\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];
    $subjectController->edit($id);
} elseif (preg_match('/^\/subjects\/delete\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];
    $subjectController->delete($id);
} elseif ($request == '/subjects') {
    $subjectController->index(); // Route par défaut des matières
}

// Routes pour les notes (grades)
elseif (preg_match('/^\/grades\/add\/(\d+)$/', $request, $matches)) {
    $student_id = $matches[1];
    $gradeController->add($student_id);
} elseif (preg_match('/^\/grades\/edit\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];
    $gradeController->edit($id);
} elseif (preg_match('/^\/grades\/delete\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];
    $gradeController->delete($id);
} elseif (preg_match('/^\/grades\/(\d+)$/', $request, $matches)) {
    $student_id = $matches[1];
    $gradeController->index($student_id);
}

// Route par défaut si aucune correspondance
else {
    echo "404 Not Found";
}