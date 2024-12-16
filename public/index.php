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
} 
// Vérifie si la route correspond à "/students/edit/{id}" (avec l'ID dynamique)
elseif (preg_match('/^\/students\/edit\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];  // L'ID de l'élève est capturé
    $controller->edit($id);  // Passe l'ID à la méthode edit du contrôleur

} // Vérifie si la route correspond à "/students/delete/{id}" (avec l'ID dynamique)
elseif (preg_match('/^\/students\/delete\/(\d+)$/', $request, $matches)) {
    $id = $matches[1];  // L'ID de l'élève à supprimer
    $controller->delete($id);  // Appel de la méthode delete() du contrôleur
}
else {
    // Route par défaut
    $controller->index();
}