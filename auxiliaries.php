<?php
require_once './conn.php'; //IMPORT THE DATABASE CONNECTION FILE

class Employee //CREATING THE EMPLOYEE CLASS

{
    private $db; //DECLARE $db AS A PRIVATE VARIABLE

    public function __construct($b) //PASSING $db AS A CONSTRUCTER 

    {
        $this->db = $b;
    }
    public function create($data) //DECLARE THE CREATE METHOD 

    {
        $query = "INSERT INTO employee (name, position, age, imageSrc) VALUES (:name, :position, :age, :imageSrc)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':position', $data['position']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':imageSrc', $data['imageSrc']);

        return $stmt->execute();
    }

    public function getAll()  //DECLARE THE READ METHOD OR THE GET

    {
        $query = "SELECT * FROM employee";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  //FETCHING DATA AS ASSOCIATIVE ARRAY
    }

    public function update($id, $data) //THE UPDATE METHOD
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

    public function delete($id) //THE DELETE METHOD
    {
        $query = "DELETE FROM employee WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
