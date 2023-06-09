<?php
require_once './conn.php';
class Employee
{
    private $db;

    public function __construct($b)
    {
        $this->db = $b;
    }
    public function create($data)
    {
        $query = "INSERT INTO employee (name, position, age, imageSrc) VALUES (:name, :position, :age, :imageSrc)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':position', $data['position']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':imageSrc', $data['imageSrc']);

        return $stmt->execute();
    }

    public function getAll()
    {
        $query = "SELECT * FROM employee";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $query = "UPDATE employee SET name = :name, position = :position, age = :age, imageSrc = :imageSrc WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':position', $data['position']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':imageSrc', $data['imageSrc']);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM employee WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
