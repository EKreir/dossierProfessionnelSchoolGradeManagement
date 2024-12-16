<?php
require_once '../config/db.php';
require_once '../app/controllers/StudentsController.php';
require_once '../app/models/Student.php';

$controller = new StudentsController($db);
$controller->index();
