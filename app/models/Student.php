<?php
class Student {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllStudents()
    {
        $query = "SELECT * FROM students";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStudent($first_name, $last_name, $birthdate)
    {
        $query = "INSERT INTO students (first_name, last_name, birthdate) VALUES (:first_name, :last_name, :birthdate)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->execute();
    }

    public function getStudent($id)
    {
        $query = "SELECT * FROM students WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStudent($id, $first_name, $last_name, $birthdate)
    {
        $query = "UPDATE students SET first_name = :first_name, last_name = :last_name, birthdate = :birthdate WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->execute();
    }

    public function deleteStudent($id)
    {
        $query = "DELETE FROM students WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}