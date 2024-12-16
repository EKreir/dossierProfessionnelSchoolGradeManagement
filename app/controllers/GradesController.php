<?php
class GradesController {
    private $gradeModel;
    private $subjectModel;
    private $studentModel; // Ajoute un modèle pour les étudiants

    public function __construct($db)
    {
        $this->gradeModel = new Grade($db);
        $this->subjectModel = new Subject($db);
        $this->studentModel = new Student($db); // Assurez-vous que ce modèle existe
    }

    // Afficher les notes d'un étudiant
    public function index($student_id)
    {
        $grades = $this->gradeModel->getGradesByStudent($student_id);
        $student = $this->studentModel->getStudent($student_id);
        require_once "../app/views/grades/index.php";
    }

    // Ajouter une note
    public function add($student_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $subject_id = $_POST['subject_id'];
            $grade = $_POST['grade'];

            // Ajouter la note pour cet élève et cette matière
            $this->gradeModel->addGrade($student_id, $subject_id, $grade);

            // Rediriger vers la page des grades de l'élève
            header("Location: /grades/$student_id");
            exit;
        }

        // Récupérer la liste des élèves et des matières
        $students = $this->studentModel->getAllStudents(); // Liste des élèves
        $subjects = $this->subjectModel->getAllSubjects(); // Liste des matières
        require_once "../app/views/grades/add.php"; // Afficher le formulaire
    }

    // Modifier une note
public function edit($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $grade_value = $_POST['grade']; // Récupère la nouvelle note
        $this->gradeModel->updateGrade($id, $grade_value);

        // Récupérer à nouveau l'objet de la note mis à jour
        $grade = $this->gradeModel->getGrade($id);

        // Vérifie si la note existe
        if ($grade) {
            // Rediriger vers la page des notes de l'élève
            header("Location: /grades/{$grade['id_student']}");
            exit; // Assurez-vous de sortir immédiatement après la redirection
        } else {
            // Gérer l'erreur si la note n'est pas trouvée
            echo "Erreur: La note n'a pas été trouvée.";
        }
    }

    // Récupérer la note à modifier
    $grade = $this->gradeModel->getGrade($id);

    // Si la note n'existe pas, afficher un message d'erreur ou rediriger
    if (!$grade) {
        echo "Erreur: La note à modifier n'existe pas.";
        exit;
    }

    require_once "../app/views/grades/edit.php";
}


    // Supprimer une note
    public function delete($id)
    {
        // Récupérer la note pour obtenir l'id de l'élève
        $grade = $this->gradeModel->getGrade($id);
        
        // Supprimer la note
        $this->gradeModel->deleteGrade($id);

        // Rediriger vers la page des grades de l'élève après suppression
        header("Location: /grades/{$grade['id_student']}");
        exit;
    }
}
