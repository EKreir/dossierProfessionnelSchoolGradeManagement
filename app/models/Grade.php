<?php
class Grade {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Récupérer toutes les notes d'un étudiant
    public function getGradesByStudent($student_id)
    {
        $query = "SELECT grades.id, subjects.name AS subject_name, grades.grade 
                  FROM grades
                  JOIN subjects ON grades.id_subject = subjects.id
                  WHERE grades.id_student = :student_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajouter une note
    public function addGrade($student_id, $subject_id, $grade)
    {
         $query = "INSERT INTO grades (id_student, id_subject, grade) VALUES (:student_id, :subject_id, :grade)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':subject_id', $subject_id);
        $stmt->bindParam(':grade', $grade);
        $stmt->execute();
    }

// Récupérer une note spécifique par son ID
public function getGrade($id)
{
    $query = "SELECT * FROM grades WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


    // Modifier une note
    public function updateGrade($id, $grade)
    {
        $query = "UPDATE grades SET grade = :grade WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':grade', $grade);
        $stmt->execute();
    }

    // Supprimer une note
    public function deleteGrade($id)
    {
        $query = "DELETE FROM grades WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}