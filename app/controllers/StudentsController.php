<?php
class StudentsController {
    private $studentModel;

    public function __construct($db)
    {
        $this->studentModel = new Student($db);
    }

    public function index()
    {
        $students = $this->studentModel->getAllStudents();
        require_once "../app/views/students/index.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $birthdate = $_POST['birthdate'];
            $this->studentModel->addStudent($first_name, $last_name, $birthdate);
            header("Location: /students");
        } else {
            require_once "../app/views/students/add.php";
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $birthdate = $_POST['birthdate'];
            $this->studentModel->updateStudent($id, $first_name, $last_name, $birthdate);
            header("Location: /students");
        } else {
            $student = $this->studentModel->getStudent($id);
            require_once "../app/views/students/edit.php";
        }
    }

    public function delete($id)
    {
        $this->studentModel->deleteStudent($id);
        header("Location: /students");
    }
}
