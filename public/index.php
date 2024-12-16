<?php
require_once '../config/db.php';
require_once '../app/controllers/StudentsController.php';
require_once '../app/models/Student.php';

// Exemple de routage simple sans framework
$request = $_SERVER['REQUEST_URI'];

$controller = new StudentsController($db);

// Vérifie si la route est "/students/add"
if ($request == '/students/add') {
    $controller->add();
} elseif ($request == '/students/edit') {
    $controller->edit(); // Assure-toi de gérer les autres routes
} else {
    // Route par défaut
    $controller->index();
}