<?php
class Subject {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Récupérer toutes les matières
    public function getAllSubjects()
    {
        $query = "SELECT * FROM subjects";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajouter une nouvelle matière
    public function addSubject($name)
    {
        $query = "INSERT INTO subjects (name) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }

    // Récupérer une matière par son ID
    public function getSubject($id)
    {
        $query = "SELECT * FROM subjects WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une matière
    public function updateSubject($id, $name)
    {
        $query = "UPDATE subjects SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }

    // Supprimer une matière
    public function deleteSubject($id)
    {
        $query = "DELETE FROM subjects WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}