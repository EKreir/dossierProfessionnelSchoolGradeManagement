<?php
class SubjectsController {
    private $subjectModel;

    public function __construct($db)
    {
        $this->subjectModel = new Subject($db);
    }

    // Afficher la liste des matières
    public function index()
    {
        $subjects = $this->subjectModel->getAllSubjects();
        require_once "../app/views/subjects/index.php";
    }

    // Ajouter une matière
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $this->subjectModel->addSubject($name);
            header("Location: /subjects");
            exit;
        }
        require_once "../app/views/subjects/add.php";
    }

    // Modifier une matière
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $this->subjectModel->updateSubject($id, $name);
            header("Location: /subjects");
            exit;
        } else {
            $subject = $this->subjectModel->getSubject($id);
            require_once "../app/views/subjects/edit.php";
        }
    }

    // Supprimer une matière
    public function delete($id)
    {
        $this->subjectModel->deleteSubject($id);
        header("Location: /subjects");
        exit;
    }
}
